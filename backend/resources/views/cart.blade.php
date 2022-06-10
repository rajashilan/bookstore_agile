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
@if ($cartarray)
    @foreach ($cartarray as $row)
    <div class="card mb-3" style="max-width: 1000px; margin: auto;">
        <div class="row g-0">
            <div class="col-md-2">
                <img src="{{asset('assets/uploaded_images/books')}}/{{$row['book'][0] -> image}}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">{{$row["book"][0] -> title}}</h3>
                    <div class="row mb-2">
                        <div class="col">Unit Price</div>
                        <div class="col">{{$row["book"][0] -> retail_price}}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label for="" style="vertical-align: -webkit-baseline-middle;"></label>
                        </div>
                        <div class="col">
                            <div class="btn-group me-2" role="group" aria-label="First group">
                                <button type="button" onclick="decrement(this.id)" class="btn btn-outline-primary" id="btnDecrease{{$row['record'] -> id}}">-</button>
                                <input id="{{$row['record'] -> id}}" type=number min=1 max=100 class="form-control" value="{{$row['record'] -> quantity}}" style="text-align: center; border-radius: 0px !important;">
                                <button id="btnIncrease{{$row['record'] -> id}}" type=button onclick="increment(this.id)" class="btn btn-outline-primary">+</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-danger mb-2">Delete From Cart</button>

                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>

    @endforeach
@else
<div class="card" style='text-align:center;padding: 5% 3%; margin:20% auto'>
    <h3>No item found in cart! </h3>
</div>
@endif


<script>
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
        editQty(inputid, quantity)
        console.log($("#" + inputid).val())
        console.log(inputid)
    }
    function decrement(id) {
        var inputid = id.replace("btnDecrease", "")
        document.getElementById(inputid).stepDown();
        var quantity = $("#" + inputid).val()
        editQty(inputid, quantity)
        console.log($("#" + inputid).val())
        console.log(inputid)
    }

    function editQty(id, quantity){
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/editQty",
            type: "POST",
            data: {
                id: id,
                quantity: quantity,
                _token: _token
            },
            success: function(data){
                console.log(data)
            }
        })
    }
</script>
@endsection