<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Event;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function destination_index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    public function destination_show(string $id)
    {
        $destination = Destination::findOrFail($id);
        return view('destinations.show', compact('destination'));
    }

    public function event_index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }
}
