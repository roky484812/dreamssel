<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\Dashboard as AdminDashboard;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserListController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Distributor\Dashboard as DistDashboard;
use App\Http\Controllers\Editor\Dashboard as EditorDashboard;
use App\Http\Controllers\EditProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'admin', 'middleware'=> ['web', 'type.adminEditor']], function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/logout', 'logout')->name('admin.logout');
        Route::post('profile/update/delete', 'delete_profile')->name('admin.profile.delete');
    });
    Route::controller(EditProfileController::class)->group(function(){
        Route::post('/profile/update/password', 'change_password')->name('admin.change_password');
        Route::post('/profile/update/picture', 'change_profile_picture')->name('admin.change_profile_picture');
        Route::post('/profile/update/user_meta', 'update_user_meta')->name('admin.update_user_meta');
        Route::post('/profile/update/otp', 'send_otp')->name('admin.update_email.otp');
        Route::post('/profile/update/email', 'update_email')->name('admin.update_email');
    });
    Route::controller(AdminDashboard::class)->group(function(){
        Route::get('/dashboard', 'index')->name('admin.dashboard');
    });
    Route::controller(AdminController::class)->group(function(){
        Route::get('/profile', 'profile')->name('admin.profile');
        Route::get('/profile/update', 'edit_profile')->name('admin.profile.edit');
    });
    Route::controller(AnnouncementController::class)->group(function(){
        Route::get('/announcement', 'announcementList')->name('admin.announcement.list');
        Route::get('/announcement/add', 'add_announcement_view')->name('admin.announcement.addview');
        Route::post('/announcement/add', 'add_announcement')->name('admin.announcement.add');
        Route::delete('/announcement/delete', 'delete_announcement')->name('admin.announcement.delete');
        Route::get('/announcement/update/{announcement_id}', 'update_announcement_view')->name('admin.announcement.updateView');
        Route::put('/announcement/update', 'update_announcement')->name('admin.announcement.update');
    });
    Route::controller(ProductController::class)->group(function(){
        Route::get('/product', 'ProductPage')->name('admin.productManagement');
        Route::get('/product/add', 'AddProductPage')->name('admin.product.addView');
        Route::post('/product/add', 'AddProduct')->name('admin.product.add');
        Route::get('/product/update/{id}', 'editProductPage')->name('admin.product.updateView');
        Route::post('/product/imaage/temp', 'productTempImage')->name('admin.product.image.temp');
    });
    Route::controller(ProductCategoryController::class)->group(function(){
        Route::get('/product/category', 'categoryPage')->name('admin.product.categoryView');
        Route::post('/product/category/add', 'addCategory')->name('admin.product.category.add');
        Route::put('/product/category/update', 'editCategory')->name('admin.product.category.update');
        Route::delete('/product/category/delete', 'deleteCategory')->name('admin.product.category.delete');
        Route::get('/product/subcategroy', 'sub_categoryPage')->name('admin.product.subcategoryView');
        Route::post('/product/subcategory/add', 'addSubcategory')->name('admin.product.subcategory.add');
        Route::put('/product/subcategory/update', 'updateSubcategory')->name('admin.product.subcategory.update');
        Route::delete('/product/subcategory/delete', 'deleteSubcategory')->name('admin.product.subcategory.delete');
        Route::get('/product/subcategory/{category_id?}', 'subcategory_by_category')->name('admin.product.subcategory.category');
    });
});

Route::group(['prefix'=> 'admin', 'middleware'=> ['web', 'type.admin']], function(){
    Route::controller(UserListController::class)->group(function(){
        Route::get('/user', 'userList')->name('admin.userlist');
        Route::get('/user/add', 'addUserView')->name('admin.adduserView');
        Route::post('/user/add', 'addUser')->name('admin.adduser');
        Route::get('/user/update/{user_id}', 'updateUserView')->name('admin.updateuserView');
        Route::get('/user/view/{user_id}', 'viewUser')->name('admin.user.view');
        Route::put('/user/update', 'updateUser')->name('admin.user.update');
        Route::get('/user/status/{user_id}', 'user_status')->name('admin.user.status');
        Route::get('/user/delete/{user_id}', 'user_delete')->name('admin.user.delete');
    });
});
Route::group(['prefix'=> 'editor', 'middleware'=> ['web', 'type.editor']], function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/logout', 'logout')->name('editor.logout');
    });
    Route::controller(EditorDashboard::class)->group(function(){
        Route::get('/dashboard', 'index')->name('editor.dashboard');
    });
});
Route::group(['middleware'=> ['web', 'type.distributor']], function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/logout', 'logout')->name('dist.logout');
    });
    Route::controller(DistDashboard::class)->group(function(){
        Route::get('/dashboard', 'index')->name('dist.dashboard');
    });
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/login','loginView');
    Route::post('/login', 'login')->name('login');
    Route::post('/signup', 'register')->name('register.dist');
    Route::get('/email_verify', 'email_verify')->name('email_verify');
    Route::get('/facebook', 'login_with_facebook')->name('login.facebook');
    Route::get('/facebook/callback', 'login_with_facebook_callback')->name('facebook.callback');
    Route::get('/google', 'login_with_google')->name('login.google');
    Route::get('/google/callback', 'login_with_google_callback')->name('google.callback');
});
