<?php

namespace Tests\Unit;

use App\Models\Book;
use Tests\TestCase;

class AddBookTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add_book()
    {
        $book = Book::factory()->create([
            'title' =>"Harry Potter and the Philosopher's Stone",
            'author'=>"J.K. Rowling",
            'isbn'=>'9780590353403',
            'description'=>"Rescued from the outrageous neglect of his aunt and uncle, a young boy with a great destiny proves his worth while attending Hogwarts School of Witchcraft and Wizardry.",
            'category'=>"Adventure",
            'publication_date'=>"2014-01-09",
            'image'=>'1653039398.jpg',
            'trade_price'=>'20',
            'retail_price'=>'25',
            'quantity'=>'10',
            'created_at'=>'2022-06-06 07:53:11',
            'updated_at'=>'2022-06-04 07:53:11'
        ]);

        $response = $this->followingRedirects()->get('admin-addbook');
        $response->assertOk();
    }
}