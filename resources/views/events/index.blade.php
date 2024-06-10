<!-- resources/views/events/index.blade.php -->

@extends('layouts.header')

@section('content')
    <div class="container mx-auto mt-16 mb-16">
        <h1 class="text-2xl font-semibold mb-8 text-white">Aktivitas dan Event</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($events as $event)
                <div class="bg-white shadow-md rounded-lg overflow-hidden" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="400">
                    <img src="{{ asset($event->image) }}" alt="{{ $event->name }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold mb-2">{{ $event->name }}</h2>
                        <p class="text-gray-600 mb-2">{{ Str::limit($event->description, 50) }}</p>
                        <p class="text-gray-600 mb-4">{{ Str::limit($event->location, 30) }}</p>
                        <a href="{{ route('events.show', $event->id) }}" class="text-indigo-500 mt-2 inline-block">Baca
                            selengkapnya..</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
