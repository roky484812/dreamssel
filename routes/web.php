<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Client\AnnouncementController as ClientAnnouncementController;
use App\Http\Controllers\Admin\Dashboard as AdminDashboard;
use App\Http\Controllers\Admin\FlashSaleController;
use App\Http\Controllers\Admin\LandingImageController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\HomePageController as ClientHomePageController;
use App\Http\Controllers\Admin\UserListController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\StaticPageController;
use App\Http\Controllers\Distributor\Dashboard as DistDashboard;
use App\Http\Controllers\Client\CartController as ClientCartController;
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

Route::group(['prefix'=> 'admin', 'middleware'=> ['web', 'type.adminEditor']], function(){
    Route::controller(LandingImageController::class)->group(function () {
        Route::get('carousel/upload/view', 'carouselBladeViewer')->name('admin.carousel.view');
        Route::get('featured/upload/view', 'featuredBladeViewer')->name('admin.feature.view');
        Route::get('new-araival/upload/view', 'newAraivalBladeViewer')->name('admin.newAraival.view');
        Route::post('/carousel/upload/images', 'CarouselImageUploader')->name('admin.carousel.images.upload');
        Route::post('/featured/upload/images', 'featuredImageUploader')->name('admin.featured.image.upload');
        Route::post('/new-araival/upload/images', 'newAraivalImageUploader')->name('admin.new_araival.image.upload');
        Route::delete('/carousel/image/{id?}', 'deleteCarouselImage')->name('admin.carousel.deleteImage');
        Route::delete('/featured/image/{id?}', 'deleteFeaturedImage')->name('admin.featured.deleteImage');
        Route::delete('/new_araival/image/{id?}', 'deleteNewAraivalImage')->name('admin.new_araival.deleteImage');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/order/pending', 'pendingOrder')->name('admin.order.pending');
        Route::get('/order/confirmed', 'confirmedOrder')->name('admin.order.confirmed');
        Route::get('/order/cancelled', 'cancelledOrder')->name('admin.order.cancelled');
        Route::post('/order/confirm/{order_id}', 'order_confirm')->name('admin.order.confrim');
        Route::post('/order/cancel/{order_id}', 'order_cancel')->name('admin.order.cancel');
    });
    Route::controller(AuthController::class)->group(function(){
        Route::get('/logout', 'logout')->name('admin.logout');
        Route::post('/profile/update/delete', 'delete_profile')->name('admin.profile.delete');
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
        Route::get('/flash/sale/counter', 'flash_sale_timer')->name('admin.flash.sale.counter');
        Route::post('/set/countdown', 'setEndTime')->name('admin.flash.sale.set.endtime');
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
        Route::post('/product/update', 'editProduct')->name('admin.product.update');
        Route::get('/product/delete/{id}', 'deleteProduct')->name('admin.product.delete');
        Route::delete('/product/image/{id?}', 'deleteProductImage')->name('admin.product.deleteImage');
        Route::post('/product/imaage/temp', 'productTempImage')->name('admin.product.image.temp');
        Route::get('/product/click-log', 'product_click_log')->name('admin.product.click_log');
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
    Route::controller(FlashSaleController::class)->group(function(){
        Route::get('product/flash_sale', 'index')->name('admin.product.flashSale.index');
        Route::get('product/flash_sale/remove/{id}', 'removeFlashSale')->name('admin.product.flashSale.remove');
        Route::get('product/flash_sale/add/{id}', 'addFlashSale')->name('admin.product.flashSale.add');
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

Route::controller(ClientCartController::class)->group(function () {
    Route::post('/add-to-cart-v/{product_id}/', 'addToCartFromViewPage')->name('addToCartFromViewPage');
    Route::get('/add-to-cart-v/{product_id}/', 'addToCart')->name('addToCart');
    Route::delete('/remove-from-cart/{product_cart_id}/', 'removeFromCart')->name('removeFromCart');
});


Route::controller(ClientHomePageController::class)->group(function () {
    Route::get('/about', 'aboutViewer')->name('home.abouts');
    Route::get('/', 'homeViewer')->name('home');
    Route::get('/thankyou', 'thankyouViewer')->name('home.thankyou');
    Route::get('/cart', 'cartViewer')->name('home.cart');
    Route::get('/signUp-page', 'signUpViewer')->name('home.signUpPage');
    Route::get('/signIn-page', 'signInViewer')->name('home.signInPage');
    Route::get('/account-page', 'accountViewer')->name('home.accountPage');
    Route::get('/otpv', 'emailOTPViewer')->name('home.otpv');
    Route::get('/product-viewer/{id}/', 'productViewer')->name('home.productPage');
    Route::get('/shop-viewer', 'shopViewer')->name('home.shopPage');
    Route::get('/fav-viewer', 'viewFromFavList')->name('home.favPage');
    Route::get('/add/fav-list/{product_id}/', 'addToFavList')->name('home.addToFavList');

    Route::get('/sub-category/view/{category_name}/{sub_category_id}/{sub_category_name}', 'viewFromSubCategory')->name('home.subCategoryView');
    Route::delete('/remove-from-fav/{fav_list_id}/', 'removeFromFavList')->name('removeFromFav');

    Route::get('/place-order/view/{product_id}/', 'placeOrderViewer')->name('home.placeOrderView');
    Route::get('/place-order/view/{product_id}/{color_code}/{size_value}', 'placeOrderViewer')->name('home.placeOrderViewFromViewProduct');
    Route::get('/place-orders/view/', 'placeOrderViewerFromCart')->name('home.placeOrdersView');
    Route::post('/place-order', 'placeOrder')->name('home.placeOrder');
    Route::post('/place-orders', 'placeOrders')->name('home.placeOrders');
    Route::get('/pending/order', 'pendingOrderView')->name('home.pendingOrder');
    Route::get('/cancelled/order', 'cancelledOrderView')->name('home.cancelledOrder');
    Route::get('/confirmed/order', 'confirmedOrderView')->name('home.confirmedOrder');
    Route::post('/send/review', 'reviewInput')->name('home.sendReview');
    Route::get('/search/result', 'search')->name('home.searchView');
    Route::post('/update/cart/quantity', 'updateCartQuantity')->name('home.updateCartQuantity');
    Route::get('/product/combination', 'product_combinations')->name('client.product.combination');
    Route::get('/product/flash-sale', 'flash_products')->name('flash_sale');
    Route::get('product/subcategory/fetch', 'product_subcategory_filter')->name('client.product.sub_category_filter');
    Route::get('/product/search/fetch', 'search_products')->name('client.product.search');
    Route::get('/product/image/{product_id}', 'download_images')->name('download_product_images');
    Route::get('/category/{category_id}', 'viewFromCategory')->name('home.categoryProductView');
});

Route::controller(ClientAnnouncementController::class)->group(function(){
    Route::get('/accouncement', 'announcementList')->name('client.announcement.list');
    Route::get('/accouncement/{id}', 'announcement_view')->name('client.announcement.view');
});
Route::post('/update-data', [AccountController::class, 'updateData'])->name('account.update');


Route::group(['middleware'=> ['web', 'type.distributor']], function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/logout', 'logout')->name('logout');
    });
    Route::controller(DistDashboard::class)->group(function(){
        Route::get('/dashboard', 'index')->name('dist.dashboard');
    });
    Route::controller(EditProfileController::class)->group(function(){
        Route::get('/profile', 'edit_distributor_profile')->name('dist.edit_profile');
        Route::post('/profile/update', 'update_distributor_profile')->name('dist.update_profile');
    });
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/login','loginView')->name('login');
    Route::post('/login', 'login')->name('login');
    Route::post('/signup', 'register')->name('register.dist');
    Route::get('/email_verify', 'email_verify')->name('email_verify');
    Route::get('/facebook', 'login_with_facebook')->name('login.facebook');
    Route::get('/facebook/callback', 'login_with_facebook_callback')->name('facebook.callback');
    Route::get('/google', 'login_with_google')->name('login.google');
    Route::get('/google/callback', 'login_with_google_callback')->name('google.callback');
});
