<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;

use App\Models\Book;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddBookComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $author;
    public $isbn;
    public $description;
    public $category;
    public $publication_date;
    public $image;
    public $trade_price;
    public $retail_price;
    public $quantity;

    public function addBook(){
        $book = new Book();
        $book->title = $this->title;
        $book->author = $this->author;
        $book->isbn = $this->isbn;
        $book->description = $this->description;
        $book->category = $this->category;
        $book->publication_date = $this->publication_date;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('books',$imageName);
        $book->image = $imageName;
        $book->trade_price = $this->trade_price;
        $book->retail_price = $this->retail_price;
        $book->quantity = $this->quantity;
        $book->save();

        session()->flash('message','Book Added Successfully');
    }

    public function render()
    {
        return view('livewire.admin-add-book-component')->layout('pages.base');
    }
}
