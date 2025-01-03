<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark animate__animated animate__fadeInDown">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="#">JakIngfo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link mx-1 {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                        href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 {{ Request::is('about') ? 'active' : '' }}" href="about.html">Tentang
                        kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 {{ Request::is('destinations*') ? 'active' : '' }}"
                        href="{{ route('destinations.index') }}">Destinasi Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 {{ Request::is('events*') ? 'active' : '' }}"
                        href="{{ route('events.index') }}">Aktivitas dan Acara</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 {{ Request::is('tips*') ? 'active' : '' }}" href="{{ route('tips') }}">Tips
                        Perjalanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 {{ Request::is('kata-mereka*') ? 'active' : '' }}"
                        href="{{ route('comments.index') }}">Kata mereka</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link mx-1" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link mx-1" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-1" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            </ul>

            {{-- <div class="text-center">
                <i class="fa-brands fa-instagram fs-5 mx-2"></i>
                <i class="fa-brands fa-facebook fs-5 mx-2"></i>
                <i class="fa-brands fa-twitter fs-5 mx-2"></i>
                <i class="fa-brands fa-tiktok fs-5 mx-2"></i>
            </div> --}}
        </div>
    </div>
</nav>
<!-- Navbar -->
