<x-app-layout>

    <div class="max-w-6xl mx-auto px-4 py-8">

        {{-- Back Button --}}
        <div class="mb-6">
            <a href="{{ route('cars.show', $car->id) }}"
               class="inline-flex items-center text-sm font-semibold text-slate-600 hover:text-slate-900 transition">
                ← Back to Car
            </a>
        </div>


        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-900">
                Edit Car
            </h1>

            <p class="text-slate-500 mt-2">
                Update the information and images of your car.
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


        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-6 rounded-xl bg-green-50 border border-green-200 p-4">

                <p class="text-sm font-semibold text-green-800">
                    {{ session('success') }}
                </p>

            </div>
        @endif


        {{-- ====================================================== --}}
        {{-- UPDATE CAR FORM --}}
        {{-- ====================================================== --}}

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

            <form action="{{ route('cars.update', $car->id) }}"
                  method="POST"
                  class="p-6 space-y-6">

                @csrf
                @method('PUT')


                {{-- Title --}}
                <div>

                    <label for="title"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Car Title
                    </label>

                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title', $car->title) }}"
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
                               value="{{ old('brand', $car->brand) }}"
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
                               value="{{ old('model', $car->model) }}"
                               class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                               required>

                    </div>

                </div>


                {{-- Year & Price --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <label for="year"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Year
                        </label>

                        <input type="number"
                               id="year"
                               name="year"
                               value="{{ old('year', $car->year) }}"
                               min="1900"
                               max="{{ date('Y') }}"
                               class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                               required>

                    </div>


                    <div>

                        <label for="price"
                               class="block text-sm font-semibold text-slate-700 mb-2">
                            Price
                        </label>

                        <input type="number"
                               id="price"
                               name="price"
                               value="{{ old('price', $car->price) }}"
                               min="0"
                               step="0.01"
                               class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                               required>

                    </div>

                </div>


                {{-- Mileage --}}
                <div>

                    <label for="mileage"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Mileage (km)
                    </label>

                    <input type="number"
                           id="mileage"
                           name="mileage"
                           value="{{ old('mileage', $car->mileage) }}"
                           min="0"
                           class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                           required>

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

                            <option value="">
                                Select Transmission
                            </option>

                            <option value="automatic"
                                {{ old('transmission', $car->transmission) == 'automatic' ? 'selected' : '' }}>
                                Automatic
                            </option>

                            <option value="manual"
                                {{ old('transmission', $car->transmission) == 'manual' ? 'selected' : '' }}>
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

                            <option value="">
                                Select Fuel Type
                            </option>

                            <option value="petrol"
                                {{ old('fuel_type', $car->fuel_type) == 'petrol' ? 'selected' : '' }}>
                                Petrol
                            </option>

                            <option value="diesel"
                                {{ old('fuel_type', $car->fuel_type) == 'diesel' ? 'selected' : '' }}>
                                Diesel
                            </option>

                            <option value="electric"
                                {{ old('fuel_type', $car->fuel_type) == 'electric' ? 'selected' : '' }}>
                                Electric
                            </option>

                            <option value="hybrid"
                                {{ old('fuel_type', $car->fuel_type) == 'hybrid' ? 'selected' : '' }}>
                                Hybrid
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
                           value="{{ old('location', $car->location) }}"
                           class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                           required>

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
                              class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                              required>{{ old('description', $car->description) }}</textarea>

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

                        <option value="available"
                            {{ old('status', $car->status) == 'available' ? 'selected' : '' }}>
                            Available
                        </option>

                        <option value="sold"
                            {{ old('status', $car->status) == 'sold' ? 'selected' : '' }}>
                            Sold
                        </option>

                    </select>

                </div>


                {{-- Buttons --}}
                <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-200">

                    <a href="{{ route('cars.show', $car->id) }}"
                       class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold transition">
                        Update Car
                    </button>

                </div>

            </form>

        </div>


        {{-- ====================================================== --}}
        {{-- EXISTING CAR IMAGES --}}
        {{-- ====================================================== --}}

        <div class="mt-8 bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

            <div class="p-6 border-b border-slate-200">

                <h2 class="text-xl font-bold text-slate-900">
                    Existing Images
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    You can delete images you no longer want.
                </p>

            </div>


            <div class="p-6">

                @if($car->images->count() > 0)

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                        @foreach($car->images as $image)

                            <div class="relative group rounded-xl overflow-hidden bg-slate-100">

                                <img src="{{ asset('storage/' . $image->image) }}"
                                     alt="{{ $car->title }}"
                                     class="w-full h-48 object-cover">


                                {{-- Delete Image --}}
                                <div class="absolute top-2 right-2">

                                    <form action="{{ route('car-images.destroy', $image->id) }}"
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


        {{-- ====================================================== --}}
        {{-- ADD MORE CAR IMAGES --}}
        {{-- ====================================================== --}}

        <div class="mt-8 bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

            <div class="p-6 border-b border-slate-200">

                <h2 class="text-xl font-bold text-slate-900">
                    Add More Images
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    You can select multiple images. Maximum size: 5MB per image.
                </p>

            </div>


            <form action="{{ route('car-images.store', $car->id) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="p-6">

                @csrf

                <div>

                    <label for="images"
                           class="block text-sm font-semibold text-slate-700 mb-2">
                        Car Images
                    </label>

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


                <div class="flex justify-end mt-5">

                    <button type="submit"
                            class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold transition">
                        Add Images
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>