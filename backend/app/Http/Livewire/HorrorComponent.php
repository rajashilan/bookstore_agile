<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class HorrorComponent extends Component
{
    public function render()
    {
        $books = DB::select('select * from books where category = "Horror"');
        return view('livewire.horror-component',['books'=>$books])-> layout('pages.base');
    }
}
