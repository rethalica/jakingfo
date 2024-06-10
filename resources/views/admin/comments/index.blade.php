@extends('admin.layouts.header')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="mb-4 text-center text-2xl font-bold">Dashboard komentar</h2>
        <div class="flex flex-wrap">
            <div class="w-full">
                <h3 class="text-lg font-bold mb-4">Komentar dipost</h3>
                <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/2 sm:w-1/12 px-4 py-2 text-xs">No</th>
                                <th class="w-full sm:w-1/6 px-4 py-2">User</th>
                                <th class="w-full sm:w-1/6 px-4 py-2">Date</th>
                                <th class="w-full sm:w-1/6 px-4 py-2">Content</th>
                                <th class="w-full sm:w-1/6 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($comments as $comment)
                                @if ($comment->approved)
                                    <tr>
                                        <td class="border px-4 py-2 text-xs text-center">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2">{{ $comment->user->name }}</td>
                                        <td class="border px-4 py-2">{{ $comment->created_at->format('d M Y, H:i') }}</td>
                                        <td class="border px-4 py-2">{{ $comment->content }}</td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h3 class="text-lg font-bold mb-4 mt-10">Komentar belum dipost</h3>
                <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/2 sm:w-1/12 px-4 py-2 text-xs">No</th>
                                <th class="w-full sm:w-1/6 px-4 py-2">Nama User</th>
                                <th class="w-full sm:w-1/6 px-4 py-2">Waktu</th>
                                <th class="w-full sm:w-1/6 px-4 py-2">Content</th>
                                <th class="w-full sm:w-1/6 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($comments as $comment)
                                @if (!$comment->approved)
                                    <tr>
                                        <td class="border px-4 py-2 text-xs text-center">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2">{{ $comment->user->name }}</td>
                                        <td class="border px-4 py-2">{{ $comment->created_at->format('d M Y, H:i') }}</td>
                                        <td class="border px-4 py-2">{{ $comment->content }}</td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('comments.approve', $comment->id) }}" method="POST"
                                                class="mr-2">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Approve</button>
                                            </form>
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
