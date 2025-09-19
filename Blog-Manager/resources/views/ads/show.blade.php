<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Ad Details</h2>
    </x-slot>

    <div class="p-6 bg-gray-50 rounded-lg shadow-md">
        <div class="flex flex-col md:flex-row gap-6 items-start">
            {{-- Left: Ad Info --}}
            <div class="flex-1">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $ad->title }}</h3>

                <div class="space-y-2 text-gray-700">
                    <p><span class="font-semibold">Category:</span> {{ $ad->category }}</p>
                    <p><span class="font-semibold">Location:</span> {{ $ad->location }}</p>
                    <p><span class="font-semibold">Price:</span> {{ number_format($ad->price, 0, ',', ' ') }} FCFA</p>
                    <p><span class="font-semibold">Description:</span><br>{{ $ad->description }}</p>
                </div>

                <div class="mt-6 flex gap-4">
                    <a href="{{ route('ads.edit', $ad) }}" class="px-4 py-2 text-black text-2xl font-bold">Edit</a>
                    <form action="{{ route('ads.destroy', $ad) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ad?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                    </form>
                </div>
            </div>

            {{-- Right: Image --}}
            <div class="w-full md:w-1/3">
                @if($ad->photos->count())
            <div class="max-sm:flex max-sm:flex-col md:flex-row flex flex-wrap gap-4">
                @foreach($ad->photos as $photo)
                    <img src="{{ asset('storage/' . $photo->path) }}" alt="Ad photo"
                        class="w-48 md:w-48 rounded-lg shadow-md object-cover h-auto">
                @endforeach
            </div>
                @else
                    <div class="text-gray-500 italic">No photos available</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>