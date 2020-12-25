<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    ##### Anasayfa #####
    public function index(){

        return view('home.index');
    }

    ##### Hakkımızda #####
    public function aboutus(){

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
