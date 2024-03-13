<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::where('status', 1)
        ->limit(8)->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->select('products.id', 'products.title', 'products.price', 'products.distributor_price', 'products.thumbnail_image', 'product_countries.name as country_name', 'product_countries.code as country_code')
        ->get();
        return view('client.index', ['products'=> $products]);
    }
}
