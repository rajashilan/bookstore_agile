@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <label>
                            Hello World
                        </label>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <button class="btn btn-primary" id="btn1">Click Me!</button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <button class="btn btn-primary" id="btn2">Click Me!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="padding: 20px">
                <input type="date" class="form-control">
            </div>
        </div>
    </div>
</div>
@endsection
