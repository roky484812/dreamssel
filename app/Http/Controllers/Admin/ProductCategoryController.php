<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product_category;
use App\Models\Product_sub_category;
use Exception;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
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
        try{
            $delete = Product_category::whereId($req->input('id'))->delete();
            if($delete){
                return redirect()->back()->with('success', 'Category deleted successfully.');
            }else{
                return redirect()->back()->with('error','Can not delete category. Something went wrong.');
            }
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Category cannot be deleted. There are some products in this category available');
        }
    }

    public function sub_categoryPage(Request $req){
        $req->validate([
            'category_id'=> 'nullable|exists:product_categories,id'
        ]);
        $sub_category = Product_sub_category::select('product_sub_categories.*', 'product_categories.category_name')->leftJoin('product_categories', 'product_categories.id', 'product_sub_categories.category_id');
        if($req->input('category_id')){
            $sub_category->where('category_id', $req->input('category_id'));
        }
        $sub_category_paginate = $sub_category->paginate(20);
        $categories = Product_category::get();

        return view('admin.product_sub_category', ['subcategories'=> $sub_category_paginate, 'categories'=> $categories]);
    }

    public function addSubcategory(Request $req){
        $req->validate([
            'sub_category_name'=> 'required|max:50',
            'category'=> 'required|exists:product_categories,id'
        ]);
        $sub_category = new Product_sub_category();
        $sub_category->sub_category_name = $req->input('sub_category_name');
        $sub_category->category_id = $req->input('category');
        if($sub_category->save()){
            return redirect()->back()->with('success', 'New Sub-Category created successfully.');
        }else{
            return redirect()->back()->with('error', 'Can not create subcataegory.');
        }
    }

    public function updateSubcategory(Request $req){
        $req->validate([
            'id'=> 'required|exists:product_sub_categories,id',
            'sub_category'=> 'required|max:50',
            'category_id'=> 'required|exists:product_categories,id'
        ]);
        $update = Product_sub_category::whereId($req->input('id'))->update([
            'sub_category_name'=> $req->input('sub_category'),
            'category_id'=> $req->input('category_id')
        ]);
        if($update){
            return redirect()->back()->with('success', 'New Sub-Category updated successfully.');
        }else{
            return redirect()->back()->with('error', 'Can not update subcataegory.');
        }
    }

    public function deleteSubcategory(Request $req){
        $req->validate([
            'id'=> 'required|exists:product_sub_categories,id'
        ]);
        $delete = Product_sub_category::whereId($req->input('id'))->delete();
        if($delete){
            return redirect()->back()->with('success', 'New Sub-Category deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Can not delete subcataegory.');
        }
    }

    public function subcategory_by_category($category_id){
        // return $category_id;
        if($category_id){

            $sub_category = Product_sub_category::where('category_id', $category_id)->get();
            if($sub_category){
                return response()->json([
                    'status'=> true,
                    'sub_categories'=> $sub_category,
                    'message'=> 'Sub-category fetched successfully.'
                ]);
            }else{
                return response()->json([
                    'status'=> false,
                    'message'=> 'Something went wrong.'
                ], 500);
            }
        }
    }
}
