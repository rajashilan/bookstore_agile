<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function login(){
        $users = DB::select('select * from users where id = ?', [1]);
        $userType = '';
        $userName = '';
        foreach($users as $user){
            $userType = $user->user_type;
            $userName = $user->name;
        };
        
        return view('home', compact('userType', 'userName'));
    }
}
