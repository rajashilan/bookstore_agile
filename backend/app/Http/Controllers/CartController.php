<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Book;
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

    public function cart(){

        if(Auth::user()) {
            $cartarray = array();
            $id = Auth::user()->id;

            $cart = Cart::where('user_id', $id)->get();

            if ($cart == null || $cart == ""){
                return redirect()->back()->with('message','No item found in cart!');
            }

            foreach($cart as $record){
                $isbn = $record->isbn;
                $book = Book::where('isbn', $isbn)->get();
                $cartdetails = compact("record", "book");
                array_push($cartarray, $cartdetails);
            }
           // dd($cartarray);
            return view('cart',['cartarray'=>$cartarray])-> layout('layouts.app');
        }
        else{
            return redirect()->back()->with('login_message','Please login to proceed!');
        }
    }

    public function editQty(Request $request){
        $id = $request->input('id');
        $qty = $request->input('quantity');
        $record = Cart::find($id);
        $record->quantity = $qty;
        $record->update();
        return response()->json(['success'=>$qty]);
    }
}
