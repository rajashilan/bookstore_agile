<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends Controller
{
    public function login(){
        $userType = '';
        $userName = '';

        if(Auth::user()){
            $userName = Auth::user()->name;
            $userType = Auth::user()->user_type;
        }
        
        return view('home', compact('userType', 'userName'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function home(){
        //dd(Auth::user());
        return view('home');
    }
}
