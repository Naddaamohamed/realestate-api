<x-app-layout>

    <div class="max-w-6xl mx-auto px-4 py-8">

        {{-- Back Button --}}
        <div class="mb-6">
            <a href="{{ route('cars.index') }}"
               class="inline-flex items-center text-sm font-semibold text-slate-600 hover:text-slate-900 transition">
                ← Back to Cars
            </a>
        </div>

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">
                Add New Car
            </h1>

            <p class="text-slate-500 mt-2">
                Add a new vehicle to your listings.
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

        {{-- Form --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

            <form action="{{ route('cars.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="p-6 space-y-6">

                @csrf

                {{-- Title --}}
                <div>
                    <label for="title"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Car Title
                    </label>

                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title') }}"
                           placeholder="Example: BMW 320i Luxury"
                           class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                           required>
                </div>

                {{-- Brand & Model --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label for="brand"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Brand
                        </label>

                        <input type="text"
                               id="brand"
                               name="brand"
                               value="{{ old('brand') }}"
                               placeholder="Example: BMW"
                               class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                               required>
                    </div>

                    <div>
                        <label for="model"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Model
                        </label>

                        <input type="text"
                               id="model"
                               name="model"
                               value="{{ old('model') }}"
                               placeholder="Example: 320i"
                               class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                               required>
                    </div>

                </div>

                {{-- Year & Mileage --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label for="year"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Year
                        </label>

                        <input type="number"
                               id="year"
                               name="year"
                               value="{{ old('year') }}"
                               min="1900"
                               max="{{ date('Y') }}"
                               placeholder="{{ date('Y') }}"
                               class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                               required>
                    </div>

                    <div>
                        <label for="mileage"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Mileage (km)
                        </label>

                        <input type="number"
                               id="mileage"
                               name="mileage"
                               value="{{ old('mileage') }}"
                               min="0"
                               placeholder="Example: 50000"
                               class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                               required>
                    </div>

                </div>

                {{-- Price & Location --}}
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
                               min="0"
                               step="0.01"
                               placeholder="Example: 850000"
                               class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                               required>
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

                    <div>
                        <label for="location"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Location
                        </label>

                        <input type="text"
                               id="location"
                               name="location"
                               value="{{ old('location') }}"
                               placeholder="Example: Cairo, Egypt"
                               class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                               required>
                    </div>

                </div>

                {{-- Transmission & Fuel --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label for="transmission"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Transmission
                        </label>

                        <select id="transmission"
                                name="transmission"
                                class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                                required>

                            <option value="">Select Transmission</option>

                            <option value="automatic"
                                {{ old('transmission') == 'automatic' ? 'selected' : '' }}>
                                Automatic
                            </option>

                            <option value="manual"
                                {{ old('transmission') == 'manual' ? 'selected' : '' }}>
                                Manual
                            </option>

                        </select>
                    </div>

                    <div>
                        <label for="fuel_type"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Fuel Type
                        </label>

                        <select id="fuel_type"
                                name="fuel_type"
                                class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                                required>

                            <option value="">Select Fuel Type</option>

                            <option value="petrol"
                                {{ old('fuel_type') == 'petrol' ? 'selected' : '' }}>
                                Petrol
                            </option>

                            <option value="diesel"
                                {{ old('fuel_type') == 'diesel' ? 'selected' : '' }}>
                                Diesel
                            </option>

                            <option value="hybrid"
                                {{ old('fuel_type') == 'hybrid' ? 'selected' : '' }}>
                                Hybrid
                            </option>

                            <option value="electric"
                                {{ old('fuel_type') == 'electric' ? 'selected' : '' }}>
                                Electric
                            </option>

                        </select>
                    </div>

                </div>

                {{-- Status --}}
                <div>
                    <label for="status"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Status
                    </label>

                    <select id="status"
                            name="status"
                            class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                            required>

                        <option value="">Select Status</option>

                        <option value="available"
                            {{ old('status', 'available') == 'available' ? 'selected' : '' }}>
                            Available
                        </option>

                        <option value="sold"
                            {{ old('status') == 'sold' ? 'selected' : '' }}>
                            Sold
                        </option>

                    </select>
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
                              placeholder="Describe the car, its condition, features, and additional information..."
                              class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                              required>{{ old('description') }}</textarea>
                </div>

                {{-- Images --}}
                <div class="border-t border-slate-200 pt-6">

                    <label for="images"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Car Images
                    </label>

                    <p class="text-sm text-slate-500 mb-3">
                        You can select multiple images. Maximum size: 5MB per image.
                    </p>

                    <input type="file"
                           id="images"
                           name="images[]"
                           multiple
                           accept="image/jpeg,image/png,image/jpg,image/webp"
                           class="block w-full text-sm text-slate-600
                                  file:mr-4 file:py-2.5 file:px-4
                                  file:rounded-xl file:border-0
                                  file:bg-indigo-50 file:text-indigo-700
                                  file:font-semibold
                                  hover:file:bg-indigo-100">

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

                {{-- Buttons --}}
                <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-200">

                    <a href="{{ route('cars.index') }}"
                       class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-6 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold transition">
                        Add Car
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>