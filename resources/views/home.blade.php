@extends('layouts.app')

@section('content')
    <div class="container text-center">
        @auth
            <h2>Welcome back, {{ auth()->user()->name }}!</h2>
            <p>You are logged in.</p>
            <a href="{{ route('events.index') }}" class="btn btn-primary">Browse Events</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        @else
            <h2>Welcome to Event Registration</h2>
            <p>Explore upcoming events and register easily.</p>
            <a href="{{ route('register') }}" class="btn btn-success">Register</a>
            <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
        @endauth
    </div>
@endsection
