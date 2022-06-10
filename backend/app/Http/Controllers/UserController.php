<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Book;

class UserController extends Controller
{
    public function login(){
        $userType = '';
        $userName = '';

        if(Auth::user()){
            $userName = Auth::user()->name;
            $userType = Auth::user()->user_type;
        }
        
        $books = Book::all();
        return view('home', compact('userType', 'userName', 'books'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function home(){
        //dd(Auth::user());
        $books = Book::all();
        return view('home',['books'=>$books])-> layout('layouts.app');
    }

    public function editProfile(){
        
    }
}
