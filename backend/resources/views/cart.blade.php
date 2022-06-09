@extends('layouts.app')
<style>
    .card-body {
        flex: 1 1 auto !important;
        padding: 1.85rem 1.8rem !important;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@section('content')
<div class="card mb-3" style="max-width: 1000px; margin: auto;">
    <div class="row g-0">
        <div class="col-md-2">
        <img src="https://s2982.pcdn.co/wp-content/uploads/2014/08/HP_hc_new_1.jpeg.webp" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h3 class="card-title">Harry Potter and the Philoshoper's Stone</h3>
            <div class="row mb-2">
                <div class="col">Unit Price</div>
                <div class="col">RM100</div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="" style="vertical-align: -webkit-baseline-middle;">Quantity</label>
                </div>
                <div class="col">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <button type="button" onclick="decrement()" class="btn btn-outline-primary">-</button>
                        <input id=demoInput type=number min=1 max=100 class="form-control" value="1" style="text-align: center; border-radius: 0px !important;">
                        <button type=button onclick="increment()" class="btn btn-outline-primary">+</button>
                    </div>
                </div>
            </div>
            <button class="btn btn-danger mb-2">Delete From Cart</button>
            
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
        </div>
    </div>
</div>


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

    function increment() {
        document.getElementById('demoInput').stepUp();
        var quantity = $("#demoInput").val()

        $.ajax({
            type: 'POST',
            url: '',
            data: {'Quantity': quantity},
            success: function(){
                console.log(quantity)
            }
        })

        console.log($("#demoInput").val())
    }
    function decrement() {
        document.getElementById('demoInput').stepDown();
        console.log($("#demoInput").val())
    }
</script>
@endsection