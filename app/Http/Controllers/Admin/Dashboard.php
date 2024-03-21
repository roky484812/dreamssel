<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $distributors = User::leftjoin('user_roles', 'user_roles.id', 'users.role')
        ->where('users.role', 3)
        ->where('is_active', 1)
        ->limit(5)->latest()
        ->select('users.*', 'user_roles.role')->get();

        $popular_products = Product::select('products.*', 'product_countries.name as country_name', 'product_categories.category_name', 'product_sub_categories.sub_category_name')
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->leftjoin('product_categories', 'product_categories.id', 'products.category_id')
        ->leftjoin('product_sub_categories', 'product_sub_categories.id', 'products.sub_category_id')
        ->limit(8)->orderBy('products.view_count', 'desc')->get();

        $total_product = Product::count();
        $total_draft_product = Product::where('status', 0)->count();

        $total_user = User::where('role', 3)->count();
        $total_announcement = Announcement::count();

        $top_discounted_products = Product::orderByRaw('(price - distributor_price) / price DESC')
        ->select('products.*', 'product_countries.name as country_name', 'product_categories.category_name', 'product_sub_categories.sub_category_name')
        ->leftjoin('product_countries', 'product_countries.id', 'products.country_id')
        ->leftjoin('product_categories', 'product_categories.id', 'products.category_id')
        ->leftjoin('product_sub_categories', 'product_sub_categories.id', 'products.sub_category_id')
        ->limit(5)->get();

        $editors = User::where('role', 2)->get();

        return view('admin.dashboard', [
            'distributors' => $distributors,
            'popular_products' => $popular_products,
            'total_product'=> $total_product,
            'total_draft_product'=> $total_draft_product,
            'total_user' => $total_user,
            'total_announcement' => $total_announcement,
            'top_discounted_products'=> $top_discounted_products,
            'editors'=> $editors
        ]);
    }
}
