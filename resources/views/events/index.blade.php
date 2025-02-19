@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold">Upcoming Events</h2>

@if(session('success'))
    <p class="text-green-600 mb-4">{{ session('success') }}</p>
@endif

<!-- Search & Filter Form -->
<form method="GET" class="mb-4 flex gap-2">
    <input type="text" name="search" placeholder="Search events..." value="{{ request('search') }}" 
           class="p-2 border rounded w-1/3">
    <input type="date" name="date" value="{{ request('date') }}" 
           class="p-2 border rounded w-1/4">
           <button type="submit" class="btn btn-primary custom-btn">Filter</button>

<style>
    .custom-btn {
        background-color: #0056b3 !important; /* Darker Blue */
        border-color: #004494 !important;
    }
    .custom-btn:hover {
        background-color: #004494 !important; /* Even Darker Blue on Hover */
    }
</style>


</form>

<!-- Display Events -->
@if($events->isEmpty())
    <p>No events available.</p>
@else
    <ul class="space-y-2">
        @foreach($events as $event)
            <li class="mb-2 p-4 bg-gray-200 rounded">
                <a href="{{ route('events.show', $event->id) }}" class="text-blue-600 font-semibold">
                    {{ $event->title }}
                </a>
                - {{ $event->event_date }} at {{ $event->location }}
            </li>
        @endforeach
    </ul>
@endif
@endsection
