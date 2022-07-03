<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\recently_viewed;
use Carbon\Carbon;

class MysteryComponent extends Component
{
    public function render()
    {
        $books = DB::select('select * from books where category = "Mystery"');

        if(count($books) > 1){
        recently_viewed::Insert([
            'book_cat' => "Mystery",
            'viewed_by' => auth()->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }

        return view('livewire.mystery-component',['books'=>$books])-> layout('layouts.base');
    }
}
