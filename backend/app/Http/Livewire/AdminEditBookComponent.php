<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;


use App\Models\Book;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;

class AdminEditBookComponent extends Component
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

    public $post;
 
    public function mount($id)
    {
        
        $this->post = $id; 
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

                $book = DB::table('books')->where('isbn',$this->post)->first();

                if($this->title == ''){
                $this->title = $book->title;
                }

                if($this->author == ''){
                $this->author = $book->author;
                }
                
                if($this->isbn == ''){
                $this->isbn = $book->isbn;
                }


          if($this->description == ''){
                $this->description = $book->description;
          }

          if($this->category == ''){
                $this->category = $book->category;
          }
               
          if($this->publication_date == ''){
                $this->publication_date = $book->publication_date;
          }

         

          if($this->trade_price == 1){
               $this->trade_price  = $book->trade_price;
          }

      
          if($this->retail_price == 100){
               $this->retail_price = $book->retail_price;
          }
          if($this->quantity == 1){
               $this->quantity = $book->quantity;
          }
               
                return view('livewire.admin-edit-book-component',[
                    'book' => $book,
                ])->layout('layouts.base');
            }
        }
    }

   


    public function editBook(){

        $book = Book::where('isbn',$this->post)->first();

        if ($this->isbn != $this->post && $book->where('isbn', '=', $this->isbn)->count() > 0) {
            session()->flash('err_message','ISBN Existed !!!');
            
        }
        else if( $this->trade_price >  $this->retail_price){
           
            session()->flash('err_message','Trade price cannot be more than Retail Price !!!');
        }else{
            $book->title = $this->title;
            $book->author = $this->author;
            $book->isbn = $this->isbn;
            $book->description = $this->description;
            $book->category = $this->category;
            $book->publication_date = $this->publication_date;
            
            if($this->image){
                $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
                $this->image->storeAs('books',$imageName);
                $book->image = $imageName;
            }

            $book->trade_price = $this->trade_price;
            $book->retail_price = $this->retail_price;
            $book->quantity = $this->quantity;
            $book->save();
            session()->flash('message',"Book $this->title Updated Successfully");
            redirect('admin-listbook');
        }

    }

  


  


}
