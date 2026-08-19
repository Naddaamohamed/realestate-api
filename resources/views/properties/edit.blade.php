<x-app-layout>

    <div class="max-w-6xl mx-auto px-4 py-8">

        {{-- Back Button --}}
        <div class="mb-6">
            <a href="{{ route('properties.show', $property->id) }}"
               class="inline-flex items-center text-sm font-semibold text-slate-600 hover:text-slate-900 transition">
                ← Back to Property
            </a>
        </div>


        {{-- Page Header --}}
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-slate-900">
                Edit Property
            </h1>

            <p class="text-slate-500 mt-2">
                Update the information and images of your property.
            </p>

        </div>


        {{-- Validation Errors --}}
        @if ($errors->any())

            <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4">

                <h3 class="text-sm font-semibold text-red-800 mb-2">
                    Please fix the following errors:
                </h3>

                <ul class="list-disc list-inside text-sm text-red-700 space-y-1">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Success Message --}}
        @if (session('success'))

            <div class="mb-6 rounded-xl bg-green-50 border border-green-200 p-4">

                <p class="text-sm font-semibold text-green-800">
                    {{ session('success') }}
                </p>

            </div>

        @endif



        {{-- ====================================================== --}}
        {{-- UPDATE PROPERTY FORM --}}
        {{-- ====================================================== --}}

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

            <form action="{{ route('properties.update', $property->id) }}"
                  method="POST"
                  class="p-6 space-y-6">

                @csrf
                @method('PUT')


                {{-- Title --}}
                <div>

                    <label for="title"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Property Title
                    </label>

                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title', $property->title) }}"
                           class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                           required>

                </div>



                {{-- Type & Purpose --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    {{-- Property Type --}}
                    <div>

                        <label for="type"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Property Type
                        </label>

                        <select id="type"
                                name="type"
                                class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                                required>

                            <option value="">
                                Select Type
                            </option>

                            <option value="apartment"
                                {{ old('type', $property->type) == 'apartment' ? 'selected' : '' }}>
                                Apartment
                            </option>

                            <option value="villa"
                                {{ old('type', $property->type) == 'villa' ? 'selected' : '' }}>
                                Villa
                            </option>

                            <option value="house"
                                {{ old('type', $property->type) == 'house' ? 'selected' : '' }}>
                                House
                            </option>

                            <option value="office"
                                {{ old('type', $property->type) == 'office' ? 'selected' : '' }}>
                                Office
                            </option>

                            <option value="land"
                                {{ old('type', $property->type) == 'land' ? 'selected' : '' }}>
                                Land
                            </option>

                        </select>

                    </div>



                    {{-- Purpose --}}
                    <div>

                        <label for="purpose"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Purpose
                        </label>

                        <select id="purpose"
                                name="purpose"
                                class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                                required>

                            <option value="">
                                Select Purpose
                            </option>

                            <option value="sale"
                                {{ old('purpose', $property->purpose) == 'sale' ? 'selected' : '' }}>
                                For Sale
                            </option>

                            <option value="rent"
                                {{ old('purpose', $property->purpose) == 'rent' ? 'selected' : '' }}>
                                For Rent
                            </option>

                        </select>

                    </div>

                </div>



                {{-- Location --}}
                <div>

                    <label for="location"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Location
                    </label>

                    <input type="text"
                           id="location"
                           name="location"
                           value="{{ old('location', $property->location) }}"
                           class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                           required>

                </div>



                {{-- Price & Area --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    {{-- Price --}}
                    <div>

                        <label for="price"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Price
                        </label>

                        <input type="number"
                               id="price"
                               name="price"
                               value="{{ old('price', $property->price) }}"
                               min="0"
                               step="0.01"
                               class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                               required>

                    </div>



                    {{-- Area --}}
                    <div>

                        <label for="area"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Area (m²)
                        </label>

                        <input type="number"
                               id="area"
                               name="area"
                               value="{{ old('area', $property->area) }}"
                               min="0"
                               step="0.01"
                               class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                               required>

                    </div>

                </div>



                {{-- Bedrooms & Bathrooms --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    {{-- Bedrooms --}}
                    <div>

                        <label for="bedrooms"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Bedrooms
                        </label>

                        <input type="number"
                               id="bedrooms"
                               name="bedrooms"
                               value="{{ old('bedrooms', $property->bedrooms) }}"
                               min="0"
                               class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500">

                    </div>



                    {{-- Bathrooms --}}
                    <div>

                        <label for="bathrooms"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Bathrooms
                        </label>

                        <input type="number"
                               id="bathrooms"
                               name="bathrooms"
                               value="{{ old('bathrooms', $property->bathrooms) }}"
                               min="0"
                               class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500">

                    </div>

                </div>



                {{-- Description --}}
                <div>

                    <label for="description"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Description
                    </label>

                    <textarea id="description"
                              name="description"
                              rows="6"
                              class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                              required>{{ old('description', $property->description) }}</textarea>

                </div>



                {{-- Status --}}
                <div>

                    <label for="status"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Status
                    </label>

                    <select id="status"
                            name="status"
                            class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                            required>

                        <option value="available"
                            {{ old('status', $property->status) == 'available' ? 'selected' : '' }}>
                            Available
                        </option>

                        <option value="sold"
                            {{ old('status', $property->status) == 'sold' ? 'selected' : '' }}>
                            Sold
                        </option>

                        <option value="rented"
                            {{ old('status', $property->status) == 'rented' ? 'selected' : '' }}>
                            Rented
                        </option>

                    </select>

                </div>



                {{-- Buttons --}}
                <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-200">

                    <a href="{{ route('properties.show', $property->id) }}"
                       class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold transition">
                        Update Property
                    </button>

                </div>

            </form>

        </div>



        {{-- ====================================================== --}}
        {{-- EXISTING IMAGES --}}
        {{-- ====================================================== --}}

        <div class="mt-8 bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">


            {{-- Header --}}
            <div class="p-6 border-b border-slate-200">

                <h2 class="text-xl font-bold text-slate-900">
                    Property Images
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Add new images or delete images you no longer want.
                </p>

            </div>



            {{-- ================================================== --}}
            {{-- ADD NEW IMAGE --}}
            {{-- ================================================== --}}

            <div class="p-6 border-b border-slate-200 bg-slate-50">

                <form action="{{ route('property-images.store', $property->id) }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="flex flex-col md:flex-row md:items-end gap-4">

                    @csrf


                    <div class="flex-1">

                        <label for="image"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Add New Image
                        </label>

                        <input type="file"
                               id="image"
                               name="image"
                               accept="image/jpeg,image/png,image/jpg,image/webp"
                               class="block w-full text-sm text-slate-600
                                      file:mr-4 file:py-2.5 file:px-4
                                      file:rounded-xl file:border-0
                                      file:bg-blue-50 file:text-blue-700
                                      file:font-semibold
                                      hover:file:bg-blue-100"
                               required>

                        <p class="text-xs text-slate-500 mt-2">
                            JPG, JPEG, PNG or WEBP. Maximum size: 5MB.
                        </p>


                        @error('image')

                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>



                    <button type="submit"
                            class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold transition">

                        + Add Image

                    </button>

                </form>

            </div>



            {{-- ================================================== --}}
            {{-- EXISTING IMAGES --}}
            {{-- ================================================== --}}

            <div class="p-6">

                @if($property->images->count() > 0)

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">


                        @foreach($property->images as $image)

                            <div class="relative group rounded-xl overflow-hidden bg-slate-100">


                                {{-- Image --}}
                                <img src="{{ asset('storage/' . $image->image) }}"
                                     alt="{{ $property->title }}"
                                     class="w-full h-48 object-cover">



                                {{-- Delete Image --}}
                                <div class="absolute top-2 right-2">

                                    <form action="{{ route('property-images.destroy', $image->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this image?');">

                                        @csrf
                                        @method('DELETE')


                                        <button type="submit"
                                                class="w-9 h-9 rounded-lg bg-red-600 text-white hover:bg-red-700 shadow-lg transition"
                                                title="Delete image">

                                            🗑

                                        </button>

                                    </form>

                                </div>


                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="rounded-xl bg-slate-50 p-5">

                        <p class="text-sm text-slate-500">
                            No images have been uploaded yet.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>