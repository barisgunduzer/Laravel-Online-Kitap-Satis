<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

#Add to Cart
Route::get('/sepeteekle/{id}', [HomeController::class, 'addtocart'])->name('addtocart');

#Get Product
Route::post('/getproduct', [HomeController::class, 'getproduct'])->name('getproduct');

#Product List
Route::post('/productlist/{search}', [HomeController::class, 'productlist'])->name('productlist');

#Admin
Route::middleware('auth')->prefix('admin')->group(function(){

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
    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('admin_products');
        Route::get('/create', [ProductController::class, 'create'])->name('admin_product_add');
        Route::post('/store', [ProductController::class, 'store'])->name('admin_product_store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin_product_edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('admin_product_update');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('admin_product_delete');
        Route::get('/show', [ProductController::class, 'show'])->name('admin_product_show');
    });

    #Product Image Gallery
    Route::prefix('image')->group(function(){
        Route::get('/create/{product_id}', [ImageController::class, 'create'])->name('admin_image_add');
        Route::post('/store/{product_id}', [ImageController::class, 'store'])->name('admin_image_store');
        Route::get('/delete/{product_id}/{id}', [ImageController::class, 'destroy'])->name('admin_image_delete');
        Route::get('/show', [ImageController::class, 'show'])->name('admin_image_show');
    });

    #Message
    Route::prefix('messages')->group(function(){
        Route::get('/', [MessageController::class, 'index'])->name('admin_message');
        Route::get('/edit/{id}', [MessageController::class, 'edit'])->name('admin_message_edit');
        Route::post('/update/{id}', [MessageController::class, 'update'])->name('admin_message_update');
        Route::get('/delete/{id}', [MessageController::class, 'destroy'])->name('admin_message_delete');
        Route::get('/show', [MessageController::class, 'show'])->name('admin_message_show');
    });

    #Review
    Route::prefix('review')->group(function() {
        Route::get('/', [ReviewController::class, 'index'])->name('admin_review');
        Route::post('/update/{id}', [ReviewController::class, 'update'])->name('admin_review_update');
        Route::get('/delete/{id}', [ReviewController::class, 'destroy'])->name('admin_review_delete');
        Route::get('/show/{id}', [ReviewController::class, 'show'])->name('admin_review_show');
    });

    #Faq
    Route::prefix('faq')->group(function(){
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
});

#User
Route::middleware('auth')->prefix('hesabim')->namespace('hesabim')->group(function(){
    Route::get('/kullanicibilgilerim', [UserController::class, 'index'])->name('myprofile');
    Route::get('/yorumlarim', [UserController::class, 'myreviews'])->name('myreviews');
    Route::get('/yorumlarim/sil/{id}', [UserController::class, 'destroyreview'])->name('user_review_delete');
});

Route::middleware('auth')->prefix('user')->namespace('user')->group(function(){
    Route::get('/profile', [UserController::class, 'index'])->name('userprofile');
});

#Admin Login
Route::get('/admin/login',[HomeController::class, 'login'])->name('admin_login');
Route::post('/admin/logincheck',[HomeController::class, 'logincheck'])->name('admin_logincheck');
Route::get('/logout',[HomeController::class, 'logout'])->name('logout');

#Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
