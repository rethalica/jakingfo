<!-- resources/views/admin/events/index.blade.php -->

@extends('admin.layouts.header')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Data Event</h1>
            <a href="{{ route('admin.events.create') }}"
                class="bg-blue-900 text-white font-semibold px-4 py-2 rounded-md">Tambah Event</a>
        </div>
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/12 px-4 py-2 text-xs">No</th> <!-- Reduced width and font size -->
                        <th class="w-1/6 px-4 py-2">Nama</th>
                        <th class="w-1/6 px-4 py-2">Deskripsi</th>
                        <th class="w-1/6 px-4 py-2">Tanggal</th>
                        <th class="w-1/6 px-4 py-2">Lokasi/Alamat</th>
                        <th class="w-1/6 px-4 py-2">Map Link</th>
                        <th class="w-1/6 px-4 py-2">Image</th>
                        <th class="w-1/6 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($events as $event)
                        <tr>
                            <td class="border px-4 py-2 text-xs text-center">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $event->name }}</td>
                            <td class="border px-4 py-2">
                                {{ \Illuminate\Support\Str::limit($event->description, 70) }}</td>

                            <td class="border px-4 py-2">
                                {{ $event->date }}</td>

                            <td class="border px-4 py-2">
                                {{ \Illuminate\Support\Str::limit($event->location, 70) }}</td>

                            <td class="border px-4 py-2">
                                {{ \Illuminate\Support\Str::limit($event->map_link, 50) }}
                            </td>

                            <td class="border px-4 py-2">
                                <img src="{{ asset($event->image) }}" alt="{{ $event->name }}"
                                    class="w-16 h-16 object-cover">
                            </td>



                            <td class="border px-4 py-2 flex space-x-2">
                                <a href="{{ route('admin.events.edit', $event->id) }}"
                                    class="bg-yellow-500 text-white px-2 py-1 rounded-md">Edit</a>
                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                    onsubmit="return confirm('Anda yakin akan menghaspus Event ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
