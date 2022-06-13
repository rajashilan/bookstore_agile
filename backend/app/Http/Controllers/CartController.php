<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Auth;


class CartController extends Controller
{
    public function addtocart(Request $request, $isbn){

        if(Auth::user()) {
            $id = Auth::user()->id;

            if (Cart::where('isbn', $isbn)->where('user_id', $id)->exists()){
                return redirect()->back()->with('cart_exist_msg','Already existed in the cart!');
            }
            else{
                $cart = new Cart;
                $cart->isbn = $isbn;
                $cart->user_id = $id;
                $cart->save();
                return redirect()->back()->with('message','Added to Cart Successfully!');
            }
        }
        else{
            return redirect()->back()->with('login_message','Please login to proceed!');
        }
    }
}
