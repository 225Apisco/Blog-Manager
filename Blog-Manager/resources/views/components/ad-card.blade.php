<div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition duration-300 flex flex-col">
    @if($ad->photos->isNotEmpty())
        <img src="{{ asset('storage/' . $ad->photos->first()->path) }}"
             alt="Photo {{ $ad->title }}"
             class="w-auto h-auto object-cover">
    @else
        <img src="{{ asset('images/no-image.jpg') }}"
             alt="no photo"
             class="w-auto h-auto object-cover">
    @endif

    <div class="p-4 flex-grow flex flex-col justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $ad->title }}</h3>
            <span class="text-green-600 font-bold text-xl block mb-2">{{ number_format($ad->price, 0, ',', ' ') }} FCFA</span>
            <p class="text-gray-600 text-sm mb-3">{{ Str::limit($ad->description, 100) }}</p>
        </div>

        <div class="flex items-center text-sm text-gray-500 mb-4">
            <span>{{ $ad->user->name }}</span>
            <span class="mx-2">- le</span>
            <span>{{ $ad->created_at->format('d/m/Y') }}</span>
        </div>

        <a href="{{ route('ads.show', $ad) }}"
           class="inline-block text-center text-black px-4 py-2 text-2xl font-semibold">
            Voir Détails
        </a>
    </div>

    
</div>
