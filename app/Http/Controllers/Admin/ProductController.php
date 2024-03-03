<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product_category;
use App\Models\Product_sub_category;
use App\Models\Temp_image;
use Illuminate\Http\Request;
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
        $req->validate([
            'title'=> 'required|max:255',
            'price'=> 'required',
            'dist_price'=> 'required',
            'category'=> 'required|exists:product_categories,id',
            'sub_category'=> 'required|exists:product_sub_categories,id',
            'attritubes'=> 'nullable|array',
            ''
        ]);
        return $req->all();
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
