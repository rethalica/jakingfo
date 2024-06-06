@extends('layouts.header')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img src="{{ asset($destination->image) }}" alt="{{ $destination->name }}" class="w-full h-64 object-cover">
            <div class="p-6">
                <h1 class="text-2xl font-semibold mb-4">{{ $destination->name }}</h1>
                <p class="text-gray-700 mb-4">{{ $destination->description }}</p>
                <p class="text-gray-600"><strong>Alamat:</strong> {{ $destination->location }}</p>
                <iframe src="{{ $destination->map_url }}" width="300" height="200" style="border:0;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <a href="{{ route('destinations.index') }}" class="text-indigo-500 mt-4 inline-block">Kembali</a>
            </div>
        </div>
    </div>
@endsection
