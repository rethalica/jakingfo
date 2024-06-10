@extends('admin.layouts.header')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <h2 class="text-2xl font-semibold leading-tight mb-6">Dashboard</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="overflow-hidden shadow-sm sm:rounded-lg animate__animated animate__fadeInLeft flex flex-col"
                data-aos="zoom-in">
                <div class="p-6 bg-white border-b border-gray-200 flex-grow">
                    <h3 class="text-lg font-semibold">Total Destinasi</h3>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt text-gray-600"></i>
                        <p class="text-gray-600 text-2xl">{{ $totalDestinations }}</p>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden shadow-sm sm:rounded-lg animate__animated animate__fadeInRight flex flex-col"
                data-aos="zoom-in">
                <div class="p-6 bg-white border-b border-gray-200 flex-grow">
                    <h3 class="text-lg font-semibold">Total Event</h3>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-calendar-alt text-gray-600"></i>
                        <p class="text-gray-600 text-2xl">{{ $totalEvents }}</p>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden shadow-sm sm:rounded-lg animate__animated animate__fadeInRight flex flex-col"
                data-aos="zoom-in">
                <div class="p-6 bg-white border-b border-gray-200 flex-grow">
                    <h3 class="text-lg font-semibold">Komentar (ACC/Belum)</h3>
                    <div class="flex justify-start space-x-4 items-center">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check text-gray-600"></i>
                            <p class="text-gray-600 text-xl">{{ $totalApprovedComments }}</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-times text-gray-600"></i>
                            <p class="text-gray-600 text-xl">{{ $totalUnapprovedComments }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.comments.pdf') }}"
                            class="inline-flex justify-center py-1 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            PDF
                        </a>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden shadow-sm sm:rounded-lg animate__animated animate__fadeInRight flex flex-col"
                data-aos="zoom-in">
                <div class="p-6 bg-white border-b border-gray-200 flex-grow">
                    <h3 class="text-lg font-semibold">Total User</h3>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-users text-gray-600"></i>
                        <p class="text-gray-600 text-2xl">{{ $totalUsers }}</p>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.users.pdf') }}"
                            class="inline-flex justify-center py-1 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            PDF
                        </a>
                        <a href="{{ route('admin.users.excel') }}"
                            class="inline-flex justify-center py-1 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Xlsx
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
