<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Dashboard as AdminDashboard;
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

Route::group(['prefix'=> 'admin', 'middleware'=> ['web', 'type.admin']], function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/logout', 'logout')->name('admin.logout');
        Route::post('profile/update/delete', 'delete_profile')->name('admin.profile.delete');
    });
    Route::controller(EditProfileController::class)->group(function(){
        Route::post('/profile/update/password', 'change_password')->name('admin.change_password');
        Route::post('/profile/update/picture', 'change_profile_picture')->name('admin.change_profile_picture');
        Route::post('/profile/update/user_meta', 'update_user_meta')->name('admin.update_user_meta');
        Route::post('/profile/update/otp', 'send_otp')->name('admin.update_email');
    });
    Route::controller(AdminDashboard::class)->group(function(){
        Route::get('/dashboard', 'index')->name('admin.dashboard');
    });
    Route::controller(AdminController::class)->group(function(){
        Route::get('/profile', 'profile')->name('admin.profile');
        Route::get('/profile/update', 'edit_profile')->name('admin.profile.edit');
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
