<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdventureComponent extends Component
{
    public function render()
    {
        $books = DB::select('select * from books where category = "Adventure"');
        return view('livewire.adventure-component',['books'=>$books])-> layout('pages.base');
    }
}
