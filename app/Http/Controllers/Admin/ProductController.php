<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductPage(){
        return view('admin.product_management');
    }

    public function AddProductPage(){
        return view('admin.add_product');
    }
    
    public function editProductPage(){
        return view('admin.edit_product');
    }

    public function categoryPage(){
        return view('admin.product_category');
    }
    
}
