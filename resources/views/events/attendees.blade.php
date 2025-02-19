@extends('layouts.app')

@section('content')
<h2>Attendees for {{ $event->title }}</h2>
<ul>
    @foreach($event->registrations as $registration)
        <li>{{ $registration->name }} - {{ $registration->email }}</li>
    @endforeach
</ul>
@endsection
