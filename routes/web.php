<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopcartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
##### Anasayfa #####
Route::redirect('/anasayfa','/home');

Route::get('/', function () {
    return view('home.index');
});

*/

#Route::get('/test/{id}/{name}', [HomeController::class, 'test'])->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);
#Route::get('/test/{id}/{name}', [HomeController::class, 'test'])->name('test')->whereNumber('id')->whereAlpha('name');

/*Route::get('/home2', function () {
    return view('welcome');
});*/

#Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hakkimizda', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/referanslar', [HomeController::class, 'references'])->name('references');
Route::get('/iletisim', [HomeController::class, 'contact'])->name('contact');
Route::post('/gonder', [HomeController::class, 'sendmessage'])->name('sendmessage');
Route::get('/sss', [HomeController::class, 'faq'])->name('faq');

#Quick View
Route::get('/hizlibakis/{id}/{slug}', [HomeController::class, 'quickview'])->name('quickview');

#Product Detail
Route::get('/kitap/{id}/{slug}', [HomeController::class, 'product'])->name('product');

#Add Product Review
Route::post('/kitap/yorumekle/{id}', [ReviewController::class, 'addreview'])->name('addreview');

#Delete Product Review
Route::get('/kitap/yorumsil/{id}', [UserController::class, 'destroyreview'])->name('destroyreview');

#Category Product List
Route::get('/kategori/{id}/{slug}', [HomeController::class, 'category'])->name('category');

#Search Product
Route::post('/getproduct', [HomeController::class, 'getproduct'])->name('getproduct');

#Search Product List
Route::get('/aramasonucu/{search}', [HomeController::class, 'productlist'])->name('productlist');

#Admin
Route::middleware('auth')->prefix('admin')->group(function(){

    #Admin Role
    Route::middleware('admin')->group(function() {

        #Admin Home
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_home');

        #Category
        Route::get('/category', [CategoryController::class, 'index'])->name('admin_category');
        Route::get('/category/add', [CategoryController::class, 'add'])->name('admin_category_add');
        Route::post('/category/create', [CategoryController::class, 'create'])->name('admin_category_create');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin_category_edit');
        Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('admin_category_update');
        Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin_category_delete');
        Route::get('/category/show', [CategoryController::class, 'show'])->name('admin_category_show');

        #Product
        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin_products');
            Route::get('/create', [ProductController::class, 'create'])->name('admin_product_add');
            Route::post('/store', [ProductController::class, 'store'])->name('admin_product_store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin_product_edit');
            Route::post('/update/{id}', [ProductController::class, 'update'])->name('admin_product_update');
            Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('admin_product_delete');
            Route::get('/show', [ProductController::class, 'show'])->name('admin_product_show');
        });

        #Product Image Gallery
        Route::prefix('image')->group(function () {
            Route::get('/create/{product_id}', [ImageController::class, 'create'])->name('admin_image_add');
            Route::post('/store/{product_id}', [ImageController::class, 'store'])->name('admin_image_store');
            Route::get('/delete/{product_id}/{id}', [ImageController::class, 'destroy'])->name('admin_image_delete');
            Route::get('/show', [ImageController::class, 'show'])->name('admin_image_show');
        });

        #Message
        Route::prefix('messages')->group(function () {
            Route::get('/', [MessageController::class, 'index'])->name('admin_message');
            Route::get('/edit/{id}', [MessageController::class, 'edit'])->name('admin_message_edit');
            Route::post('/update/{id}', [MessageController::class, 'update'])->name('admin_message_update');
            Route::get('/delete/{id}', [MessageController::class, 'destroy'])->name('admin_message_delete');
            Route::get('/show', [MessageController::class, 'show'])->name('admin_message_show');
        });

        #Review
        Route::prefix('review')->group(function () {
            Route::get('/', [ReviewController::class, 'index'])->name('admin_review');
            Route::post('/update/{id}', [ReviewController::class, 'update'])->name('admin_review_update');
            Route::get('/delete/{id}', [ReviewController::class, 'destroy'])->name('admin_review_delete');
            Route::get('/show/{id}', [ReviewController::class, 'show'])->name('admin_review_show');
        });

        #Order
        Route::prefix('order')->group(function () {
            Route::get('/', [AdminOrderController::class, 'index'])->name('admin_orders');
            Route::get('/list/{status}', [AdminOrderController::class, 'list'])->name('admin_order_list');
            Route::post('/create', [AdminOrderController::class, 'create'])->name('admin_order_add');
            Route::get('/store', [AdminOrderController::class, 'store'])->name('admin_order_store');
            Route::get('/edit/{id}', [AdminOrderController::class, 'edit'])->name('admin_order_edit');
            Route::post('/update/{id}', [AdminOrderController::class, 'update'])->name('admin_order_update');
            Route::post('/itemupdate/{id}', [AdminOrderController::class, 'itemupdate'])->name('admin_order_item_update');
            Route::get('/delete/{id}', [AdminOrderController::class, 'destroy'])->name('admin_order_delete');
            Route::get('/show/{id}', [AdminOrderController::class, 'show'])->name('admin_order_show');
        });

        #User
        Route::prefix('user')->group(function () {
            Route::get('/', [AdminUserController::class, 'index'])->name('admin_users');
            Route::post('/create', [AdminUserController::class, 'create'])->name('admin_user_add');
            Route::get('/store', [AdminUserController::class, 'store'])->name('admin_user_store');
            Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('admin_user_edit');
            Route::post('/update/{id}', [AdminUserController::class, 'update'])->name('admin_user_update');
            Route::get('/delete/{id}', [AdminUserController::class, 'destroy'])->name('admin_user_delete');
            Route::get('/show/{id}', [AdminUserController::class, 'show'])->name('admin_user_show');
            Route::get('/userrole/{id}', [AdminUserController::class, 'user_roles'])->name('admin_user_roles');
            Route::post('/userrolestore/{id}', [AdminUserController::class, 'user_role_store'])->name('admin_user_role_add');
            Route::get('/userroledelete/{userid}/{roleid}', [AdminUserController::class, 'user_role_delete'])->name('admin_user_role_delete');
        });

        #Faq
        Route::prefix('faq')->group(function () {
            Route::get('/', [FaqController::class, 'index'])->name('admin_faq');
            Route::get('/create', [FaqController::class, 'create'])->name('admin_faq_add');
            Route::post('/store', [FaqController::class, 'store'])->name('admin_faq_store');
            Route::get('/edit/{id}', [FaqController::class, 'edit'])->name('admin_faq_edit');
            Route::post('/update/{id}', [FaqController::class, 'update'])->name('admin_faq_update');
            Route::get('/delete/{id}', [FaqController::class, 'destroy'])->name('admin_faq_delete');
            Route::get('/show', [FaqController::class, 'show'])->name('admin_faq_show');
        });

        #Setting
        Route::get('/setting', [SettingController::class, 'index'])->name('admin_setting');
        Route::post('/setting/update', [SettingController::class, 'update'])->name('admin_setting_update');

    }); #Admin
}); #Auth

#User
Route::get('/hesabim', [UserController::class, 'index'])->name('myprofile');
Route::get('/yorumlarim', [UserController::class, 'myreviews'])->name('myreviews');
Route::get('/yorumlarim/sil/{id}', [UserController::class, 'destroyreview'])->name('user_review_delete');


#ShopCart
Route::get('/sepetim', [ShopcartController::class, 'index'])->name('myshopcart');
Route::post('/sepeteekle/{id}', [ShopcartController::class, 'store'])->name('myshopcart_add');
Route::get('/sepeteekle/{id}', [ShopcartController::class, 'store'])->name('myshopcart_add_single');
Route::post('/sepetiguncelle/{id}', [ShopcartController::class, 'update'])->name('myshopcart_edit');
Route::get('/sepettencikar/{id}', [ShopcartController::class, 'destroy'])->name('myshopcart_delete');

#Order
Route::post('/odeme', [OrderController::class, 'create'])->name('myorders_add');
Route::post('/siparisver', [OrderController::class, 'store'])->name('myorders_store');
Route::get('/siparislerim', [OrderController::class, 'index'])->name('myorders');
Route::get('/siparislerim/duzenle/{id}', [OrderController::class, 'edit'])->name('myorders_edit');
Route::post('/siparislerim/guncelle/{id}', [OrderController::class, 'update'])->name('myorders_update');
Route::get('/siparislerim/iptal/{id}', [OrderController::class, 'destroy'])->name('myorders_delete');
Route::get('/siparislerim/detay/{id}', [OrderController::class, 'show'])->name('myorders_show');

#Admin Login
Route::get('/admin/login',[HomeController::class, 'login'])->name('admin_login');
Route::post('/admin/logincheck',[HomeController::class, 'logincheck'])->name('admin_logincheck');
Route::get('/logout',[HomeController::class, 'logout'])->name('logout');

#Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
