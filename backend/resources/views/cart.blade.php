@extends('layouts.app')
<style>
    .card-body {
        flex: 1 1 auto !important;
        padding: 1.85rem 1.8rem !important;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@section('content')
<div class="container">
<div class="row" style="margin-bottom: 2rem;">
    <div class="col btn btn-outline-secondary" style="display: flex; justify-content: center; border-radius: 0;" id="showCart">Cart</div>
    <!-- <div class="col btn btn-outline-secondary" style="display: flex; justify-content: center; border-radius: 0;" id="showOrder">Ongoing Order</div> -->
    <div class="col btn btn-outline-secondary" style="display: flex; justify-content: center; border-radius: 0;" id="showHistory">History</div>
</div>
@if ($cartarray)
    @php
        $total = 0;
    @endphp
    @foreach ($cartarray as $row)
    @php
        $total = $total + $row['record'] -> quantity * $row["book"][0] -> retail_price;
    @endphp
    <div class="card mb-3" style="max-width: 1000px; margin: auto;" name="cart">
        <div class="row g-0">
            <div class="col-md-2">
                <img src="{{asset('assets/uploaded_images/books')}}/{{$row['book'][0] -> image}}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">{{$row["book"][0] -> title}}</h3>
                    <div class="row mb-2">
                        <div class="col-md-2">Unit Price</div>
                        <div class="col">{{$row["book"][0] -> retail_price}}</div>
                    </div>
                    <div class="row mb-2" style="display: flex; align-items: center;">
                        <div class="col-md-2">
                            <label for="">Quantity</label>
                        </div>
                        <div class="col">
                            <div class="btn-group me-2" role="group" aria-label="First group">
                                <button type="button" onclick="decrement(this.id)" class="btn btn-outline-primary" id="btnDecrease{{$row['record'] -> id}}">-</button>
                                <input id="{{$row['record'] -> id}}" type=number min=1 max=100 class="form-control" value="{{$row['record'] -> quantity}}" style="text-align: center; border-radius: 0px !important;" readonly>
                                <input id="{{$row['book'][0] -> isbn}}" type="text" value="{{$row['book'][0] -> isbn}}" style="display: none;">
                                <button id="btnIncrease{{$row['record'] -> id}}" type=button onclick="increment(this.id)" class="btn btn-outline-primary">+</button>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url('deletefromcart', $row['book'][0] -> isbn) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger mb-2">Delete From Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="container" name="cart">
    <div class="row" style="width: 1000px; margin:auto">
        <div class="col-md-8"></div>
        <div class="col-md-4" style="padding: 0">
            <div class="card card-body mt-3">
                <h5>Grand Total:
                    <span class="float-end"> RM {{$total}}</span>
                </h5>
                <a href="/checkout" class="btn btn-primary">Checkout</a>
            </div>
        </div>
    </div>
    </div>
</div>
@else
<div class="card" style='text-align:center;padding: 5% 3%; margin:20% auto' name="cart">
    <h3>No item found in cart! </h3>
</div>
@endif

<h1 class="homepage-title-text">You might also like</h1>
        @if (Session::has('message'))
          <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
        @elseif (Session::has('login_message'))
          <div class="alert alert-danger" role="alert">{{Session::get('login_message')}}</div>
        @elseif (Session::has('cart_exist_msg'))
          <div class="alert alert-warning" role="alert">{{Session::get('cart_exist_msg')}}</div>  
        @endif
        <div class="homepage-cards-main-container">
          @if ($basedonrecentlyviewed)
              @foreach ($basedonrecentlyviewed as $row)
                <div class="homepage-cards-container">
                <img src="{{asset('assets/uploaded_images/books')}}/{{$row->image}}" alt="" class="homepage-cards-img">
                  <p class="homepage-cards-text">{{$row->title}}</p>
                  <p class="homepage-cards-text">{{$row->author}}</p>
                  <p class="homepage-cards-text">RM {{$row->retail_price}}</p>
                  @if ($row -> quantity == 0)
                          <button type="button" class="btn btn-secondary btn-sm" disabled>Out of Stock</button>
                  @else
                  <form action="{{ url('addtocart',$row->isbn) }}" method="POST">
                    @csrf
                    <button type='submit' class='btn btn-sm' style='background-color: #FD833B; color:#fff; border-color:transparent'><span style='margin-right:8px'><i class="fa-solid fa-cart-shopping"></i></span>Add to Cart</button>
                  </form>
                  @endif
                </div>
              @endforeach 
          @else
            <div class="card" style='text-align:center;padding: 5% 3%; margin:20% auto'>
              <h3>No Suggestion available</h3>
            </div>
          @endif
        </div>

{{-- <!-- @if ($orderarray)
    @php
        $total = 0;
    @endphp
    @foreach ($orderarray as $row)
    @php
        $total = $total + $row['record'] -> quantity * $row["book"][0] -> retail_price;
    @endphp
    <div class="card mb-3" style="max-width: 1000px; margin: auto;" name="order">
        <div class="row g-0">
            <div class="col-md-2">
                <img src="{{asset('assets/uploaded_images/books')}}/{{$row['book'][0] -> image}}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">{{$row["book"][0] -> title}}</h3>
                    <div class="row mb-2">
                        <div class="col-md-2">Unit Price</div>
                        <div class="col">{{$row["book"][0] -> retail_price}}</div>
                    </div>
                    <div class="row mb-2" style="display: flex; align-items: center;">
                        <div class="col-md-2">
                            <label for="">Quantity</label>
                        </div>
                        <div class="col">
                            <label for="">{{$row['record'] -> qty}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
<div class="card" style='text-align:center;padding: 5% 3%; margin:20% auto' name="order">
    <h3>No ongoing orders! </h3>
</div>
@endif --> --}}

@if ($orderarray)
    @php
        $total = 0;
    @endphp
    @foreach ($orderarray as $row)
    @php
        $total = $total + $row['record'] -> quantity * $row["book"][0] -> retail_price;
    @endphp
    <div class="card mb-3" style="max-width: 1000px; margin: auto;" name="history">
        <div class="row g-0">
            <div class="col-md-2">
                <img src="{{asset('assets/uploaded_images/books')}}/{{$row['book'][0] -> image}}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">{{$row["book"][0] -> title}}</h3>
                    <div class="row mb-2">
                        <div class="col-md-2">Unit Price</div>
                        <div class="col">{{$row["book"][0] -> retail_price}}</div>
                    </div>
                    <div class="row mb-2" style="display: flex; align-items: center;">
                        <div class="col-md-2">
                            <label for="">Quantity</label>
                        </div>
                        <div class="col">
                            <label for="">{{$row['record'] -> qty}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
<div class="card" style='text-align:center;padding: 5% 3%; margin:20% auto' name="history">
    <h3>No order history found! </h3>
</div>
@endif

    


<script>
    $(document).ready((e) => {
        $("#showCart").click()
    })

    $("#showCart").on('click', (e) => {
        $("[name='cart']").css("display", "block")
        $("[name='order']").css("display", "none")
        $("[name='history']").css("display", "none")
    })

    $("#showOrder").on('click', (e) => {
        $("[name='cart']").css("display", "none")
        $("[name='order']").css("display", "block")
        $("[name='history']").css("display", "none")
    })

    $("#showHistory").on('click', (e) => {
        $("[name='cart']").css("display", "none")
        $("[name='order']").css("display", "none")
        $("[name='history']").css("display", "block")
    })

    $("#demoInput").on('keydown keyup change', function (e){
        if (e.shiftKey || e.ctrlKey || e.altKey) {
		e.preventDefault();
        } else {
        var key = e.keyCode;
            if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                e.preventDefault();
            }
        }
        var val = parseInt(this.value);
        if(val > 100 || val < 1)
        {
            //alert('Wrong range');
            this.value = Number(val.toString().slice(0, -1));
        }
    })

    function increment(id) {
        var inputid = id.replace("btnIncrease", "")
        document.getElementById(inputid).stepUp();
        var quantity = $("#" + inputid).val()
        var isbn = $("#" + id).prev().val()
        editQty(isbn, inputid, quantity, id)
    }
    function decrement(id) {
        var inputid = id.replace("btnDecrease", "")
        var currentqty = $("#" + inputid).val()
        if (currentqty > 1){
            document.getElementById(inputid).stepDown();
            var quantity = -Math.abs($("#" + inputid).val())
            var isbn = $("#" + id).next().next().val()
            editQty(isbn, inputid, quantity, id)
        }
    }

    function editQty(isbn, id, quantity, btnid){
        let _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/editQty",
            type: "POST",
            data: {
                isbn: isbn,
                id: id,
                quantity: quantity,
                _token: _token
            },
            success: function(data){
                console.log(data)
                console.log(data.qtynew)
                console.log(data.cartbookqty)
                if (data.qtynew == 0){
                    $("#"+btnid).prop("disabled", true);
                    $("#btnDecrease"+id).prop("disabled", false);
                }
                else if(data.cartbookqty == 1){
                    $("#"+btnid).prop("disabled", true);
                    $("#btnIncrease"+id).prop("disabled", false);
                    
                }
                else{
                    $("#btnIncrease"+id).prop("disabled", false);
                    $("#btnDecrease"+id).prop("disabled", false);
                }
            }
        })
    }
</script>
@endsection