<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $distributors = User::leftjoin('user_roles', 'user_roles.id', 'users.role')
        ->where('users.role', 3)
        ->where('is_active', 1)
        ->limit(5)->orderBy('id', 'asc')
        ->select('users.*', 'user_roles.role')->get();

        $popular_products = Product::select('products.*', 'product_countries.name as country_name', 'product_categories.category_name', 'product_sub_categories.sub_category_name')
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->leftjoin('product_categories', 'product_categories.id', 'products.category_id')
        ->leftjoin('product_sub_categories', 'product_sub_categories.id', 'products.sub_category_id')
        ->limit(10)->orderBy('products.view_count', 'desc')->get();
        
        return view('admin.dashboard', ['distributors' => $distributors, 'popular_products' => $popular_products]);
    }
}
