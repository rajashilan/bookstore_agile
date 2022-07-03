@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

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
                                        <label>Country</label>
                                        <select name='country' id="country" class='form-control' required>
                                    <option selected disabled>Select Country</option>
@foreach($countries as $country)
<option value="{{ $country->country_code }}" rate="{{ $country->delivery_charges }}">{{ $country->country_name }}</option>
@endforeach
                                </select>
                                        <small class='text-danger'><?php echo $errors->first('country'); ?></small>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group mb-3'>
                                        <label>Full Address</label><button type='button' id="getcurrentloc" class='btn btn-primary btn-sm' style="float:right;">Current Location <i class="fas fa-map-marker-alt"></i></button>
                                        <textarea rows="4" name="address" id="address" class='form-control' ></textarea>
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
                            <td>{{number_format(floatval($row["book"][0] -> retail_price),(2), '.', ',') ? :null}}</td>
                            <td>{{$row['record'] -> quantity}}</td>
                            <td>{{number_format(floatval($row["book"][0] -> retail_price * $row['record'] -> quantity),(2), '.', ',') ? :null}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colSpan="2" class="text-end fw-bold">Delivery Charges</td>
                            <td colSpan="2" class="text-end fw-bold">RM <a id="deliverycharges" class="fw-bold" style="text-decoration: none;">0.00</a></td>
                        </tr>
                        <tr>
                            <td colSpan="2" class="text-end fw-bold">Grand Total</td>
                            <td colSpan="2" class="text-end fw-bold">RM <a id="grandtotal" class="fw-bold" style="text-decoration: none;">{{number_format(floatval($total),(2), '.', ',') ? :null}}</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
$( document ).ready(function() {

function getLocation() {
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(showPosition, showError);
} else { 

Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Geolocation is not supported by this browser !',
});




}
}


$("#getcurrentloc").click(function(){
getLocation();

let timerInterval
Swal.fire({
  title: 'Please wait !',
  html: 'Getting current location...',

  timerProgressBar: true,
  


});
Swal.showLoading()

});


function showPosition(position) {

var latitude = position.coords.latitude;
var longitude = position.coords.longitude;







$.ajax({
    url: "https://us1.locationiq.com/v1/reverse?key=pk.d3ea325b53abcf602b435031b5239190&lat="+latitude+"&lon="+longitude+"&format=json",
    type: "GET",
    success: function(data){
        Swal.close();
        $('#address').val(data.display_name);

        console.log(data.address.country_code);
        $('#country').val(data.address.country_code).trigger('change');

       $('#grandtotal').text();

       var totalamt = <?php echo $total ?>;
       var deliverycharges = parseFloat(jQuery("#country option:selected").attr("rate"));

        var grandtotal = parseFloat(totalamt) + parseFloat(deliverycharges);

        $('#deliverycharges').text(deliverycharges.toFixed(2));
        $('#grandtotal').text(grandtotal.toFixed(2));
 
        
   
   
    }
})
}

$('#country').on('change', function() {

var totalamt = <?php echo $total ?>;
var deliverycharges = parseFloat(jQuery("#country option:selected").attr("rate"));

 var grandtotal = parseFloat(totalamt) + parseFloat(deliverycharges);

 $('#deliverycharges').text(deliverycharges.toFixed(2));
 $('#grandtotal').text(grandtotal.toFixed(2));


});



function showError(error) {
$body = $("body");
$body.removeClass("loading");
$('#checkinout').attr('disabled', false);

switch(error.code) {
case error.PERMISSION_DENIED:
Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Please Enable permission to access location !',
});

break;
case error.POSITION_UNAVAILABLE:
Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'Location information is unavailable !',
});
break;
case error.TIMEOUT:
Swal.fire({
icon: 'error',
title: 'Oops...',
text: 'The request to get user location timed out !',
});
break;
case error.UNKNOWN_ERROR:
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'An unknown error occurred !',
   
  });
break;
}
}
$('#getcurrentloc').click();
console.log( "ready!" );
});
    </script>
    @else
    <div class="card" style='text-align:center;padding: 5% 3%; margin:20% auto'>
        <h3>No item found in checkout list! </h3>
    </div>
    @endif
</div>



@endsection