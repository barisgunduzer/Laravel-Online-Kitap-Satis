<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public static function totalshipmentfee(){
        $totalshipmentfee = 0;
        $orders = Order::all();
        foreach($orders as $rs){
            if($rs->total < 100)
            $totalshipmentfee += 10;
        }
        return $totalshipmentfee;
    }

    public function index(){
        $users = User::all();
        $orders = Order::select('id','user_id','name','email','address','phone','total','note','IP','status','created_at','updated_at')->orderByDesc('created_at')->get();
        $orderitems = Orderitem::select('id','user_id','order_id','product_id','price','quantity','amount','note','status','created_at','updated_at')->orderByDesc('created_at')->get();
        return view('admin.index',['users'=>$users,'orders'=>$orders,'orderitems'=>$orderitems]);
    }
}
