@extends ('includes.homepage.header')

@section('content')
    <div class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-white fw-bold mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                        {{-- kondisi jika user login/tidak --}}
                        @if (Auth::check())
                            Halo, {{ Auth::user()->name }}, siap menjelajahi Jakarta? <br />
                        @else
                            Strolling around Jakarta with us <br />
                        @endif
                        <!-- Sukses Jakarta Untuk Indonesia -->
                    </h1>
                    <p class="text-white mb-4 text-opacity-75 animate__animated animate__fadeInUp animate__delay-1s">
                        Layanan informasi mengenai tempat wisata, aktivitas dan acara di
                        Jakarta yang tersebar di berbagai daerah administrasi. JakIngfo
                        juga menyediakan tips perjalanan yang dapat membantu anda dalam
                        merencanakan perjalanan anda.
                    </p>
                    {{-- <button id="joinBtn"
                        class="btn btn-outline-light btn-lg rounded-1 me-2 animate__animated animate__fadeInUp animate__delay-1s">
                        Penasaran? Klik di sini
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Hero -->

    <!-- About -->
    <div class="about" id="about">
        <div class="container-fluid">
            <div class="row row-cols-lg-2 row-cols-1">
                <div class="col text-center py-5 text-white">
                    <h2 class="fw-bold mb-2">About JakIngfo</h2>
                    <p>
                        JakIngfo merupakan sebuah website yang dapat digunakan <br />
                        oleh seluruh pengguna internet. <br /> <br />
                        Tujuannya adalah memberikan informasi seperti
                         <br />
                         deskripsi singkat, alamat/lokasi pada google maps, <br />
                         tips perjalanan, dan juga komentar sesama user <br />
                         tentang suatu wisata/acara yang berada di wilayah Jakarta <br />
                    </p>
                </div>
                <div class="col text-center py-5 bg-blue-600 text-black">
                    <h2 class="fw-bold mb-2">Anggota Kelompok</h2>
                    <div class="container">
                        <div class="column">
                            <div class="person">
                                - Ravindra Yardan Mukti <br />
                                  J0404221013
                            </div>
                            <div class="person">
                                - Athaya Thariq Indera <br />
                                  J0404221071
                            </div>
                            <div class="person">
                                - Inayah Muharramissyiham <br />
                                  J0404221006
                            </div>
                        </div>
                        <div class="column">
                            <div class="person">
                                - Ahmad Rasyid Khalid Ismail<br />
                                  J0404221149
                            </div>
                            <div class="person">
                                - Hafidzah Kamilah<br />
                                  J0404221151
                            </div>
                            <div class="person">
                                - Sania Maylani<br />
                                  X1014232037
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About -->

    <div class="container mt-5">
        <!-- Destinations Section -->
        <h2 class="text-2xl font-semibold mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Berbagai
            Destinasi Wisata</h2>
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4">
            @foreach ($destinations->take(3) as $destination)
                <div class="col" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <a href="{{ route('destinations.show', $destination->id) }}" class="text-decoration-none text-dark">
                        <div class="card shadow-sm h-100">
                            <img src="{{ asset($destination->image) }}" class="card-img-top" alt="{{ $destination->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $destination->name }}</h5>
                                <p class="card-text">{{ Str::limit($destination->description, 50) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Events Section -->
        <h2 class="text-2xl font-semibold mt-5 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Event
        </h2>
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4">
            @foreach ($events->take(3) as $event)
                <div class="col" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <a href="{{ route('events.show', $event->id) }}" class="text-decoration-none text-dark">
                        <div class="card shadow-sm h-100">
                            <img src="{{ asset($event->image) }}" class="card-img-top" alt="{{ $event->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->name }}</h5>
                                <p class="card-text">{{ Str::limit($event->description, 50) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
