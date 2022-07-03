<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\recently_viewed;
use Carbon\Carbon;

class HorrorComponent extends Component
{
    public function render()
    {
        $books = DB::select('select * from books where category = "Horror"');

        if(count($books) > 1){
        recently_viewed::Insert([
            'book_cat' => "Horror",
            'viewed_by' => auth()->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }

        return view('livewire.horror-component',['books'=>$books])-> layout('layouts.base');
    }
}
