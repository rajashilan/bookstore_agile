<?php

namespace Tests\Unit;

use App\Models\Cart;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class AddCartTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_add_to_cart_as_logged_in_user()
    {
        $cart = Cart::factory()->create([
            'id' => 100,
            'user_id' => 3,
            'isbn' => "9781665922074",
            'quantity' => 1
        ]);

        $response = $this->followingRedirects()->post('addtocart/9781665922074');
        $response->assertOk();
    }

    public function test_visitor_could_not_add_book_to_cart()
    {
            $response = $this->post('addtocart/9781665922074');
            $response->assertRedirect('/');        
    }
}
