<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MysteryComponent extends Component
{
    public function render()
    {
        $books = DB::select('select * from books where category = "Mystery"');
        return view('livewire.mystery-component',['books'=>$books])-> layout('layouts.base');
    }
}
