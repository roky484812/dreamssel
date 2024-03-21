<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_attribute;
use App\Models\Product_category;
use App\Models\Product_combination;
use App\Models\Product_sub_category;
use App\Models\Product_gallery;
use App\Models\Carousal_gallery;
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
        ->select('products.id', 'products.title', 'products.price', 'products.distributor_price', 'products.thumbnail_image', 'product_countries.name as country_name', 'product_countries.code as country_code', 'products.view_count')
        ->orderBy('products.view_count', 'desc')
        ->get();
        $carousels = Carousal_gallery::limit(5)->latest()->get();
        return view('client.index', [
            'products'=> $products,
            'categories'=> $categories,
            'popular_products'=> $popular_products,
            'carousels'=> $carousels
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
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->leftjoin('product_categories', 'product_categories.id', 'products.category_id')
        ->leftjoin('product_sub_categories', 'product_sub_categories.id', 'products.sub_category_id')
        ->select('products.id', 'products.category_id', 'products.title', 'products.price', 'products.distributor_price', 'products.thumbnail_image', 'products.sku', 'products.product_code', 'products.short_description', 'products.description', 'products.is_variational', 'products.created_at', 'product_countries.name as country_name', 'product_countries.code as country_code', 'product_categories.category_name', 'product_sub_categories.sub_category_name')
        ->first();
        $product_attributes = [];
        $product_galleries = [];
        
        if($product_fetch->is_variational){
            $product_attributes = Product_attribute::where('product_id', $id)->with('attribute_values')->get();
        }
        $product_galleries = Product_gallery::where('product_id', $id)->get();
        
        $carbon = new Carbon();

        $related_products = Product::where('products.status', 1)
        ->where('products.category_id', $product_fetch->category_id)->limit(8)
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->select('products.*', 'product_countries.code as country_code')
        ->get();
        
        return view('client.product_view', ['product'=> $product_fetch, 'product_attributes'=> $product_attributes, 'product_galleries'=> $product_galleries, 'carbon' => $carbon, 'related_products'=> $related_products]);
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

    public function product_search_page(Request $req){
        $popular_products = Product::where('status', 1)
        ->limit(8)->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->select('products.id', 'products.title', 'products.price', 'products.distributor_price', 'products.thumbnail_image', 'product_countries.name as country_name', 'product_countries.code as country_code', 'products.view_count')
        ->orderBy('products.view_count', 'desc')
        ->get();
        return view('client.product_search', ['search_product'=> $req->input('search'), 'popular_products' => $popular_products]);
    }

    public function product_subcategory_filter(Request $req){
        $category_id = (array) $req->input('category_id');
        $sub_category = Product_sub_category::whereIn('category_id', $category_id)->get();

        return response()->json([
            'status'=> true,
            'data'=> $sub_category,
            'message'=> 'Sub-category fetched successfully.'
        ]);
    }

    public function search_products(Request $req){
        $products = Product::where('products.status', 1)->whereBetween('products.price', [$req->input('min_price'), $req->input('max_price')])
        ->leftjoin('product_categories', 'product_categories.id', 'products.category_id')
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id');
        if($req->input('search')){
            $products->where('products.title', 'like', '%'.$req->input('search').'%');
        }

        if($req->input('category_id')){
            $products->whereIn('products.category_id', $req->input('category_id'));
        }
        
        if($req->input('sub_category_id')){
            $products->whereIn('products.sub_category_id', $req->input('sub_category_id'));
        }
        $products_fetch = $products->select('products.id', 'products.title', 'products.price', 'products.distributor_price', 'products.sku', 'products.thumbnail_image', 'products.created_at', 'product_categories.category_name', 'product_countries.code as country_code')->latest()->paginate(20);

        return response()->json([
            'status' => true,
            'data' => $products_fetch,
            'message'=> 'Successfully searched.'
        ]);
    }

    public function shopping_products(){
        $products = Product::where('status', 1)
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->select('products.id', 'products.title', 'products.price', 'products.distributor_price', 'products.thumbnail_image', 'product_countries.name as country_name', 'product_countries.code as country_code')
        ->paginate(16);
        return view('client.shop', ['products'=> $products]);
    }

    public function product_of_subcategory($id){
        $products = Product::where([
            'products.status'=> 1,
            'products.sub_category_id'=> $id
        ])->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->select('products.id', 'products.title', 'products.price', 'products.distributor_price', 'products.thumbnail_image', 'product_countries.name as country_name', 'product_countries.code as country_code')
        ->paginate(16);
        $category = Product_sub_category::rightjoin('product_categories', 'product_categories.id', 'product_sub_categories.category_id')
        ->where('product_sub_categories.id', $id)->first();
        return view('client.subcategory_product', ['products'=> $products, 'category'=> $category]);
    }
}