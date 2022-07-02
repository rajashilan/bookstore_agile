<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\recently_viewed;
use Carbon\Carbon;

class ChildrenComponent extends Component
{
    public function render()
    {
        $books = DB::select('select * from books where category = "Children"');

        if(count($books) > 1){
        recently_viewed::Insert([
            'book_cat' => "Children",
            'viewed_by' => auth()->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }

        return view('livewire.children-component',['books'=>$books])->layout('layouts.base');
    }
}