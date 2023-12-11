<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\products;
use App\Models\cart;


class cartcontroller extends Controller
{
    public function addtocart(Request $request){
           $product_id=$request->input('product_id');
           $product_qty=$request->input('product_qty');
           if(Auth::check()){

            $prod_check=products::where('id',$product_id)->first();
            if($prod_check){
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                    return response()->json(["status"=>"already added to cart"]);
                
                }else{

                
                    
             $cartitem = new Cart;
             $cartitem->prod_id= $product_id;
             $cartitem->user_id= Auth::id();
             $cartitem->prod_qty= $product_qty;
             $cartitem->save();
             return response()->json(["status"=>"Added to Cart"]);
                }

            }else{
                return response()->json(["status"=>"Product not Found"]);

            }
           }else{
            return response()->json(["status"=>"Please login First"]);
           }

    }
    public function viewcart(){
        $cart=Cart::where('user_id',Auth::id())->get();
        // dd($cart);
        return view('frontend.cart',compact('cart'));
    }

    public function updatecart(Request $request){
        $product_qty=$request->input('qty');
        $product_id=$request->input('prod_id');
        if(Auth::check()){
             if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
              $cart=Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
              $cart->prod_qty=$product_qty;
              $cart->update();
        return response()->json(["status"=>"Quantity updated"]);

             }


        }else{
        return response()->json(["status"=>"Please login First"]);
            
        }
    }
    public function deletecartitem(Request $request){
        if(Auth::check()){
           $prod_id= $request->input('prod_id');
           if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists()){
            $cartitem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
            $cartitem->delete();
             return response()->json(["status"=>"item deleted successfully"]);

           }
        
        
        else{
        return response()->json(["status"=>"Please login First"]);
             }
       }
    }
}
