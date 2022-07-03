<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Http\Request;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Livewire\AdminAddBookComponent;
use Session;
use App\Models\User;
class ValidationTest extends TestCase
{
    //use RefreshDatabase;
  
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function  test_if_trade_price_is_more_than_retail_price_display_error()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(AdminAddBookComponent::class)
        ->set('title', "Harry Potter and the Philosopher's Stone")
        ->set('author', 'J.K. Rowling')
        ->set('isbn', '9780590353300')
        ->set('description', 'Rescued from the outrageous neglect of his aunt and uncle, a young boy with a great destiny proves his worth while attending Hogwarts School of Witchcraft and Wizardry.')
        ->set('category', 'Adventure')
        ->set('publication_date', '2014-01-09')
        //->set('image', '1653039398.jpg')
        ->set('trade_price', '100')
        ->set('retail_price', '25')
        ->set('quantity', '10')
        ->call('addBook')
        ->assertSee('Trade price cannot be more than Retail Price !!!');
    }


    public function test_if_isbn_is_not_unique_display_error()
    {
        $this->actingAs(User::factory()->create());

      
            // First attempt
            Livewire::test(AdminAddBookComponent::class)
            ->set('title', "Harry Potter and the Philosopher's Stone")
            ->set('author', 'J.K. Rowling')
            ->set('isbn', '9780590353300')
            ->set('description', 'Rescued from the outrageous neglect of his aunt and uncle, a young boy with a great destiny proves his worth while attending Hogwarts School of Witchcraft and Wizardry.')
            ->set('category', 'Adventure')
            ->set('publication_date', '2014-01-09')
            //->set('image', '1653039399.jpg')
            ->set('trade_price', '20')
            ->set('retail_price', '50')
            ->set('quantity', '10')
            ->call('addBook');

            // Second attempt with same 
            Livewire::test(AdminAddBookComponent::class)
            ->set('title', "Harry Potter and the Philosopher's Stone")
            ->set('author', 'J.K. Rowling')
            ->set('isbn', '9780590353300')
            ->set('description', 'Rescued from the outrageous neglect of his aunt and uncle, a young boy with a great destiny proves his worth while attending Hogwarts School of Witchcraft and Wizardry.')
            ->set('category', 'Adventure')
            ->set('publication_date', '2014-01-09')
            //->set('image', '1653039399.jpg')
            ->set('trade_price', '20')
            ->set('retail_price', '50')
            ->set('quantity', '10')
            ->call('addBook')
            ->assertSee('ISBN Existed !!!');

        
     
    
    }
}
