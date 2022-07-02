<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\recently_viewed;
use Carbon\Carbon;

class SciFiComponent extends Component
{
    public function render()
    {
        $books = DB::select('select * from books where category = "Sci-Fi"');

        if(count($books) > 1){
        recently_viewed::Insert([
            'book_cat' => "Sci-Fi",
            'viewed_by' => auth()->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
         }

        return view('livewire.sci-fi-component',['books'=>$books])->layout('layouts.base');
    }
}
