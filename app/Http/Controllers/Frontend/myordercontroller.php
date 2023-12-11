<?php

namespace App\Http\Controllers\Frontend;
use Auth;
use App\Models\order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class myordercontroller extends Controller
{
    public function index()
    {
      $order=Order::where('user_id',Auth::user()->id)->get();
      return view('frontend.order.index');
    }
}
