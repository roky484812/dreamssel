<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product_category;
use App\Models\Product_sub_category;
use Illuminate\Http\Request;
use Intervention\Image\Colors\Rgb\Channels\Red;

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
    }

    public function editProductPage(){
        return view('admin.edit_product');
    }

}
