<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail(Request $request, $isbn){
        $book = Book::where('isbn', $isbn)->first();
        return view('detail',['book'=>$book])-> layout('layouts.app');
    }
}
