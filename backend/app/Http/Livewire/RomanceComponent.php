<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RomanceComponent extends Component
{
    public function render()
    {
        //return view('livewire.romance-component');
        $books = DB::select('select * from books where category = "Adventure"');
        return view('livewire.adventure-component',['books'=>$books])-> layout('pages.base');
    }
}
