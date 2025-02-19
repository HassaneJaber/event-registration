<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of events with search and filtering.
     */
    public function index(Request $request)
    {
        $query = Event::query();

        // Apply search filter if provided
        if ($request->filled('search')) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        }

        // Apply date filter if provided
        if ($request->filled('date')) {
            $query->whereDate('event_date', $request->date);
        }

        // Fetch events after filtering
        $events = $query->get();

        return view('events.index', compact('events'));
    }

    /**
     * Show event details with attendees.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    /**
     * Handle event registration (Only for logged-in users).
     */
    public function register(Request $request, $id)
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to register for events.');
        }

        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Prevent duplicate registration for the same event
        if (Registration::where('event_id', $id)->where('email', $request->email)->exists()) {
            return back()->with('error', 'You have already registered for this event.');
        }

        // Store registration
        Registration::create([
            'event_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Registration successful!');
    }

    /**
     * Show attendees for a specific event.
     */
    public function attendees($id)
    {
        $event = Event::with('registrations')->findOrFail($id);
        return view('events.attendees', compact('event'));
    }

    /**
     * Show the event creation form (Only for Admins).
     */
    public function create()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/')->with('error', 'Unauthorized Access!');
        }
        return view('events.create');
    }

    /**
     * Store a new event in the database (Only for Admins).
     */
    public function store(Request $request)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/')->with('error', 'Unauthorized Access!');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        Event::create([
            'title' => $request->title,
            'event_date' => $request->event_date,
            'location' => $request->location,
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }
}
