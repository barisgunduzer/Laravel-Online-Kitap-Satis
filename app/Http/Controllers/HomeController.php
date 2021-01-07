<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public static function categorylist(){
        return Category::where('parent_id','=',0)->with('children')->get();
    }

    public static function getsetting(){
        return Setting::first();
    }

    ##### Anasayfa #####
    public function index(){
        $setting = Setting::first();
        return view('home.index',['setting'=>$setting]);
    }

    ##### Hakkımızda #####
    public function aboutus(){

        return view('home.aboutus');
    }

    ##### Hakkımızda #####
    public function references(){

        return view('home.aboutus');
    }

    ##### İletişim #####
    public function contact(){

        return view('home.aboutus');
    }

    ##### Sıkça Sorulan Sorular #####
    public function faq(){

        return view('home.aboutus');
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
