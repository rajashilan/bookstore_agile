<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;
use App\Models\Book;

class AdminListBookComponent extends Component
{
    public function render()
    {
        if (!(Auth::user())) 
        {
            return view('auth.login')->layout('layouts.app');
            
        }
        else{
            if ((Auth::user()->userType) == "user"){
                $books = Book::all();
                return view('home',['books'=>$books])-> layout('layouts.app');
            }
            else{
                return view('livewire.admin-list-book-component',['books' => Book::all()])->layout('layouts.base');
            }
        }
    }
}
