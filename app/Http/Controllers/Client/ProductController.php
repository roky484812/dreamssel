<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_attribute;
use App\Models\Product_category;
use App\Models\Product_combination;
use App\Models\Product_gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(){
        $products = Product::where('status', 1)
        ->limit(8)->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->select('products.id', 'products.title', 'products.price', 'products.distributor_price', 'products.thumbnail_image', 'product_countries.name as country_name', 'product_countries.code as country_code')
        ->get();
        $categories = Product_category::with('sub_category')->get();
        $popular_products = Product::where('status', 1)
        ->limit(8)->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->select('products.id', 'products.title', 'products.price', 'products.distributor_price', 'products.thumbnail_image', 'product_countries.name as country_name', 'product_countries.code as country_code')
        ->orderBy('products.view_count')
        ->get();
        return view('client.index', [
            'products'=> $products,
            'categories'=> $categories,
            'popular_products'=> $popular_products
        ]);
    }

    public function getTime($time){
        return Carbon::parse($time)->format('d-m-Y');
    }
    public function product_view($id){
        $product = Product::whereId($id)->first();
        $product->view_count = $product->view_count + 1;
        $product->save();
        $product_fetch = Product::where(['status'=> 1, 'products.id'=> $id])
        ->limit(8)->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->leftjoin('product_categories', 'product_categories.id', 'products.category_id')
        ->leftjoin('product_sub_categories', 'product_sub_categories.id', 'products.sub_category_id')
        ->select('products.id', 'products.title', 'products.price', 'products.distributor_price', 'products.thumbnail_image', 'products.sku', 'products.product_code', 'products.short_description', 'products.description', 'products.is_variational', 'products.created_at', 'product_countries.name as country_name', 'product_countries.code as country_code', 'product_categories.category_name', 'product_sub_categories.sub_category_name')
        ->first();
        $product_attributes = [];
        $product_galleries = [];
        if($product_fetch->is_variational){
            $product_attributes = Product_attribute::where('product_id', $id)->with('attribute_values')->get();
            $product_galleries = Product_gallery::where('product_id', $id)->get();
        }
        
        $carbon = new Carbon();
        return view('client.product_view', ['product'=> $product_fetch, 'product_attributes'=> $product_attributes, 'product_galleries'=> $product_galleries, 'carbon' => $carbon]);
    }

    public function product_combinations(Request $req){
        // return $req->all();
        $req->validate([
            'product_id'=> ['required', 'exists:products,id']
        ]);
        $string = '';
        foreach($req->input('attributes') as $attribute){
            $string .= $req->input($attribute);
        }
        $stringParts = str_split($string);
        sort($stringParts);
        $combination_unique = implode($stringParts);
        
        $product_combinations = Product_combination::where([
            'product_id'=> $req->input('product_id'),
            'combination_unique'=> $combination_unique
        ])->first();
        if($product_combinations){
            return response()->json([
                'status'=> true,
                'data'=>$product_combinations,
                'message'=> 'Combination fetched successfully.'
            ]);
        }else{
            return response()->json([
                'status'=> false,
                'message'=> 'Failed to fetch product combinations.'
            ]);
        }
    }
}
