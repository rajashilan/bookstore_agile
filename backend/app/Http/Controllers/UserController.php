<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Book;
use App\Models\Cart;
use App\Models\recently_viewed;

class UserController extends Controller
{
    public function login(){
        $userType = '';
        $userName = '';

        if(Auth::user()){
            $userName = Auth::user()->name;
            $userType = Auth::user()->user_type;

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


            $books = Book::all();

            $getrecentlyviews = 
            recently_viewed::
            select(DB::raw('*, max(created_at) as created_at'))               
            ->orderBy('created_at', 'desc')
            ->groupBy('book_cat')
            ->limit(3)
            ->pluck('book_cat');

            $basedonrecentlyviewed = Book::whereIn('category',$getrecentlyviews)
            ->get();

            return view('home', compact('userType', 'userName', 'books', 'cartarray','basedonrecentlyviewed'))->layout('layouts.app');
        }
        else{
            return redirect()->back()->with('login_message','Please login to proceed!');
        }
    
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function home(){
        //dd(Auth::user());
                if(Auth::user()){
            $userName = Auth::user()->name;
            $userType = Auth::user()->user_type;

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

            $getrecentlyviews = 
            recently_viewed::
            select(DB::raw('*, max(created_at) as created_at'))               
            ->orderBy('created_at', 'desc')
            ->groupBy('book_cat')
            ->limit(3)
            ->pluck('book_cat');

         


            $basedonrecentlyviewed = Book::whereIn('category',$getrecentlyviews)
          
            ->get();
                            

         


          

            $books = Book::all();
            return view('home', compact('userType', 'userName', 'books', 'cartarray','basedonrecentlyviewed'))->layout('layouts.app');
        }
        else{
            $books = Book::all();
            return view('home',['books'=>$books])-> layout('layouts.app');
        }
    }

    public function editProfile(){
        
    }
}
