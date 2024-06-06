@extends('admin.layouts.header')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <h2 class="text-2xl font-semibold leading-tight">Dashboard</h2>

                <div class="mt-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold">Total Destinasi</h3>
                        <p class="text-gray-600">{{ $totalDestinations }}</p>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold">Total Event</h3>
                        <p class="text-gray-600">{{ $totalEvents }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
