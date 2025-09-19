{{-- resources/views/ads/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create an Ad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="block font-medium">Title</label>
                        <input type="text" name="title" id="title" class="w-full border rounded px-3 py-2" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block font-medium">Category</label>
                        <input type="text" name="category" id="category" class="w-full border rounded px-3 py-2" value="{{ old('category') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block font-medium">Description</label>
                        <textarea name="description" id="description" rows="4" class="w-full border rounded px-3 py-2" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="photo" class="block font-medium">Photo</label>
                        <input type="file" name="photos[]" id="photos" multiple class="w-full border rounded px-3 py-2" required>                    </div>

                    <div class="mb-4">
                        <label for="price" class="block font-medium">Price</label>
                        <input type="number" name="price" id="price" class="w-full border rounded px-3 py-2" value="{{ old('price') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="location" class="block font-medium">Location</label>
                        <input type="text" name="location" id="location" class="w-full border rounded px-3 py-2" value="{{ old('location') }}" required>
                    </div>

                    <div>
                        <button type="submit" class="px-4 py-2 text-2xl font-bold text-black rounded ">
                            Publish Ad
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>