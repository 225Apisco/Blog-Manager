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
<div class="p-2">
    <form>
        <input
            type="text"
            class="w-full pl-4 pr-10 py-2 border rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            placeholder="Saisissez du texte..."
          />
         <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">commenter</button>

    </form>
</div>
</div>
