@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('paypal_message'))
    <div class="card" style='text-align:center;padding: 5% 3%; margin:20% auto'>
        <h3>{{Session::get('paypal_message')}}</h3>
        <hr />
        <a href="/home" class="btn btn-primary">Return to Home</a> 
    </div>
    @endif
</div>
@endsection