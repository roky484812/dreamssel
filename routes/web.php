<?php

use App\Http\Controllers\Admin\Dashboard as AdminDashboard;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Distributor\Dashboard as DistDashboard;
use App\Http\Controllers\Editor\Dashboard as EditorDashboard;
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
    Route::controller(AdminDashboard::class)->group(function(){
        Route::get('/dashboard', 'index')->name('admin.dashboard');
    });
});
Route::group(['prefix'=> 'editor', 'middleware'=> ['web', 'type.editor']], function(){
    Route::controller(EditorDashboard::class)->group(function(){
        Route::get('/dashboard', 'index')->name('editor.dashboard');
    });
});
Route::group(['middleware'=> ['web', 'type.distributor']], function(){
    Route::controller(DistDashboard::class)->group(function(){
        Route::get('/dashboard', 'index')->name('dist.dashboard');
    });
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/login','loginView');
    Route::post('/login', 'login')->name('login');
    Route::post('/signup', 'register')->name('register.dist');
});
