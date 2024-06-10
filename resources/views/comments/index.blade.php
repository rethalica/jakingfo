@extends('includes.homepage.header')

@section('content')
    <div class="hero d-flex align-items-center">
        <div class="container mt-5">
            <h2 class="mb-4 text-center text-white">Kata Mereka</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($comments as $comment)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $comment->user->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $comment->created_at->format('d M Y, H:i') }}
                                </h6>
                                <p class="card-text">{{ $comment->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Button untuk Membuka Modal Form Komentar -->
            @auth
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#commentModal">
                        Tambahkan Komentar Anda
                    </button>
                </div>

                <!-- Modal Form Komentar -->
                <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="commentModalLabel">Tambahkan Komentar Anda <br>
                                    {{ Auth::user()->name }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('comments.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Komentar</label>
                                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-warning text-center mt-4 border-0" role="alert">
                    Anda harus <a href="{{ route('login') }}">login</a> untuk menambahkan komentar.
                </div>
            @endauth
        </div>
    </div>
@endsection
