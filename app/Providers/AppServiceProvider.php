<?php

namespace App\Providers;

use App\Models\Product_category;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            if(Auth::check()){
                $user = User::select('users.*', 'user_roles.role as role_name')->leftjoin('user_roles', 'user_roles.id', 'users.role')->where('users.id', Auth::user()->id)->first();
                $view->with('user', $user);
            }else{
                $userData = ['role_name'=> null, 'name'=> null, 'profile_picture'=> null];
                $user = (object)$userData;
                $view->with('user', $user);
            }
            $categories = Product_category::get();
            $view->with('_categories', $categories);
        });
        PaginationPaginator::useBootstrapFive();
    }
}