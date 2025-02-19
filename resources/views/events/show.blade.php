@extends('layouts.app')

@section('content')
<h2>{{ $event->title }}</h2>
<p>Date: {{ $event->event_date }}</p>
<p>Location: {{ $event->location }}</p>

<h3>Register for this event</h3>

@if(session('success'))
    <p class="text-success">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p class="text-danger">{{ session('error') }}</p>
@endif

@auth
    <form method="POST" action="{{ route('events.register', $event->id) }}">
        @csrf
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <button type="submit">Register</button>
    </form>
@else
    <p class="text-danger">You must <a href="{{ route('login') }}">log in</a> to register for this event.</p>
@endif
@endsection
