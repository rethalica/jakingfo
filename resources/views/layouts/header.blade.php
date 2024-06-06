<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JakIngfo</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> --}}
    @vite('resources/css/app.css')

    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Fav Icon -->
    <link rel="shortcut Icon" href="/assets/" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Animate Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="bg-gray-100">

    <nav class="fixed top-0 w-full bg-black text-white z-50 animate__animated animate__fadeInDown"
        x-data="{ open: false }">
        <div class="container mx-auto px-6 py-3 md:flex md:justify-between md:items-center">
            <div class="flex justify-between items-center">
                <div>
                    <a class="text-lg font-bold text-white" href="#">JakIngfo</a>
                </div>

                <div class="flex md:hidden">
                    <button @click="open = !open" type="button"
                        class="text-gray-500 hover:text-white focus:outline-none focus:text-white"
                        aria-label="Toggle navigation">
                        <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="md:flex items-center justify-center navbar" :class="{ 'hidden': !open, 'flex': open }">
                <div class="flex flex-col md:flex-row md:mx-6 text-center">
                    <a class="my-1 text-sm text-white hover:underline md:mx-4 md:my-0 " href="#home">Home</a>
                    <a class="my-1 text-sm text-white hover:underline md:mx-4 md:my-0" href="about.html">Tentang</a>
                    <a class="my-1 text-sm text-white hover:underline md:mx-4 md:my-0"
                        href="{{ route('destinations.index') }}">Destinasi Wisata</a>
                    <a class="my-1 text-sm text-white hover:underline md:mx-4 md:my-0" href="event.html">Aktivitas dan
                        Acara</a>
                    <a class="my-1 text-sm text-white hover:underline md:mx-4 md:my-0" href="tips.html">Tips
                        Perjalanan</a>
                    <a class="my-1 text-sm text-white hover:underline md:mx-4 md:my-0" href="kontak.html">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-6 hero">
        @yield('content')
    </main>
    <!-- ... -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
