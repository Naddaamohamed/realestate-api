<x-app-layout>

    <div class="max-w-4xl mx-auto px-4 py-8">

        {{-- Header --}}
        <div class="mb-8">
            <a href="{{ route('properties.index') }}"
               class="inline-flex items-center text-sm font-semibold text-slate-600 hover:text-slate-900 transition mb-4">
                ← Back to Properties
            </a>

            <h1 class="text-3xl font-bold text-slate-900">
                Add New Property
            </h1>

            <p class="text-slate-500 mt-2">
                Add the details of your property below.
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
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Create Property Form --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

            <form action="{{ route('properties.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="p-6 space-y-6">

                @csrf

                {{-- Title --}}
                <div>
                    <label for="title"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Property Title
                    </label>

                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title') }}"
                           placeholder="e.g. Modern Apartment in Cairo"
                           class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                           required>
                </div>

                {{-- Type & Purpose --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label for="type"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Property Type
                        </label>

                        <select id="type"
                                name="type"
                                class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                                required>

                            <option value="">Select Type</option>

                            <option value="apartment"
                                {{ old('type') == 'apartment' ? 'selected' : '' }}>
                                Apartment
                            </option>

                            <option value="villa"
                                {{ old('type') == 'villa' ? 'selected' : '' }}>
                                Villa
                            </option>

                            <option value="house"
                                {{ old('type') == 'house' ? 'selected' : '' }}>
                                House
                            </option>

                            <option value="office"
                                {{ old('type') == 'office' ? 'selected' : '' }}>
                                Office
                            </option>

                            <option value="land"
                                {{ old('type') == 'land' ? 'selected' : '' }}>
                                Land
                            </option>

                        </select>
                    </div>

                    <div>
                        <label for="purpose"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Purpose
                        </label>

                        <select id="purpose"
                                name="purpose"
                                class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                                required>

                            <option value="">Select Purpose</option>

                            <option value="sale"
                                {{ old('purpose') == 'sale' ? 'selected' : '' }}>
                                For Sale
                            </option>

                            <option value="rent"
                                {{ old('purpose') == 'rent' ? 'selected' : '' }}>
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
                           value="{{ old('location') }}"
                           placeholder="e.g. Cairo"
                           class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                           required>
                </div>

                {{-- Price & Area --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label for="price"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Price
                        </label>

                        <input type="number"
                               id="price"
                               name="price"
                               value="{{ old('price') }}"
                               placeholder="250000"
                               min="0"
                               step="0.01"
                               class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                               required>
                    </div>

                    <div>
                        <label for="area"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Area (m²)
                        </label>

                        <input type="number"
                               id="area"
                               name="area"
                               value="{{ old('area') }}"
                               placeholder="150"
                               min="0"
                               step="0.01"
                               class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                               required>
                    </div>

                </div>

                <div>
    <label for="contact"
           class="block text-sm font-medium text-slate-700 mb-2">
        Contact Information
    </label>

    <input
        type="text"
        name="contact"
        id="contact"
        value="{{ old('contact') }}"
        placeholder="Phone, WhatsApp, or Email"
        class="w-full rounded-xl border border-slate-300 px-4 py-3
               text-slate-900 focus:border-indigo-500
               focus:ring-indigo-500"
    >

    <p class="mt-1 text-xs text-slate-500">
        Add at least one way for interested buyers to contact you.
    </p>

    @error('contact')
        <p class="mt-1 text-sm text-red-600">
            {{ $message }}
        </p>
    @enderror
</div>

                {{-- Bedrooms & Bathrooms --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label for="bedrooms"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Bedrooms
                        </label>

                        <input type="number"
                               id="bedrooms"
                               name="bedrooms"
                               value="{{ old('bedrooms') }}"
                               placeholder="3"
                               min="0"
                               class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="bathrooms"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Bathrooms
                        </label>

                        <input type="number"
                               id="bathrooms"
                               name="bathrooms"
                               value="{{ old('bathrooms') }}"
                               placeholder="2"
                               min="0"
                               class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                </div>

                {{-- Property Images --}}
                <div>
                    <label for="images"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Property Images
                    </label>

                    <p class="text-sm text-slate-500 mb-3">
                        Upload one or more images of your property.
                    </p>

                    <input type="file"
                           id="images"
                           name="images[]"
                           multiple
                           accept="image/jpeg,image/png,image/jpg,image/webp"
                           class="block w-full text-sm text-slate-600
                                  file:mr-4 file:py-2.5 file:px-4
                                  file:rounded-xl file:border-0
                                  file:bg-blue-50 file:text-blue-700
                                  file:font-semibold
                                  hover:file:bg-blue-100">

                    @error('images')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                    @error('images.*')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
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
                              placeholder="Describe the property..."
                              class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500"
                              required>{{ old('description') }}</textarea>
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
                            {{ old('status', 'available') == 'available' ? 'selected' : '' }}>
                            Available
                        </option>

                        <option value="sold"
                            {{ old('status') == 'sold' ? 'selected' : '' }}>
                            Sold
                        </option>

                        <option value="rented"
                            {{ old('status') == 'rented' ? 'selected' : '' }}>
                            Rented
                        </option>

                    </select>
                </div>

                {{-- Buttons --}}
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">

                    <a href="{{ route('properties.index') }}"
                       class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold transition">
                        Create Property
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>