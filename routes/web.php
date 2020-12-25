<?php

use App\Http\Controllers\HomeController;
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

#Route::get('/test/{id}/{name}', [HomeController::class, 'test'])->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);
#Route::get('/test/{id}/{name}', [HomeController::class, 'test'])->name('test')->whereNumber('id')->whereAlpha('name');

### Laravel_Karşılama_Sayfası ###
Route::get('/home2', function () {
    return view('welcome');
});

##### Anasayfa #####
Route::redirect('/anasayfa','/home');

Route::get('/', function () {
    return view('home.index');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

##### Admin_Paneli #####
Route::get('/admin', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin_home')->middleware('auth');

##### Giriş_Sayfası #####
Route::get('/admin/login',[HomeController::class, 'login'])->name('admin_login');

##### Giriş_Denetçisi #####
Route::post('/admin/logincheck',[HomeController::class, 'logincheck'])->name('admin_logincheck');

##### Çıkış #####
Route::get('/admin/logout',[HomeController::class, 'logout'])->name('admin_logout');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
