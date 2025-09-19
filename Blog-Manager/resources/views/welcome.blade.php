<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-black">
            {{ __('My Blog Manager') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 mb-6 mt-5">
        <form action="{{ url('/') }}" method="GET" class="flex flex-wrap gap-2">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search une Ad..."
                class="flex-grow border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            <input
                type="text"
                name="category"
                value="{{ request('category') }}"
                placeholder="Category"
                class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            <input
                type="text"
                name="location"
                value="{{ request('location') }}"
                placeholder="Localisation"
                class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >

            <input
                type="number"
                name="price_min"
                value="{{ request('price_min') }}"
                placeholder="Price min"
                class="w-24 border border-gray-300 rounded px-2 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                min="0"
            >

            <input
                type="number"
                name="price_max"
                value="{{ request('price_max') }}"
                placeholder="Price max"
                class="w-24 border border-gray-300 rounded px-2 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                min="0"
            >

            <button type="submit" class="bg-blue-600 text-white px-4 rounded hover:bg-blue-700 transition">
                Search
            </button>
        </form>
    </div>


    @if(request()->anyFilled(['search', 'category', 'location', 'price_min', 'price_max']))
        <div class="max-w-7xl mx-auto px-4 mb-6">
            <h3 class="text-xl font-semibold mb-4">Search results</h3>
            @if($adsFiltered->isEmpty())
                <p>No ads found for these criteria.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">
                    @foreach ($adsFiltered as $ad)
                        <x-ad-card :ad="$ad" />
                    @endforeach
                </div>
            @endif
        </div>
    @endif


    <div class="py-6 max-w-7xl mx-auto px-4">
        <h3 class="text-xl font-semibold mb-4">All Ads</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">
            @foreach ($ads as $ad)
                <x-ad-card :ad="$ad" />
            @endforeach
        </div>
    </div>

    <footer class="bg-gray-800 text-white py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
            <div class="text-sm">
                &copy; {{ date('Y') }} Blog Manager. Tous droits réservés.
            </div>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" class="hover:underline">À propos</a>
                <a href="#" class="hover:underline">Contact</a>
                <a href="#" class="hover:underline">Conditions</a>
            </div>
        </div>
    </footer>
</x-app-layout>
