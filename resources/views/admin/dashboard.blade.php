@extends('admin.layouts.header')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl font-semibold leading-tight mb-6">Dashboard</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="overflow-hidden shadow-sm sm:rounded-lg animate__animated animate__fadeInLeft" data-aos="zoom-in">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold">Total Destinasi</h3>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt text-gray-600"></i>
                        <p class="text-gray-600 text-2xl">{{ $totalDestinations }}</p>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden shadow-sm sm:rounded-lg animate__animated animate__fadeInRight" data-aos="zoom-in">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold">Total Event</h3>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-calendar-alt text-gray-600"></i>
                        <p class="text-gray-600 text-2xl">{{ $totalEvents }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
