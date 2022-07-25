<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\recently_viewed;
use Carbon\Carbon;

class AdventureComponent extends Component
{
    public function render()
    {
        $books = DB::select('select * from books where category = "Adventure"');

        if(count($books) > 1){
        recently_viewed::Insert([
            'book_cat' => "Adventure",
            // 'viewed_by' => auth()->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
        
        return view('livewire.adventure-component',['books'=>$books])-> layout('layouts.base');
    }
}
