<?php

namespace Tests\Unit;

use Tests\TestCase;
use Auth;

class ViewPageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function test_view_adventure_category()
    // {
    //     $response = $this->withoutExceptionHandling();
    //     $response = $this->get('adventure');
    //     $response->assertOk();
    // }

    public function test_view_children_category()
    {
        $response = $this->get('children');
        $response->assertOk();
    }

    public function test_view_romance_category()
    {
        $response = $this->get('romance');
        $response->assertOk();
    }

    public function test_view_scifi_category()
    {
        $response = $this->get('sci-fi');
        $response->assertOk();
    }

    public function test_view_admin_add_book_page()
    {
        $response = $this->get('admin-addbook');
        $response->assertOk();
    }

    public function test_view_checkout_page()
    {
        if(Auth::user()) {
            $response = $this->get('checkout');
        }
        else{
            $response = $this->get('login');
        }
        $response->assertOk();
    }
}
