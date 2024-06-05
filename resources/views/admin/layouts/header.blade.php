<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/alpine@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        @include('admin.layouts.navbar')
        <main class="flex-grow">
            @yield('content')
        </main>
    </div>
</body>

</html>
