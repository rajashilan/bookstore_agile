<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;

class AdminListBookComponent extends Component
{
    public function render()
    {
        return view('livewire.admin-list-book-component',['books' => Book::all()])->layout('pages.base');
    }
}
