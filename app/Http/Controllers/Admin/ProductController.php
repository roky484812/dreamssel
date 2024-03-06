<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_attribute;
use App\Models\Product_attribute_value;
use App\Models\Product_category;
use App\Models\Product_combination;
use App\Models\Product_country;
use App\Models\product_gallery;
use App\Models\Product_sub_category;
use App\Models\Temp_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Colors\Rgb\Channels\Red;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    public function ProductPage(Request $req){
        $req->validate([
            'category'=> 'nullable|exists:product_categories,id',
            'sub_category'=> 'nullable|exists:product_sub_categories,id',
            'country'=> 'nullable|exists:product_countries,id'
        ]);
        $product_fetch = Product::select('products.*', 'product_countries.name as country_name', 'product_categories.category_name', 'product_sub_categories.sub_category_name')
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->leftjoin('product_categories', 'product_categories.id', 'products.category_id')
        ->leftjoin('product_sub_categories', 'product_sub_categories.id', 'products.sub_category_id')
        ->orderBy('products.id', 'desc');
        
        if($req->input('category')){
            $product_fetch->where('products.category_id', $req->input('category'));
        }
        
        if($req->input('sub_category')){
            $product_fetch->where('products.sub_category_id', $req->input('sub_category'));
        }

        if($req->input('search')){
            $product_fetch->where('products.title', 'like', '%'.$req->input('search').'%');
        }

        if($req->input('country')){
            $product_fetch->where('products.country_id', $req->input('country'));
        }

        $countries = Product_country::get();
        $categories = Product_category::get();
        $sub_categories = Product_sub_category::get();
        $products = $product_fetch->paginate(20);
        return view('admin.product_management', [
            'products'=> $products,
            'countries'=> $countries,
            'categories'=> $categories,
            'sub_categories'=> $sub_categories,
            'selected'=> [
                'category'=> $req->input('category'),
                'sub_category'=> $req->input('sub_category'),
                'country'=> $req->input('country'),
                'search'=> $req->input('search')
            ]
        ]);
    }

    public function AddProductPage(){
        $categories = Product_category::get();
        return view('admin.add_product', ['categories'=> $categories]);
    }
    
    
    
    public function AddProduct(Request $req){
        $req->validate([
            'title'=> 'required|max:255',
            'price'=> 'required',
            'dist_price'=> 'required',
            'category'=> 'required|exists:product_categories,id',
            'sub_category'=> 'required|exists:product_sub_categories,id',
            'attritubes'=> 'nullable|array',
            'images.*'=> 'nullable|image|mimes:png,jpg,jpeg',
            'thumbnail'=> 'required|image|mimes:png,jpg,jpeg',
            'combination'=> 'nullable|array',
            'short_description'=> 'nullable|max:255',
            'country'=> 'required|exists:product_countries,id',
            'status'=> 'required|in:0,1'
        ]);
        $product = new Product();
        $product->title = $req->input('title');
        $product->price = $req->input('price');
        $product->distributor_price = $req->input('dist_price');
        $product->category_id = $req->input('category');
        $product->country_id = $req->input('country');
        $product->sub_category_id = $req->input('sub_category');
        $product->short_description = $req->input('short_description');
        $product->description = $req->input('description');
        if($req->input('sku')){
            $product->sku = $req->input('sku');
        }
        $product->product_code = time();
        if($req->input('combination')){
            $product->is_variational = true;
        }
        $product->status = $req->input('status');
        $product->author_id = Auth::user()->id;
        if($req->hasFile('thumbnail')){
            $image = $req->file('thumbnail');
            $path = '/images/product/thumbnail/';

            $image_path = $this->saveImage($image, $path);
            $product->thumbnail_image = $image_path;
        }
        
        $product->save();
        if($req->hasFile('images')){
            foreach($req->file('images') as $image){
                if($image->isValid()){
                    $path = '/images/product/gallery/';
                    $image_path = $this->saveImage($image, $path);
                    $gallery = new product_gallery();
                    $gallery->image = $image_path;
                    $gallery->product_id = $product->id;
                    $gallery->save();
                }
            }
        }

        if($req->input('combination')){
            //save product attritubes
            foreach($req->input('attributes') as $attribute){
                $product_attribute = new Product_attribute();
                $product_attribute->name = $attribute;
                $product_attribute->product_id = $product->id;
                // $product_attribute->product_id = 1; //for test
                $product_attribute->save(); // Save the attribute first
                $attribute_value = $req->input($attribute);
                $attribute_value_array = explode(',',$attribute_value);
                foreach($attribute_value_array as $value){
                    $product_attribute_value = new Product_attribute_value();
                    $product_attribute_value->value = $value;
                    $product_attribute_value->attribute_id = $product_attribute->id; // Use saved attribute's id
                    $product_attribute_value->save();
                }
            }

            $sku = 0;
            //save product combinations
            foreach($req->input('combination') as $combination){
                $product_combination = new Product_combination();
                $product_combination->product_id = $product->id;
                // $product_combination->product_id = 1; //for test
                $product_combination->combination_string = $combination['combination_value'];
                $product_combination_array = explode(',', $combination['combination_value']);
                $combination_string = implode($product_combination_array);
                $stringParts = str_split($combination_string);
                sort($stringParts);
                $combination_unique = implode($stringParts); //string sort and make single product unique combination string
                $product_combination->combination_unique = $combination_unique;
                $product_combination->price = $combination['price'];
                $product_combination->distributor_price = $combination['dist_price'];
                $product_combination->sku = $combination['stock'];
                $sku += $combination['stock'];
                $product_combination->save();
            }
            $product->sku = $sku;
            $product->save();
        }
        return redirect()->back()->with('success', 'New Product added successfully.');
    }

    public function saveImage($image, $path){
        if (!File::exists(public_path($path))) {
            File::makeDirectory(public_path($path), 0755, true); // Create the directory recursively
        }
        $manager = new ImageManager(new Driver());
        $ext = $image->getClientOriginalExtension();
        $image_name = time().'.'.$ext;
        $image_path = $path.$image_name;
        $image_dest = public_path().$image_path;
        $image = $manager->read($image);
        $image->cover(500, 500);
        $image->save($image_dest, 50);
        return $image_path;
    }

    public function editProductPage($id){

        $categories = Product_category::get();
        return view('admin.edit_product', ['categories'=> $categories]);
        
    }

    public function productTempImage(Request $req){
        $req->validate([
            'temp_image'=> 'required|image|mimes:png,jpg,jpeg'
        ]);

        if($req->hasFile('temp_image')){
            $manager = new ImageManager(new Driver());
            $temp_image = $req->file('temp_image');
            $ext = $temp_image->getClientOriginalExtension();
            $image_name = time().'.'.$ext;
            $image_path = '/images/temp/'.$image_name;
            $image_dest = public_path().$image_path;

            $image = $manager->read($temp_image);
            $image->cover(300, 300);
            $image->save($image_dest, 50);

            $temp_image_model = new Temp_image();
            $temp_image_model->image = $image_path;
            if($temp_image_model->save()){
                return response()->json([
                    'status'=> true,
                    'image_info'=> $temp_image_model,
                    'message'=> 'Temporary Image uploaded successfully.'
                ]);
            }else{
                return response()->json([
                    'status'=> false,
                    'message'=> 'Something went wrong.'
                ]);
            }
        }
    }
}
