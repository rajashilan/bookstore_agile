<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Auth;

class ReviewController extends Controller
{
    public function newReview(Request $request, $isbn){
        if(Auth::user()){
            $userReview = $request->review;
            $name = Auth::user()->name;

            $review = new Review;
            $review->isbn = $isbn;
            $review->name = $name;
            $review->review = $userReview;
            $review->save();

            return redirect()->back()->with('message','Review submitted successfully!');
        }
    }
}
