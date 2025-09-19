<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 text-center">Edit Ad</h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-full max-w-2xl bg-white p-6 rounded-lg shadow-md">

            {{-- Formulaire principal de mise à jour --}}
            <form action="{{ route('ads.update', $ad) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" value="{{ $ad->title }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="category" class="block font-medium text-gray-700">Category</label>
                    <input type="text" name="category" id="category" value="{{ $ad->category }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" class="w-full border rounded px-3 py-2" required>{{ $ad->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="price" class="block font-medium text-gray-700">Price</label>
                    <input type="number" name="price" id="price" value="{{ $ad->price }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="location" class="block font-medium text-gray-700">Location</label>
                    <input type="text" name="location" id="location" value="{{ $ad->location }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="photos" class="block font-medium text-gray-700">Add Photos</label>
                    <input type="file" name="photos[]" id="photos" multiple class="w-full border rounded px-3 py-2">
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="px-6 py-2 font-bold text-2xl text-black rounded">
                        Update Ad
                    </button>
                </div>
            </form>

            @if($ad->photos->count())
                <div class="mt-10">
                    <label class="block font-medium text-gray-700 mb-2">Current Photos</label>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($ad->photos as $photo)
                            <div class="relative py-4">
                                <img src="{{ asset('storage/' . $photo->path) }}" alt="Ad photo" class="w-48 h-auto object-cover rounded-lg shadow">
                                <form action="{{ route('ads.photos.destroy', $photo) }}" method="POST" class="absolute top-2 right-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white text-xl px-2 py-1 rounded hover:bg-red-700">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>