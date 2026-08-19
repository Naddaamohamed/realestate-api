<x-app-layout>

    <div class="max-w-6xl mx-auto px-4 py-8">

        {{-- Back Button --}}
        <div class="mb-6">
            <a href="{{ route('cars.index') }}"
               class="inline-flex items-center text-sm font-semibold text-slate-600 hover:text-slate-900 transition">
                ← Back to Cars
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl bg-green-50 border border-green-200 p-4">
                <p class="text-sm font-semibold text-green-800">
                    {{ session('success') }}
                </p>
            </div>
        @endif

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

        {{-- Car Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

            {{-- Header --}}
            <div class="p-6 border-b border-slate-200 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-3">

                        <span class="inline-block px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-xs font-semibold">
                            @if($car->purpose === 'sale')
                                For Sale
                            @elseif($car->purpose === 'rent')
                                For Rent
                            @else
                                {{ ucfirst($car->purpose ?? 'N/A') }}
                            @endif
                        </span>

                        @if($car->status === 'available')
                            <span class="inline-block px-3 py-1 rounded-full bg-emerald-50 text-emerald-600 text-xs font-semibold">
                                Available
                            </span>
                        @elseif($car->status === 'sold')
                            <span class="inline-block px-3 py-1 rounded-full bg-red-50 text-red-600 text-xs font-semibold">
                                Sold
                            </span>
                        @elseif($car->status === 'rented')
                            <span class="inline-block px-3 py-1 rounded-full bg-purple-50 text-purple-600 text-xs font-semibold">
                                Rented
                            </span>
                        @else
                            <span class="inline-block px-3 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold">
                                {{ ucfirst($car->status ?? 'N/A') }}
                            </span>
                        @endif

                    </div>

                    <h1 class="text-3xl font-bold text-slate-900">
                        {{ $car->title }}
                    </h1>

                    <p class="text-slate-500 mt-2">
                        📍 {{ $car->location }}
                    </p>
                </div>


                {{-- Actions --}}
                <div class="flex items-center gap-3 flex-wrap">

                    {{-- Favorite --}}
                    @php
                        $isFavorite = auth()->user()
                            ->favorites()
                            ->where('favoritable_type', get_class($car))
                            ->where('favoritable_id', $car->id)
                            ->exists();
                    @endphp

                    @if($isFavorite)

                        <form action="{{ route('favorites.destroy') }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="type" value="car">
                            <input type="hidden" name="id" value="{{ $car->id }}">

                            <button type="submit"
                                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 text-sm font-semibold transition">
                                ❤️ Favorited
                            </button>

                        </form>

                    @else

                        <form action="{{ route('favorites.store') }}"
                              method="POST">

                            @csrf

                            <input type="hidden" name="type" value="car">
                            <input type="hidden" name="id" value="{{ $car->id }}">

                            <button type="submit"
                                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-pink-50 hover:bg-pink-100 text-pink-600 text-sm font-semibold transition">
                                ♡ Add to Favorites
                            </button>

                        </form>

                    @endif


                    {{-- Edit --}}
                    @can('update', $car)

                        <a href="{{ route('cars.edit', $car->id) }}"
                           class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold transition">
                            Edit
                        </a>

                    @endcan


                    {{-- Delete --}}
                    @can('delete', $car)

                        <form action="{{ route('cars.destroy', $car->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this car?');">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 text-sm font-semibold transition">
                                🗑 Delete
                            </button>

                        </form>

                    @endcan

                </div>

            </div>


            {{-- Car Images --}}
            @if($car->images->count() > 0)

                <div class="p-6 border-b border-slate-200">

                    <h2 class="text-xl font-bold text-slate-900 mb-4">
                        Car Images
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                        @foreach($car->images as $image)

                            <div class="overflow-hidden rounded-2xl bg-slate-100">

                                <img src="{{ asset('storage/' . $image->image) }}"
                                     alt="{{ $car->title }}"
                                     class="w-full h-64 object-cover hover:scale-105 transition duration-300">

                            </div>

                        @endforeach

                    </div>

                </div>

            @else

                <div class="p-6 border-b border-slate-200">

                    <p class="text-sm text-slate-500">
                        No images available for this car.
                    </p>

                </div>

            @endif


            {{-- Car Details --}}
            <div class="p-6">

                {{-- Description --}}
                <div class="mb-8">

                    <h2 class="text-xl font-bold text-slate-900 mb-3">
                        Description
                    </h2>

                    <p class="text-slate-600 leading-7">
                        {{ $car->description }}
                    </p>

                </div>


                {{-- Key Information --}}
                <div class="mb-8">

                    <h2 class="text-xl font-bold text-slate-900 mb-4">
                        Car Information
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                        {{-- Price --}}
                        <div class="bg-slate-50 rounded-xl p-4">
                            <p class="text-sm text-slate-500">Price</p>
                            <p class="text-lg font-bold text-slate-900 mt-1">
                                ${{ number_format($car->price, 0) }}
                            </p>
                        </div>

                        {{-- Mileage --}}
                        <div class="bg-slate-50 rounded-xl p-4">
                            <p class="text-sm text-slate-500">Mileage</p>
                            <p class="text-lg font-bold text-slate-900 mt-1">
                                {{ number_format($car->mileage ?? 0) }} km
                            </p>
                        </div>

                        {{-- Transmission --}}
                        <div class="bg-slate-50 rounded-xl p-4">
                            <p class="text-sm text-slate-500">Transmission</p>
                            <p class="text-lg font-bold text-slate-900 mt-1">
                                {{ ucfirst($car->transmission ?? 'N/A') }}
                            </p>
                        </div>

                        {{-- Fuel --}}
                        <div class="bg-slate-50 rounded-xl p-4">
                            <p class="text-sm text-slate-500">Fuel</p>
                            <p class="text-lg font-bold text-slate-900 mt-1">
                                {{ ucfirst($car->fuel_type ?? 'N/A') }}
                            </p>
                        </div>

                    </div>

                </div>


                {{-- Car Specifications --}}
                <div>

                    <h2 class="text-xl font-bold text-slate-900 mb-4">
                        Car Specifications
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                        {{-- Brand --}}
                        <div class="bg-slate-50 rounded-xl p-4">
                            <p class="text-sm text-slate-500">Brand</p>
                            <p class="text-lg font-bold text-slate-900 mt-1">
                                {{ $car->brand }}
                            </p>
                        </div>

                        {{-- Model --}}
                        <div class="bg-slate-50 rounded-xl p-4">
                            <p class="text-sm text-slate-500">Model</p>
                            <p class="text-lg font-bold text-slate-900 mt-1">
                                {{ $car->model }}
                            </p>
                        </div>

                        {{-- Year --}}
                        <div class="bg-slate-50 rounded-xl p-4">
                            <p class="text-sm text-slate-500">Year</p>
                            <p class="text-lg font-bold text-slate-900 mt-1">
                                {{ $car->year }}
                            </p>
                        </div>

                        {{-- Body Type --}}
                        <div class="bg-slate-50 rounded-xl p-4">
                            <p class="text-sm text-slate-500">Body Type</p>
                            <p class="text-lg font-bold text-slate-900 mt-1">
                                {{ ucfirst($car->body_type ?? 'N/A') }}
                            </p>
                        </div>

                        {{-- Color --}}
                        <div class="bg-slate-50 rounded-xl p-4">
                            <p class="text-sm text-slate-500">Color</p>
                            <p class="text-lg font-bold text-slate-900 mt-1">
                                {{ ucfirst($car->color ?? 'N/A') }}
                            </p>
                        </div>

                    </div>

                </div>


                {{-- Additional Information --}}
                <div class="mt-8 pt-8 border-t border-slate-200">

                    <h2 class="text-xl font-bold text-slate-900 mb-4">
                        Additional Information
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        {{-- Purpose --}}
                        <div>
                            <span class="text-sm text-slate-500">Purpose</span>
                            <p class="font-semibold text-slate-800 mt-1">
                                {{ ucfirst($car->purpose ?? 'N/A') }}
                            </p>
                        </div>

                        {{-- Status --}}
                        <div>
                            <span class="text-sm text-slate-500">Status</span>
                            <p class="font-semibold text-slate-800 mt-1">
                                {{ ucfirst($car->status ?? 'N/A') }}
                            </p>
                        </div>

                        {{-- Location --}}
                        <div>
                            <span class="text-sm text-slate-500">Location</span>
                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $car->location ?? 'N/A' }}
                            </p>
                        </div>

                        {{-- Listed On --}}
                        <div>
                            <span class="text-sm text-slate-500">Listed On</span>
                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $car->created_at?->format('M d, Y') }}
                            </p>
                        </div>

                        {{-- Last Updated --}}
                        <div>
                            <span class="text-sm text-slate-500">Last Updated</span>
                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $car->updated_at?->format('M d, Y') }}
                            </p>
                        </div>

                        {{-- Seller --}}
                        <div>
                            <span class="text-sm text-slate-500">Seller</span>
                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $car->user->name }} ({{ $car->user->email }})
                            </p>
                        </div>

                    </div>

                </div>


                {{-- ================= CONTACT SELLER ================= --}}
                @if(!empty($car->contact))

                    <div class="mt-8 pt-8 border-t border-slate-200">

                        <h2 class="text-xl font-bold text-slate-900 mb-2">
                            Contact Seller
                        </h2>

                        <p class="text-sm text-slate-500 mb-5">
                            Interested in this car? Contact the seller using the information below.
                        </p>

                        <div class="rounded-2xl bg-indigo-50 border border-indigo-100 p-5">

                            <div class="flex items-start gap-4">

                                <div class="w-12 h-12 rounded-xl bg-indigo-600 text-white flex items-center justify-center text-xl">
                                    📞
                                </div>

                                <div>

                                    <p class="text-sm font-medium text-slate-500">
                                        Seller Contact Information
                                    </p>

                                    <p class="text-lg font-bold text-slate-900 mt-1 break-all">
                                        {{ $car->contact }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>