<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChildrenComponent extends Component
{
    public function render()
    {
        $books = DB::select('select * from books where category = "Children"');
        return view('livewire.children-component',['books'=>$books])->layout('layouts.base');
    }
}