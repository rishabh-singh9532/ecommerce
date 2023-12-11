<?php

namespace App\Http\Controllers\admin;
use App\Models\order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ordercontroller extends Controller
{
    public function index(){
        $order=Order::where('status',0)->get();
        return view('admin.order.index',compact('order'));
    }
    public function adminvieworder($id){
        // dd('okk');
        $order=Order::where('id',$id)->first();
        return view('admin.order.view',compact('order'));
    }

    public function orderupdate($id,Request $request){
        $order=Order::find($id);
        // dd($order);
        $order->status=$request['status'];
        $order->update();
        return redirect()->route('order.index')->with('status','order status Updated');
    }

    public function orderhistory(){
        $order=Order::where('status',1)->get();
        return view('admin.order.history',compact('order'));
    }
}
