<?php

namespace Tests\Unit;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use Tests\TestCase;

class MakeOrderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_placeorder_with_cod()
    {
        $order = Order::factory()->create([
            'user_id'=>'3',
            'fullname'=>'John Doe',
            'phone'=>'01123456789',
            'email'=>'sb-bii3817792317@personal.example.com',
            'address'=>'Inti International College Penang',
            'payment_id'=>null,
            'country' => '+6',
            'deliverycharges' => '2.50',
            'grandtotal' => '25',
            'payment_mode'=>'cod',
            'tracking_num'=>'bookshop86700',
            'status'=>'0',
            'remark'=>null,
            'created_at'=>'2022-06-29 07:53:11',
            'updated_at'=>'2022-06-29 07:53:11'
        ]);

        $cart = Cart::where('user_id', '3')->get();
        $order_items = [];
        foreach($cart as $item){
            $order_items[] = [
                'isbn'=>$item->isbn,
                'qty'=>$item->quantity,
                'price'=>$item->book->retail_price
            ];

            $item->book->update([
                'qty' => $item->book->quantity - $item->quantity
            ]);
        }

        $order->orderitems()->createMany($order_items);
        Cart::destroy($cart);


        $response = $this->followingRedirects()->get('checkout');
        $response->assertOk();
    }

    public function test_placeorder_with_paypal()
    {
        $order = Order::factory()->create([
            'user_id'=>'2',
            'fullname'=>'John Doe',
            'phone'=>'01123456789',
            'email'=>'sb-bii3817792317@personal.example.com',
            'address'=>'Inti International College Penang',
            'payment_id'=>'PAYID-MK52S5Q48W37886ME151392G',
            'country' => '+6',
            'deliverycharges' => '2.50',
            'grandtotal' => '25',
            'payment_mode'=>'paypal',
            'tracking_num'=>'bookshop86730',
            'status'=>'0',
            'remark'=>null,
            'created_at'=>'2022-06-29 07:53:11',
            'updated_at'=>'2022-06-29 07:53:11'
        ]);

        $cart = Cart::where('user_id', '2')->get();
        $order_items = [];
        foreach($cart as $item){
            $order_items[] = [
                'isbn'=>$item->isbn,
                'qty'=>$item->quantity,
                'price'=>$item->book->retail_price
            ];

            $item->book->update([
                'qty' => $item->book->quantity - $item->quantity
            ]);
        }

        $order->orderitems()->createMany($order_items);
        Cart::destroy($cart);


        $response = $this->followingRedirects()->get('checkout');
        $response->assertOk();
    }
}
