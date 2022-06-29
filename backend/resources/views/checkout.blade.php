@extends('layouts.app')

@section('content')

<div class="container">
    @if (Session::has('placed_order_message'))
        <div class="alert alert-success" role="alert">{{Session::get('placed_order_message')}}</div>
    @endif
    @if (Session::has('error_message'))
        <div class="alert alert-danger" role="alert">{{Session::get('error_message')}}</div>
    @endif
    @if (Session::has('transaction_message'))
        <div class="alert alert-success" role="alert">{{Session::get('transaction_message')}}</div>
    @endif
    @if ($cartarray)
    @php
        $total = 0;
    @endphp
    <div>
        <div class='row'>
            <div class='col-md-7'>
                <div class='card'>
                    <div class='card-header'>
                        <h5>Basic Information</h5>
                    </div>
                    <div class='card-body'>
                        <form method="post" action="{{url('placeOrder')}}">
                            <div class='row'>
                            
                                @csrf
                                <div class='col-md-6'>
                                    <div class='form-group mb-3'>
                                        <label>Full Name</label>
                                        <input type='text' name="fullname" class='form-control' />
                                        <small class='text-danger'><?php echo $errors->first('fullname'); ?></small>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group mb-3'>
                                        <label>Phone Number</label>
                                        <input type='text' name="phone" class='form-control' />
                                        <small class='text-danger'><?php echo $errors->first('phone'); ?></small>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group mb-3'>
                                        <label>Email Address</label>
                                        <input type='email' name="email" class='form-control' />
                                        <small class='text-danger'><?php echo $errors->first('email'); ?></small>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group mb-3'>
                                        <label>Full Address</label>
                                        <textarea rows="2" name="address" class='form-control' ></textarea>
                                        <small class='text-danger'><?php echo $errors->first('address'); ?></small>
                                    </div>
                                </div>
                            
                                <div class='col-md-12'>
                                    <div class='form-group text-end'>
                                        <button type='submit' class='btn btn-primary mx-1' name="payment_mode" value="cod">Cash On Delivery</button>
                                        <button type='submit' class='btn btn-primary mx-1' name="payment_mode" value="paypal">Pay Online</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class='col-md-5'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th width="50%">Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartarray as $row)
                        @php
                            $total = $total + $row['record'] -> quantity * $row["book"][0] -> retail_price;
                        @endphp

                        <tr>
                            <td>{{$row["book"][0] -> title}}</td>
                            <td>{{$row["book"][0] -> retail_price}}</td>
                            <td>{{$row['record'] -> quantity}}</td>
                            <td>{{$row["book"][0] -> retail_price * $row['record'] -> quantity}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colSpan="2" class="text-end fw-bold">Grand Total</td>
                            <td colSpan="2" class="text-end fw-bold">RM {{$total}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="card" style='text-align:center;padding: 5% 3%; margin:20% auto'>
        <h3>No item found in checkout list! </h3>
    </div>
    @endif
</div>

@endsection