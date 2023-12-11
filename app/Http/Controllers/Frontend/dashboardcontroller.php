<?php

namespace App\Http\Controllers\Frontend;
use App\Models\order;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function index(){
      $order=Order::where('user_id',Auth::user()->id)->get();

        return view('frontend.dashboard',compact('order'));
    }

    public function vieworder($id){
        $order=Order::where('id',$id)->where('user_id',Auth::user()->id)->first();
        return view('frontend.order.view',compact('order'));
       
    }
}
