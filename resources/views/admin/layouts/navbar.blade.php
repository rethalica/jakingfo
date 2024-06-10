<nav class="bg-gray-800 p-4 text-white sticky top-0 z-50">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <h1 class="text-lg font-semibold mb-2 md:mb-0">JakIngfo Admin</h1>
        <div class="flex space-x-4 font-semibold">
            <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-gray-500">
                Dashboard
            </a>
            <a href="{{ route('admin.destinations.index') }}" class="text-white hover:text-gray-500">
                <i class="fas fa-map-marker-alt"></i> Destinasi Wisata
            </a>
            <a href="{{ route('admin.events.index') }}" class="text-white hover:text-gray-500">
                <i class="fas fa-calendar-alt"></i> Event
            </a>
            <a href="{{ route('admin.comments.index') }}" class="text-white hover:text-gray-500">
                <i class="fas fa-comment-alt"></i> Komentar
            </a>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="mt-2 md:mt-0">
            @csrf
            <button type="submit"
                class="bg-transparent hover:bg-blue-900 text-white-700 font-semibold hover:text-white py-2 px-4 rounded">
                Logout
            </button>
        </form>
    </div>
</nav>
