<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto px-4">

        <!-- Actions -->
        <div class="flex flex-col md:flex-row justify-between mb-6 gap-3">
            <a href="{{ route('ads.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded shadow font-semibold transition">
               + Create an Ad
            </a>
            <a href="{{ url('/') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-3 rounded shadow font-semibold transition">
               See All Ads
            </a>
        </div>

        <!-- Tableau des Ads -->
        @if($ads->isEmpty())
            <p class="text-gray-500 text-center py-10 text-lg">You have not posted any ads yet.</p>
        @else
            <div class="overflow-x-auto rounded-lg shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-blue-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-blue-800">Photo</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-blue-800">Title</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-blue-800">Category</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-blue-800">Description</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-blue-800">Price</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-blue-800">Location</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-blue-800">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($ads as $ad)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-4 py-2">
                                @if($ad->photos->first())
                                    <img src="{{ asset('storage/' . $ad->photos->first()->path) }}"
                                         alt="Ad photo" class="w-16 h-16 object-cover rounded">
                                @else
                                    <span class="text-gray-400">No photo</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 font-semibold text-gray-700">{{ $ad->title }}</td>
                            <td class="px-4 py-2 text-gray-600">{{ $ad->category }}</td>
                            <td class="px-4 py-2 text-gray-600 text-sm">{{ Str::limit($ad->description, 60) }}</td>
                            <td class="px-4 py-2 text-gray-600">${{ $ad->price }}</td>
                            <td class="px-4 py-2 text-gray-600">{{ $ad->location }}</td>
                            <td class="px-4 py-2">
                                <div class="flex flex-wrap gap-2">
                                    <a href="{{ route('ads.show', $ad) }}"
                                       class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-sm">
                                       Read
                                    </a>
                                    <a href="{{ route('ads.edit', $ad) }}"
                                       class="px-3 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500 transition text-sm">
                                       Update
                                    </a>
                                    <form action="{{ route('ads.destroy', $ad) }}" method="POST" onsubmit="return confirm('Delete this ad?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition text-sm">
                                                Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="bg-blue-700 text-white py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
            <div class="text-sm">&copy; {{ date('Y') }} My Blog-Manager. Tous droits réservés.</div>
            <div class="flex space-x-4 mt-3 md:mt-0">
                <a href="#" class="hover:underline">Documentation</a>
                <a href="#" class="hover:underline">Support</a>
                <a href="#" class="hover:underline">GitHub</a>
            </div>
        </div>
    </footer>

</x-app-layout>
