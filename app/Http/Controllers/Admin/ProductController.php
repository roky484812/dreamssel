<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product_category;
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
        $category = Product_category::paginate(20);
        return view('admin.product_category', ['categories'=> $category]);
    }
    
    public function addCategory(Request $req){
        $req->validate([
            'category_name'=> 'required|max:50'
        ]);
        $category = new Product_category();
        $category->category_name = $req->input('category_name');
        if($category->save()){
            return redirect()->back()->with('success', 'New category successfully created.');
        }else{
            return redirect()->back()->with('error', "Can't create category. Something went wrong.");
        }
    }
}
