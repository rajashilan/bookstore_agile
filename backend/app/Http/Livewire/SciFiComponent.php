<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SciFiComponent extends Component
{
    public function render()
    {
        $books = DB::select('select * from books where category = "Sci-Fi"');
        return view('livewire.sci-fi-component',['books'=>$books])->layout('layouts.base');
    }
}
