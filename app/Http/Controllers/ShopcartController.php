<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;
use App\Models\Shopcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShopcartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function myshopcart(){
        return Shopcart::where('user_id',Auth::id())->get();
    }

    public static function countmyshopcart(){
        $cart_items = Shopcart::where('user_id',Auth::id())->get();
        return $cart_items->count();
    }

    public static function subtotal(){
        $subtotal = 0;
        $cart = Shopcart::where('user_id',Auth::id())->get();
        foreach($cart as $rs){
            $subtotal += $rs->product->price * $rs->quantity;
        }
        return $subtotal;
    }

    public function index()
    {
        $setting = Setting::first();
        $cart = Shopcart::where('user_id',Auth::id())->get();
        return view('home.user_shopcart',['cart' => $cart, 'setting' => $setting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $user = Auth::id();
        if($user == NULL){
            return redirect()->back()->with('warning','Sepete eklemeden önce giriş yapmalısınız.');
        }

        else{
            $cart_item = Shopcart::where('product_id',$id)->where('user_id',$user)->first();
            if($cart_item){
                if($request->input('quantity') == NULL){
                    $cart_item->quantity += 1;
                    $cart_item->save();
                    return redirect()->back()->with('success','Ürün sepete eklendi.');
                }
                else{
                    $cart_item->quantity += $request->input('quantity');
                    $cart_item->save();
                    return redirect()->back()->with('success','Ürün sepete eklendi.');
                }
            }
            else{
                if($request->input('quantity') == NULL){
                    $cart_item = new Shopcart;
                    $cart_item->user_id = Auth::id();
                    $cart_item->product_id = $id;
                    $cart_item->quantity = 1;
                    $cart_item->save();
                    return redirect()->back()->with('success','Ürün sepete eklendi.');$cart_item->quantity = 1;
                }
                else{
                    $cart_item = new Shopcart;
                    $cart_item->user_id = Auth::id();
                    $cart_item->product_id = $id;
                    $cart_item->quantity = $request->input('quantity');
                    $cart_item->save();
                    return redirect()->back()->with('success','Ürün sepete eklendi.');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shopcart  $shopcart
     * @return \Illuminate\Http\Response
     */
    public function show(Shopcart $shopcart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shopcart  $shopcart
     * @return \Illuminate\Http\Response
     */
    public function edit(Shopcart $shopcart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shopcart  $shopcart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart_item = Shopcart::find($id);
        $cart_item->quantity = $request->input('quantity');
        $cart_item->save();
        return redirect()->back()->with('success','Sepet başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shopcart  $shopcart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart_item = Shopcart::find($id);
        $cart_item->delete();
        return redirect()->back()->with('success','Ürün sepetten kaldırıldı.');
    }
}
