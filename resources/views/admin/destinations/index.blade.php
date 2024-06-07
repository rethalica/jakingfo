<!-- resources/views/admin/destinations/index.blade.php -->

@extends('admin.layouts.header')

@section('content')
    <div class="container mx-auto mt-8">
        <!-- flex-col for vertical layout on small screens, flex-row for horizontal layout on larger screens -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold mb-2 sm:mb-0">Data Destinasi</h1>
            <a href="{{ route('admin.destinations.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md">Add New
                Destination</a>
        </div>
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        <!-- overflow-x-auto allows the table to be scrolled horizontally on small screens -->
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <!-- w-1/2 on small screens, w-1/12 on larger screens -->
                        <th class="w-1/2 sm:w-1/12 px-4 py-2 text-xs">No</th>
                        <!-- w-full on small screens, w-1/6 on larger screens -->
                        <th class="w-full sm:w-1/6 px-4 py-2">Nama</th>
                        <th class="w-full sm:w-1/6 px-4 py-2">Deskripsi</th>
                        <th class="w-full sm:w-1/6 px-4 py-2">Lokasi/Alamat</th>
                        <th class="w-full sm:w-1/6 px-4 py-2">Map Link</th>
                        <th class="w-full sm:w-1/6 px-4 py-2">Gambar</th>
                        <th class="w-full sm:w-1/6 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($destinations as $destination)
                        <tr>
                            <td class="border px-4 py-2 text-xs text-center">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $destination->name }}</td>
                            <td class="border px-4 py-2">
                                {{ \Illuminate\Support\Str::limit($destination->description, 70) }}</td>
                            <td class="border px-4 py-2">
                                {{ \Illuminate\Support\Str::limit($destination->location, 70) }}</td>
                            <td class="border px-4 py-2">
                                {{ \Illuminate\Support\Str::limit($destination->map_link, 30) }}
                            </td>
                            <td class="border px-4 py-2">
                                <img src="{{ asset($destination->image) }}" alt="{{ $destination->name }}"
                                    class="w-16 h-16 object-cover">
                            </td>

                            <!-- flex-col for vertical layout on small screens, flex-row for horizontal layout on larger screens -->
                            <td class="border px-4 py-2 flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                                <a href="{{ route('admin.destinations.edit', $destination->id) }}"
                                    class="bg-yellow-500 text-white px-2 py-1 rounded-md">Edit</a>
                                <form action="{{ route('admin.destinations.destroy', $destination->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this destination?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-2 py-1 rounded-md">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
