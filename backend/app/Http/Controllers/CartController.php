<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Book;
use App\Models\recently_viewed;
use Illuminate\Http\Request;
use Auth;
use DB;


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

                $book = Book::where('isbn', $isbn)->first();
                $qtyold = $book->quantity;
                $qtynew = $qtyold - 1; 
                $book->quantity = $qtynew;
                Book::where('isbn',$isbn)->update(array('quantity'=>$qtynew));

                return redirect()->back()->with('message','Added to Cart Successfully!');
            }
        }
        else{
            return redirect()->back()->with('login_message','Please login to proceed!');
        }
    }

    public function deletefromcart(Request $request, $isbn){
        if(Auth::user()) {
        $id = Auth::user()->id;
        if (Cart::where('isbn', $isbn)->where('user_id', $id)->exists()){
           Cart::where('isbn',$isbn)->where('user_id', $id)->delete();
           return redirect()->back()->with('message','Deleted from cart successfully!');
        }
        }
        else{
            return redirect()->back()->with('login_message','Please login to proceed!');
        }
    }

    public function cart(){

        if(Auth::user()) {
            $cartarray = array();
            $orderarray = array();
            $id = Auth::user()->id;

            $cart = Cart::where('user_id', $id)->get();
            $orderitems = OrderItems::where('user_id', $id)->get();

            if ($cart == null || $cart == ""){
                return redirect()->back()->with('message','No item found in cart!');
            }

            foreach($cart as $record){
                $isbn = $record->isbn;
                $book = Book::where('isbn', $isbn)->get();
                $cartdetails = compact("record", "book");
                array_push($cartarray, $cartdetails);
            }

            $getrecentlyviews = 
            recently_viewed::
            select(DB::raw('*, max(created_at) as created_at'))               
            ->orderBy('created_at', 'desc')
            ->groupBy('book_cat')
            ->limit(3)
            ->pluck('book_cat');

            $basedonrecentlyviewed = Book::whereIn('category',$getrecentlyviews)
            ->get();

            return view('cart',['cartarray'=>$cartarray,'basedonrecentlyviewed'=>$basedonrecentlyviewed])-> layout('layouts.app');
            if ($orderitems == null || $orderitems == ""){
                return redirect()->back()->with('message','No item found in cart!');
            }

            foreach($orderitems as $record){
                $isbn = $record->isbn;
                $book = Book::where('isbn', $isbn)->get();
                $orderdetails = compact("record", "book");
                array_push($orderarray, $orderdetails);
            }

            dd($cartarray);
            return view('cart') -> with('cartarray', $cartarray) -> with('orderarray', $orderarray) -> layout('layouts.app');
        }
        else{
            return redirect()->back()->with('login_message','Please login to proceed!');
        }
    }

    public function editQty(Request $request){
        $id = $request->input('id');
        $qty = $request->input('quantity');
        $isbn = $request->input('isbn');
        $record = Cart::find($id);
        $record->quantity = abs($qty);
        $record->update();
        $cartbookqty = abs($qty);

        $book = Book::where('isbn', $isbn)->first();
        $qtyold = $book->quantity;
        $qtynew = 0;
        if ($qty > 0){
            $qtynew = $qtyold - 1; 
        }
        else if ($qty < 0){
            $qtynew = $qtyold + 1;
        }
        Book::where('isbn',$isbn)->update(array('quantity'=>$qtynew));
        $successdata = compact("qtynew", "cartbookqty");
        return response()->json($successdata);
        
    }
}
