<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product_category;
use Illuminate\Http\Request;
use Intervention\Image\Colors\Rgb\Channels\Red;

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

    public function editCategory(Request $req){
        $req->validate([
            'id'=> 'required|exists:product_categories,id',
            'category'=> 'required|max:50'
        ]);
        $update = Product_category::whereId($req->input('id'))->update([
            'category_name'=> $req->input('category')
        ]);
        if($update){
            return redirect()->back()->with('success', 'Category updated successfully.');
        }else{
            return redirect()->back()->with('error', "Can not update category. Something went wrong.");
        }
    }

    public function deleteCategory(Request $req){
        $req->validate([
            'id'=> 'required|exists:product_categories,id'
        ]);
        $delete = Product_category::whereId($req->input('id'))->delete();
        if($delete){
            return redirect()->back()->with('success', 'Category deleted successfully.');
        }else{
            return redirect()->back()->with('error','Can not delete category. Something went wrong.');
        }
    }

}
