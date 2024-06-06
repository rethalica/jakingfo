<nav class="bg-gray-800 p-4 text-white">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-lg font-semibold">JakIngfo Admin</h1>
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
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="bg-transparent hover:bg-blue-900 text-purple-700 font-semibold hover:text-white py-2 px-4 border border-purple-500 hover:border-transparent rounded">
                Logout
            </button>
        </form>
    </div>`
</nav>
