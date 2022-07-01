<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;

use Auth;
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
    public $trade_price = 1;
    public $retail_price = 100;
    public $quantity = 1;

    public function addBook(){

        $book = new Book();

       

        if ($book->where('isbn', '=', $this->isbn)->count() > 0) {
            session()->flash('err_message','ISBN Existed !!!');
        }
        else if( $this->trade_price >  $this->retail_price){
        
            session()->flash('err_message','Trade price cannot be more than Retail Price !!!');
           

        }
        else{
            $book->title = $this->title;
            $book->author = $this->author;
            $book->isbn = $this->isbn;
            $book->description = $this->description;
            $book->category = $this->category;
            $book->publication_date = $this->publication_date;

            if($this->image != ''){
            $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
            $this->image->storeAs('books',$imageName);
            $book->image = $imageName;
            }
            $book->trade_price = $this->trade_price;
            $book->retail_price = $this->retail_price;
            $book->quantity = $this->quantity;
            $book->save();
            session()->flash('message','Book Added Successfully');
            redirect('admin-addbook',422);
        }

    }

    public function render()
    {
        if (!(Auth::user())) 
        {
            return view('auth.login')->layout('layouts.app');
            
        }
        else{
            if ((Auth::user()->userType) == "user"){
                $books = Book::all();
                return view('home',['books'=>$books])-> layout('layouts.app');
            }
            else{
                return view('livewire.admin-add-book-component')->layout('layouts.base');
            }
        }
    }
}
