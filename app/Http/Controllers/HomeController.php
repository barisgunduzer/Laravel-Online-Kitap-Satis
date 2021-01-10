<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    ##### Site Önayarları #####
    public static function getsetting(){
        return Setting::first();
    }

    ##### Ana Kategoriler #####
    public static function categorylist(){
        return Category::where('parent_id','=',0)->with('children')->get();
    }

    ##### Kitap Sayısı #####
    public static function numberofbooks($id){
        $books = Product::where('category_id','=',$id);
        return $books->count();
    }

    ##### Ürün Detay #####
    public function product($id, $slug){
        $data = Product::find($id);
        print_r($data);
        exit();
    }

    ##### Ürün Kategori #####
    public function category($id, $slug){
        $categories = Category::all();
        $category = Category::find($id);
        $book = Product::where('category_id',$id)->get();
        return view('home.category_products',['categories'=>$categories,'category'=>$category,'book'=>$book]);
    }


    ##### Anasayfa #####
    public function index(){
        $setting = Setting::first();
        $slider = Product::select('id','title','author_name','image','price','slug')->limit(8)->get();

        $data = [
            'setting'=>$setting,
            'slider'=>$slider,
            'page'=>'home'
        ];

        return view('home.index',$data);
    }

    ##### Hakkımızda #####
    public function aboutus(){
        $setting = Setting::first();
        return view('home.aboutus',['setting'=>$setting]);
    }

    ##### Referanslar #####
    public function references(){
        $setting = Setting::first();
        return view('home.references',['setting'=>$setting]);
    }

    ##### İletişim #####
    public function contact(){
        $setting = Setting::first();
        return view('home.contact',['setting'=>$setting]);
    }

    public function sendmessage(Request $request){
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->save();
        return redirect()->route('contact')->with('success','Mesajınız kaydedildi, Teşekkür ederiz.');
    }

    ##### Sıkça Sorulan Sorular #####
    public function faq(){

        return view('home.faq');
    }

    ##### Giriş Sayfası #####
    public function login(){

        return view('home.login');
    }

    ##### Giriş Denetçisi #####
    public function logincheck(Request $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    ##### Çıkış Denetçisi #####
    public function logout(Request $request){

        auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
