<?php

namespace App\Http\Livewire;

use Livewire\Component;


class AdminAddBookComponent extends Component
{
    public function render()
    {
        return view('livewire.admin-add-book-component')->layout('pages.base');
    }
}
