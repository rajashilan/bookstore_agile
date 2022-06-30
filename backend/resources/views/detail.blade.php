@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<div class='container'>
    <div class="row">
        <div class="col-5">
            <!-- Book -->
            <img class="img-thumbnail" style="width: 30rem;" src="{{asset('assets/uploaded_images/books')}}/{{$book->image}}">
        </div>

        <div class="col-7">
            <p class="text-md-start;" style= "font-size:40px; text-align: center;">
            {{$book->title}} </p> 
            <p class="text-md-start;" style= "font-size:20px; text-align: center; margin-top: -20px">
            {{$book->author}} </p> 
            <p class="text-md-start;" style= "font-size:20px; text-align: center; margin-top: 20px">
            {{$book->description}} </p>
            
            <div class="d-flex flex-row-reverse bd-highlight">
                <div class="p-2 bd-highlight">
                    @if ($book -> quantity == 0)
                    <button type="submit" class="btn btn-secondary btn-lg" disabled>Out of Stock</button>
                    @else
                    <form action="{{ url('addtocart',$book->isbn) }}" method="POST">
                    @csrf
                    <button type='submit' class='btn btn-lg' style='background-color: #3B89FD; color:#fff; border-color:transparent; 
                    margin:center; width: 200px; height: 60px; border-align: center'>
                    <span class='bi bi-cart' style='margin-right:8px'></span>
                    Add to Cart</button>
                    </form>
                    @endif
                </div>
                    
                <div class="p-2 bd-highlight">
                    <p class="text-md-start;" style= "font-size:20px; text-align: center; margin-top: 20px; font-family: Nerko One">
                    RM {{$book->retail_price}} </p>
                </div>
            </div>
        </div>
    </div>
@endsection
</div>