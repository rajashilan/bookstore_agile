<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Book;
use App\Models\Order;
use App\Models\Country;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Omnipay\Omnipay;

class CheckoutController extends Controller
{
    private $gateway;
   
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }

    public function checkout(){
        if(Auth::user()) {
            $cartarray = array();
            $id = Auth::user()->id;

            $cart = Cart::where('user_id', $id)->get();

            if ($cart == null || $cart == ""){
                return redirect()->back();
            }

            foreach($cart as $record){
                $isbn = $record->isbn;
                $book = Book::where('isbn', $isbn)->get();
                $cartdetails = compact("record", "book");
                array_push($cartarray, $cartdetails);
            }

            $countries = Country::all();

            return view('checkout',['cartarray'=>$cartarray,'countries' => $countries])-> layout('layouts.app');
        }
        else{
            return redirect('login');
        }
    }

    public function placeorder(Request $request){
        switch($request->input('payment_mode')){
            case 'cod':
                if (Auth::user()){
                    $validator = Validator::make($request->all(), [
                        'fullname' => 'required|max:191',
                        'phone' => 'required|max:191',
                        'country' => 'required',
                        'email' => 'required|email|max:191',
                        'address' => 'required|max:191'
                    ]);

                    if ($validator -> fails()){
                        return redirect('checkout')->withErrors($validator);
                    }
                    else{
                        $user_id = Auth::user()->id;
                        $getcountry = Country::where('country_code',$request->country)->first();
                        $getisbns = Cart::where('user_id', $user_id)->get();

                        
                        $gettotalamount = 0;

                        foreach($getisbns as $getisbn){

                        $getprice =  Book::where('isbn', $getisbn->isbn)->first();
                       
                        $gettotalamount+= $getprice->retail_price * $getisbn->quantity;
                        }

                        

                        $grandtotal = $getcountry->delivery_charges + $gettotalamount;
                        
                   
                        
                        $order = new Order();
                        $order->user_id = $user_id;
                        $order->fullname = $request->fullname;
                        $order->phone = $request->phone;
                        $order->email = $request->email;
                        $order->address = $request->address;
                        $order->country = $request->country;
                        $order->deliverycharges = $getcountry->delivery_charges;
                        $order->grandtotal = $grandtotal;
                        $order->payment_mode = $request->payment_mode;
                        $order->payment_id = $request->payment_id;
                        $order->tracking_num = 'bookshop'.rand(10000,99999);
                        $order->save();

                        $cart = Cart::where('user_id', $user_id)->get();
                        
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
                        
                        
                        return redirect()->back()->with('placed_order_message','Order Placed Successfully');
                    }
                }
                else{
                    return redirect('login');
                }
            break;

            case 'paypal':
                if (Auth::user()){
                    $validator = Validator::make($request->all(), [
                        'fullname' => 'required|max:191',
                        'phone' => 'required|max:191',
                        'email' => 'required|email|max:191',
                        'address' => 'required|max:191'
                    ]);

                    if ($validator -> fails()){
                        return redirect('checkout')->withErrors($validator);
                    }
                    else{
                        $user_id = Auth::user()->id;
                        $getcountry = Country::where('country_code',$request->country)->first();
                        $getisbns = Cart::where('user_id', $user_id)->get();

                        
                        $gettotalamount = 0;

                        foreach($getisbns as $getisbn){

                        $getprice =  Book::where('isbn', $getisbn->isbn)->first();
                       
                        $gettotalamount+= $getprice->retail_price * $getisbn->quantity;
                        }

                        $grandtotal = $getcountry->delivery_charges + $gettotalamount;


                        $cart = Cart::where('user_id', $user_id)->get();
                        $amount = $grandtotal ;
                        Session::put('fullname', $request->fullname);
                        Session::put('phone', $request->phone);
                        Session::put('email', $request->email);
                        Session::put('address', $request->address);
                        Session::put('payment_mode', $request->payment_mode);

                        Session::put('country', $request->country);
                        Session::put('deliverycharges', $getcountry->delivery_charges);
                        Session::put('grandtotal', $grandtotal);


                        $order_items = [];

                        /*
                        foreach($cart as $item){
                            //$order_items[] = [
                              //  'isbn'=>$item->isbn,
                                //'qty'=>$item->quantity,
                                //'price'=>$item->book->retail_price
                            //];

                            //$item->book->update([
                              //  'qty' => $item->book->quantity - $item->quantity
                            //]);

                            $amount = $item->quantity * $item->book->retail_price;
                        }
                        */

                        $response = $this->gateway->purchase(array(
                            'amount' => $amount, 
                            'currency' => env('PAYPAL_CURRENCY'),
                            'returnUrl' => url('success'),
                            'cancelUrl' => url('error'),
                        ))->send();
                        
                        if ($response->isRedirect()) {
                            $response->redirect(); // this will automatically forward the customer
                        } else {
                            return redirect('checkout')->with('error_message',$response->getMessage());
                        }
                    }
                }
                else{
                    return redirect('login');
                }
            break;
        }
        
    }

    public function success(Request $request){
        if ($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();
           
            if ($response->isSuccessful())
            {
                // The customer has successfully paid.
                $arr_body = $response->getData();
           
                $user_id = Auth::user()->id;
                $cart = Cart::where('user_id', $user_id)->get();
                $order = new Order();
                $order->user_id = $user_id;
                $order->fullname = Session::get('fullname');
                $order->phone = Session::get('phone');
                $order->email = Session::get('email');
                $order->address = Session::get('address');
                $order->payment_mode = Session::get('payment_mode');
                $order->country =Session::get('country');
                $order->deliverycharges = Session::get('deliverycharges');
                $order->grandtotal = Session::get('grandtotal');
                $order->payment_id = $arr_body['id'];
                $order->tracking_num = 'bookshop'.rand(10000,99999);
                $order->save();

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
                
                return redirect('success')->with('paypal_message','Order Placed Successfully.');
           
            } else {
                return redirect('checkout')->with('error_message',$response->getMessage());
            }
        } else {
            return redirect('checkout')->with('transaction_message','Order Placed Successfully');
        }
    }

    public function error(){
        return redirect('error')->with('cancel_message','User cancelled the payment.');
    }
}
