<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('admin.destinations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required | min:10 | max:10000',
            'location' => 'required',
            'tips' => 'required',
            'image' => 'required | image | mimes:jpeg,png,jpg | max:5000',
        ]);

        if ($request->has('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'images/destinations/';
            $file->move($path, $filename);
        }

        Destination::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'location' => $request->location,
            'tips' => $request->tips,
            'image' => $path . $filename,
        ]);

        return to_route('admin.destinations.index')->with('success', 'Berhasil menambahkan destinasi baru.');
    }

    public function edit(string $id)
    {
        $destination = Destination::find($id);
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'required | min:10 | max:10000',
            'location' => 'required',
            'tips' => 'required',
            'image' => 'required | image | mimes:jpeg,png,jpg | max:5000',
        ]);

        $destination = Destination::findOrFail($id);

        if ($request->has('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'images/destinations/';
            $file->move($path, $filename);

            if (File::exists($destination->image)) {
                File::delete($destination->image);
            }
        }

        $destination->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'location' => $request->location,
            'tips' => $request->tips,
            'image' => $request->has('image') ? $path . $filename : $destination->image,
        ]);

        return to_route('admin.destinations.index')->with('success', 'Berhasil mengubah destinasi.');
    }

    public function destroy(string $id)
    {
        $destination = Destination::findOrFail($id);
        if (File::exists($destination->image)) {
            File::delete($destination->image);
        }

        $destination->delete();

        return to_route('admin.destinations.index')->with('success', 'Berhasil menghapus destinasi.');
    }
}
