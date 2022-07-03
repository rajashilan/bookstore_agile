<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UpdateProfileController extends Controller
{
    //
    public function updateProfile(){
        return view('updateProfile');
    }

    public function updateDetails(Request $request){

        if(Auth::user()) {
            $request->validate([
                'name' =>'required|min:4|string|max:255',
                'email'=>'required|email|string|max:255'
            ]);
            $user =Auth::user();
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->save();
            return back()->with('message','Profile Updated');
        }
        else{
            return redirect()->back()->with('login_message','Please login to proceed!');
        }
    }
}
