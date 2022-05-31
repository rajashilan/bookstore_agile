<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addtocart(Request $request, $isbn){
        
        $book = Book::find($isbn);
        $cart = new Cart;
        $cart->
    }
}
