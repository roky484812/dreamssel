<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_category;
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
    public function ProductPage(){
        return view('admin.product_management');
    }

    public function AddProductPage(){
        $categories = Product_category::get();
        return view('admin.add_product', ['categories'=> $categories]);
    }
    
    public function AddProduct(Request $req){
        return $req->all();
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
            'combination.*.*'=> 'required',
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

    public function editProductPage(){

        return view('admin.edit_product');
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
