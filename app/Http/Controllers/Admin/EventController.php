<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required | min:10 | max:10000',
            'date' => 'required',
            'location' => 'required',
            'tips' => 'required',
            'image' => 'required | image | mimes:jpeg,png,jpg | max:5000',
        ]);

        if ($request->has('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'images/events/';
            $file->move($path, $filename);
        }

        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'tips' => $request->tips,
            'image' => $path . $filename,
        ]);

        return to_route('admin.events.index')->with('success', 'Berhasil menambahkan event baru.');
    }

    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'location' => 'required',
            'tips' => 'required',
            'image' => 'image | mimes:jpeg,png,jpg | max:5000',
        ]);

        $event = Event::findOrFail($id);

        if ($request->has('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'images/events/';
            $file->move($path, $filename);

            if (File::exists($event->image)) {
                File::delete($event->image);
            }
        }

        $event->update([
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'tips' => $request->tips,
            'image' => $request->has('image') ? $path . $filename : $event->image,
        ]);

        return to_route('admin.events.index')->with('success', 'Berhasil mengubah event.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        if (File::exists($event->image)) {
            File::delete($event->image);
        }

        $event->delete();

        return to_route('admin.events.index')->with('success', 'Berhasil menghapus event.');
    }
}
