<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\order;
use Str;
use App\Models\order_item;
use Auth;
use App\Models\User;
use App\Models\products;

class checkoutcontroller extends Controller
{
    public function index()
    {
        $oldcart = Cart::where('user_id', Auth::id())->get();
        foreach ($oldcart as $item) {


            if (!Products::where('id', $item->prod_id)->where('quantity', '>=', $item->prod_qty)->exists()) {
                $removeitem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeitem->delete();
            }
            $cart = Cart::where('user_id', Auth::id())->get();


        }
        return view('frontend.checkout', compact('cart'));
    }

    public function placeorder(Request $request)
    {
        $order = new order;
        $order->user_id = Auth::user()->id;
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $order->tracking_no = 'sharma' . rand(1111, 9999);
        // to calculate total price 
        $total = 0;
        $cartprice_total = Cart::where('user_id', Auth::user()->id)->get();
        foreach ($cartprice_total as $totalprice) {
            $total += $totalprice->product->selling_price;
        }
        $order->total_price=$total;
        $order->save();

        $cart = Cart::where('user_id', Auth::id())->get();
        foreach ($cart as $item) {


            order_item::create([

                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->product->original_price,

            ]);

            $prod = products::where('id', $item->prod_id)->first();
            $prod->quantity = $prod->quantity - $item->prod_qty;
            $prod->update();

        }
        if (Auth::user()->address1 == Null) {
            $user = User::where('id', Auth::user()->id)->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');

            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }

        $cartitems = Cart::where('user_id', Auth::user()->id)->get();
        Cart::destroy($cartitems);
        return redirect('checkout-status')->with('success', 'Order Placed Successfully');
    }
    public function checkoutstatus(){
        return view('frontend.checkoutstatus');
    }
}
