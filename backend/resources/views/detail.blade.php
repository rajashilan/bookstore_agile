@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<style>
    body {
        background: url('https://www.wallpaperuse.com/wallp/15-154790_m.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
}
</style>

<div class='container'>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
            @elseif (Session::has('login_message'))
            <div class="alert alert-danger" role="alert">{{Session::get('login_message')}}</div>
            @elseif (Session::has('cart_exist_msg'))
            <div class="alert alert-warning" role="alert">{{Session::get('cart_exist_msg')}}</div>  
        @endif
        
        <!-- Book Image -->
        <div class="col-5">
            <p class="card-header; fw-bold text-decoration-underline" style= "font-size:15px; margin-left: 5px; margin-top: 10px">
                {{$book->category}} </p>
            <img class="img-fluid" style="width: 30rem; margin-top: -10px" alt="Responsive image" src="{{asset('assets/uploaded_images/books')}}/{{$book->image}}">
        </div>
        
        <!-- Book Info -->
        <div class="col-7">
            <div class>
                <p class="card-header; fw-bold" style= "font-size:60px; text-align: center; font-family: Nerko One;">
                {{$book->title}} </p>
                <p class="card-subtitle text-muted border-bottom" style= "font-size:20px; text-align: center; margin-top: -30px">
                by {{$book->author}} </p> 
                <p class="text-md-start; fw-bold" style= "font-size:30px; text-align: center; margin-top: 20px; font-family: Arial">
                RM {{$book->retail_price}} </p>
            </div>  

            <div class>
                <p class="text-secondary font-monospace fw-bold text-decoration-underline" style= "font-size:30px; margin-top: 10px; margin-left: 5px">
                Product Description</p> 
                <p class="card-text; text-start lh-base font-monospace" style= "font-size:18px; text-align: center; margin-top: -10px; margin-left: 5px">
                {{$book->description}} </p>
            </div>

            <!-- Add to Cart --> 
            <div class="d-flex justify-content-evenly">
                <div class="p-2 bd-highlight">
                <p class="fw-bold text-success" style= "font-size:20px; text-align: center; margin-top: 20px; font-family: Arial">
                Only {{$book->quantity}} left in stock </p>
                <p class="text-dark" style= "font-size:15px; text-align: center; margin-top: 20px; font-family: Arial; margin-top: -20px">
                Usually delivered within 3-5 working days. </p>
                </div>

                <div class="p-2 bd-highlight">
                    @if ($book -> quantity == 0)
                    <button type="submit" class="btn btn-secondary btn-lg bg-light text-dark fs-3 fw-bold" style='
                    margin:center; width: 300px; height: 70px; border-align: center' disabled>Out of Stock</button>
                    @else
                    <form action="{{ url('addtocart',$book->isbn) }}" method="POST">
                    @csrf
                    <button type='submit' class='btn btn-lg bg-light text-dark fs-3 fw-bold' style='
                    margin:center; width: 300px; height: 70px; border-align: center'>
                    <span class='bi bi-cart' style='margin-right:18px'></span>
                    Add to Cart</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        <form action="{{ url('leavereview',$book->isbn) }}" method="POST">
            @csrf
                <div class="p-2 bd-highlight" style="width: 50%; margin-top: 2rem;">
                <h5>Leave a review for {{$book->title}}</h5>
                <textarea name="review" id="review" rows="3" class="form-control"></textarea>
                <button type='submit' class='btn btn-lg' style='background-color: #3B89FD; color:#fff; border-color:transparent; 
                margin:center; width: 100%; padding: 10px; border-align: center; margin-top: 1rem;'>
                Submit</button>
        </form>
        <div class="bd-highlight">
            <div style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid grey; margin-top: 2rem;">
            <h4>User Reviews</h4>
            <hr>
            @if (!$reviews->isEmpty())
            @foreach ($reviews as $review)
            <p style="margin-bottom: 0; font-size: 18px;">{{$review->review}}</p>
            <p>-{{$review->name}}</p>
            @endforeach
            @else
            <p style="margin-bottom: 0; font-size: 18px;">No reviews yet. Leave a new review!</p>
            @endif
        </div>
        </div>
        </div>
    </div>
@endsection
</div>