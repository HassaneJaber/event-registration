@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create a New Event</h2>

        @if(session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form method="POST" action="{{ route('events.store') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Event Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="event_date" class="form-label">Event Date</label>
                <input type="date" class="form-control" id="event_date" name="event_date" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
    </div>
@endsection
