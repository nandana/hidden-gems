@extends('layouts.landing')

@section('title')
    Hidden Gems
@stop

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
    @endif

    <div class="content">
        <img class="logo" src="{{asset('logo.svg')}}">
        <div class="title m-b-md">
            Hidden Gems
        </div>
    </div>
</div>
@stop
    
