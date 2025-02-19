@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-5">Welcome to Your Dashboard, {{ auth()->user()->name }}!</h1>

    <p class="mt-3">You are successfully logged in.</p>

    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Go to Home</a>
</div>
@endsection
