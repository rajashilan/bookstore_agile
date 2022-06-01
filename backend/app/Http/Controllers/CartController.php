<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addtocart(Request $request, $isbn){
        
        $cart = new Cart;
        $cart->isbn = $isbn;
        $cart->save();
        return redirect()->back()->with('message','Added to Cart Successfully!');

    }
}
