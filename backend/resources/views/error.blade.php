@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('cancel_message'))
    <div class="card" style='text-align:center;padding: 5% 3%; margin:20% auto'>
        <h3>{{Session::get('cancel_message')}}</h3>
    </div>
    @endif
</div>
@endsection