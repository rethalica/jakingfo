<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JakIngfo</title>
    <link rel="shortcut Icon" href="{{ asset('assets/img/logo.png') }}" />

    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/alpine@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        @include('admin.layouts.navbar')
        <main class="flex-grow">
            @yield('content')
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</body>

</html>
