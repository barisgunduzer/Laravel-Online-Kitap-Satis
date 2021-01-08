<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProductController;
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
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/references', [HomeController::class, 'references'])->name('references');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

#Admin
Route::middleware('auth')->prefix('admin')->group(function(){

    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_home');

    #Category
    Route::get('category', [CategoryController::class, 'index'])->name('admin_category');
    Route::get('category/add', [CategoryController::class, 'add'])->name('admin_category_add');
    Route::post('category/create', [CategoryController::class, 'create'])->name('admin_category_create');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin_category_edit');
    Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('admin_category_update');
    Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin_category_delete');
    Route::get('category/show', [CategoryController::class, 'show'])->name('admin_category_show');

    #Product
    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('admin_products');
        Route::get('create', [ProductController::class, 'create'])->name('admin_product_add');
        Route::post('store', [ProductController::class, 'store'])->name('admin_product_store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin_product_edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('admin_product_update');
        Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('admin_product_delete');
        Route::get('show', [ProductController::class, 'show'])->name('admin_product_show');
    });

    #Product Image Gallery
    Route::prefix('image')->group(function(){
        Route::get('create/{product_id}', [ImageController::class, 'create'])->name('admin_image_add');
        Route::post('store/{product_id}', [ImageController::class, 'store'])->name('admin_image_store');
        Route::get('delete/{product_id}/{id}', [ImageController::class, 'destroy'])->name('admin_image_delete');
        Route::get('show', [ImageController::class, 'show'])->name('admin_image_show');
    });

    #Setting
    Route::get('setting', [SettingController::class, 'index'])->name('admin_setting');
    Route::post('setting/update', [SettingController::class, 'update'])->name('admin_setting_update');
});

#User
Route::middleware('auth')->prefix('myaccount')->namespace('myaccount')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('myprofile');
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
