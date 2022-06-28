@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="row">
        <div class="col-5">
        <!-- Book -->
        <img class="img-thumbnail" style="width: 30rem;" src="{{asset('assets/uploaded_images/books')}}/{{$book->image}}">
        </div>

        <div class="col-7">
        <!-- intro -->
        <p class="text-md-start;" style= "font-size:40px; text-align: center;">
        {{$book->title}} </p> 
        </div>

    </div>
</div>
@endsection
