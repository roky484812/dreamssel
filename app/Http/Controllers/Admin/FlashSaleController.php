<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flash_sale;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index(Request $request){
        $products = Flash_sale::leftJoin('products', 'products.id', 'flash_sales.product_id')
        ->orderBy('flash_sales.created_at')
        ->select('products.*', 'product_countries.name as country_name', 'product_categories.category_name', 'product_sub_categories.sub_category_name', 'flash_sales.id as flash_sale_id')
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->leftjoin('product_categories', 'product_categories.id', 'products.category_id')
        ->leftjoin('product_sub_categories', 'product_sub_categories.id', 'products.sub_category_id')
        ->get();
        
        return view('admin.flash_sale', ['products'=> $products]);
    }
    public function removeFlashSale($id){
        $delete = Flash_sale::where('id',$id)->delete();
        if($delete){
            return redirect()->back()->with('success', 'Flash Sale product removed successfuly.');
        }else{
            return redirect()->back()->with('error', 'Failed to remove flash sale product. Something went wrong.');
        }
    }
    public function addFlashSale($product_id){
        $flash_sale = Flash_sale::where('product_id', $product_id)->first();
        if(!$flash_sale){
            $flash_sale_insert = new Flash_sale();
            $flash_sale_insert->product_id = $product_id;
            if($flash_sale_insert->save()){
                return redirect()->back()->with('success','Successfuly added to flashsale');
            }else{
                return redirect()->back()->with('error', 'Failed to publish flash item.');
            }
        }else{
            return redirect()->back()->with('error', 'Already added to flashsale');
        }
    }
}
