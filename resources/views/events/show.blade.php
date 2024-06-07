@extends('layouts.header')

@section('content')
    <div class="container mx-auto mt-8 max-w-6xl p-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" class="w-full h-64 object-cover">
            <div class="p-6">
                <h1 class="text-2xl font-semibold mb-4">{{ $event->name }}</h1>
                <p class="text-gray-700 text-lg font-bold leading-relaxed mb-4 align-baseline">
                    {{ $event->description }}</p>
                <p class="text-gray-600 text-lg leading-relaxed"><strong>Alamat:</strong> {{ $event->location }}</p>

                <p class="text-gray-600 text-lg leading-relaxed"><strong>Waktu:</strong> {{ $event->date }}</p>
                <br>
                <div class="flex space-x-4">

                    <div class="w-1/2">
                        <iframe src="{{ $event->map_link }}" width="100%" height="300" style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="w-1/2">
                        <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" class="w-full h-64 object-cover">
                    </div>
                </div>

                <a href="{{ route('events.index') }}" class="text-indigo-500 mt-4 inline-block">Kembali</a>
            </div>
        </div>
    </div>
@endsection
