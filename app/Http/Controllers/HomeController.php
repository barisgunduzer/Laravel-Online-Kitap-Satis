<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
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

    ##### İlişkilendirilmiş Kategori Etiketleri #####
    public static function categorytags($category, $title){
        if($category->parent_id == 0){
            return $title;
        }
        $parent = Category::find($category->parent_id);
        $title = $parent->title.' > '.$title;

        return HomeController::categorytags($parent,$title);
    }

    ##### Kitap Sayısı #####
    public static function numberofbooks($id){
        $books = Product::where('category_id','=',$id);
        return $books->count();
    }

    ##### Sepete Ekle #####
    public function addtocart($id){
        $data = Product::find($id);
        print_r($data);
        exit();
    }

    ##### Hızlı Göz Atma #####
    public function quickview($id, $slug){
        $book = Product::find($id);
    }

    ##### Ürün Arama #####
    public function getproduct(Request $request){

//        $data = Product::where('title',$request->input('search'))->first();
//        return redirect()->route('product',['id'=>$data->id,'slug'=>$data->slug]);

        $search= $request->input('search');

        $count = Product::where('title','like','%'.$search.'%')->get()->count();
        if($count == 1)
        {
            $data = Product::where('title','like','%'.$search.'%')->first();
            return redirect()->route('product',['id'=>$data->id,'slug'=>$data->slug]);
        }
        else{
            return redirect()->route('productlist',['search'=>$search]);
        }

    }

    ##### Arama Sonucu Listeleme #####
    public function productlist($search){
        $books = Product::where('title','like','%'.$search.'%')->get();
        $count = $books->count();
        $categories = Category::all();
        return view('home.search_products',['search'=>$search,'books'=>$books,'categories'=>$categories,'count'=>$count]);
    }

    ##### Ürün Detay #####
    public function product($id, $slug){
        $setting = Setting::first();
        $book = Product::find($id);
        $images = Image::where('product_id',$id)->get();
        $categories = Category::all();
        $category = Category::find($book->category_id);
        $relatedbooks = Product::where('category_id',$book->category_id)->inRandomOrder()->get();
        return view('home.product_detail',['book'=>$book,'images'=>$images,'setting'=>$setting,'categories'=>$categories,'category'=>$category,'relatedbooks'=>$relatedbooks]);
    }

    ##### Ürün Kategori #####
    public function category($id, $slug){
        $categories = Category::all();
        $category = Category::find($id);
        $books = Product::where('category_id',$id)->get();
        return view('home.category_products',['categories'=>$categories,'category'=>$category,'books'=>$books]);
    }

    ##### Anasayfa #####
    public function index(){
        $setting = Setting::first();
        $p_categories = Category::where('parent_id','=',0)->get();
        $allbooks = Product::all();
        $newbooks = Product::select('id','title','author_name','image','price','slug')->limit(8)->orderByDesc('id')->get();
        $bestseller = Product::select('id','title','author_name','image','price','slug')->limit(7)->inRandomOrder()->get();
        $picked = Product::select('id','title','author_name','image','price','slug')->limit(8)->inRandomOrder()->get();

        $data = [
            'setting'=>$setting,
            'p_categories'=>$p_categories,
            'allbooks'=>$allbooks,
            'newbooks'=>$newbooks,
            'bestseller'=>$bestseller,
            'picked'=>$picked,
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
