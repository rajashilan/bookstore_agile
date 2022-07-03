<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail(Request $request, $isbn){
        $book = Book::where('isbn', $isbn)->first();
        $reviews = Review::where('isbn', $isbn)->orderBy('created_at', 'desc')->get();
        return view('detail',['book'=>$book, 'reviews'=>$reviews])-> layout('layouts.app');
    }
}
