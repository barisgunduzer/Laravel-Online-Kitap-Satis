<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Setting;
use App\Models\Shopcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function countitems($id){
        $ordered_items = Orderitem::where('order_id',$id)->get();
        return $ordered_items->count();
    }

    public function index()
    {
        $setting = Setting::first();
        $orders = Order::where('user_id',Auth::id())->get();
        return view('home.user_orders',['orders' => $orders,'setting' => $setting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $setting = Setting::first();
        $cart = Shopcart::where('user_id',Auth::id())->get();
        $subtotal = $request->input('total');
        return view('home.checkout',['subtotal' => $subtotal, 'setting' => $setting, 'cart' => $cart]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #Get credit card information and send to bank web service if everything is ok

        $data = new Order;
        $data->user_id = Auth::id();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->address = $request->input('address');
        $data->phone = $request->input('phone');
        $data->total = $request->input('total');
        $data->IP = $_SERVER['REMOTE_ADDR'];
        $data->save();

        #Find cart items belongs to user and save to order table and orderitems table

        $cart = Shopcart::where('user_id',Auth::id())->get();
        foreach($cart as $rs){
            $data2 = new Orderitem;
            $data2->user_id = Auth::id();
            $data2->product_id = $rs->product_id;
            $data2->order_id = $data->id;
            $data2->price = $rs->product->price;
            $data2->quantity = $rs->quantity;
            $data2->amount = $rs->quantity * $rs->product->price;
            $data2->save();
        }

        #Empty shop cart

        $cart = Shopcart::where('user_id',Auth::id());
        $cart->delete();

        return redirect()->route('myorders')->with('success','Siparişiniz alındı');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = Setting::first();
        $datalist = Orderitem::where('user_id',Auth::id())->where('order_id',$id)->get();
        return view('home.user_order_detail',['datalist' => $datalist, 'setting' => $setting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
