<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RomanceComponent extends Component
{
    public function render()
    {
        $books = DB::select('select * from books where category = "Romance"');
        return view('livewire.romance-component',['books'=>$books])-> layout('layouts.base');
    }
}
