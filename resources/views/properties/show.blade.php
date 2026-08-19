<x-app-layout>

    <div class="max-w-6xl mx-auto px-4 py-8">

        {{-- Back Button --}}
        <div class="mb-6">
            <a href="{{ route('properties.index') }}"
               class="inline-flex items-center text-sm font-semibold text-slate-600 hover:text-slate-900 transition">
                ← Back to Properties
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

        {{-- Property Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

            {{-- Header --}}
            <div class="p-6 border-b border-slate-200 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>
                    <span class="inline-block px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-xs font-semibold mb-3">
                        {{ $property->type ?? 'Property' }}
                    </span>

                    <h1 class="text-3xl font-bold text-slate-900">
                        {{ $property->title }}
                    </h1>

                    <p class="text-slate-500 mt-2">
                        📍 {{ $property->location }}
                    </p>
                </div>


                {{-- Actions --}}
                <div class="flex items-center gap-3 flex-wrap">

                    {{-- Favorite --}}
                    @php
                        $isFavorite = auth()->user()
                            ->favorites()
                            ->where('favoritable_type', get_class($property))
                            ->where('favoritable_id', $property->id)
                            ->exists();
                    @endphp

                    @if($isFavorite)

                        <form action="{{ route('favorites.destroy') }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <input type="hidden"
                                   name="type"
                                   value="property">

                            <input type="hidden"
                                   name="id"
                                   value="{{ $property->id }}">

                            <button type="submit"
                                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 text-sm font-semibold transition">
                                ❤️ Favorited
                            </button>

                        </form>

                    @else

                        <form action="{{ route('favorites.store') }}"
                              method="POST">

                            @csrf

                            <input type="hidden"
                                   name="type"
                                   value="property">

                            <input type="hidden"
                                   name="id"
                                   value="{{ $property->id }}">

                            <button type="submit"
                                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-pink-50 hover:bg-pink-100 text-pink-600 text-sm font-semibold transition">
                                ♡ Add to Favorites
                            </button>

                        </form>

                    @endif


                    {{-- Edit --}}
                    @can('update', $property)

                        <a href="{{ route('properties.edit', $property->id) }}"
                           class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold transition">
                            Edit
                        </a>

                    @endcan


                    {{-- Delete --}}
                    @can('delete', $property)

                        <form action="{{ route('properties.destroy', $property->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this property?');">

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


            {{-- Property Images --}}
            @if($property->images->count() > 0)

                <div class="p-6 border-b border-slate-200">

                    <h2 class="text-xl font-bold text-slate-900 mb-4">
                        Property Images
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                        @foreach($property->images as $image)

                            <div class="overflow-hidden rounded-2xl bg-slate-100">

                                <img src="{{ asset('storage/' . $image->image) }}"
                                     alt="{{ $property->title }}"
                                     class="w-full h-64 object-cover hover:scale-105 transition duration-300">

                            </div>

                        @endforeach

                    </div>

                </div>

            @else

                <div class="p-6 border-b border-slate-200">

                    <p class="text-sm text-slate-500">
                        No images available for this property.
                    </p>

                </div>

            @endif


            {{-- Property Details --}}
            <div class="p-6">

                {{-- Description --}}
                <div class="mb-8">

                    <h2 class="text-xl font-bold text-slate-900 mb-3">
                        Description
                    </h2>

                    <p class="text-slate-600 leading-7">
                        {{ $property->description }}
                    </p>

                </div>


                {{-- Property Information --}}
                <div>

                    <h2 class="text-xl font-bold text-slate-900 mb-4">
                        Property Information
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                        {{-- Price --}}
                        <div class="bg-slate-50 rounded-xl p-4">

                            <p class="text-sm text-slate-500">
                                Price
                            </p>

                            <p class="text-lg font-bold text-slate-900 mt-1">
                                ${{ number_format($property->price) }}
                            </p>

                        </div>


                        {{-- Bedrooms --}}
                        <div class="bg-slate-50 rounded-xl p-4">

                            <p class="text-sm text-slate-500">
                                Bedrooms
                            </p>

                            <p class="text-lg font-bold text-slate-900 mt-1">
                                {{ $property->bedrooms ?? 0 }}
                            </p>

                        </div>


                        {{-- Bathrooms --}}
                        <div class="bg-slate-50 rounded-xl p-4">

                            <p class="text-sm text-slate-500">
                                Bathrooms
                            </p>

                            <p class="text-lg font-bold text-slate-900 mt-1">
                                {{ $property->bathrooms ?? 0 }}
                            </p>

                        </div>


                        {{-- Area --}}
                        <div class="bg-slate-50 rounded-xl p-4">

                            <p class="text-sm text-slate-500">
                                Area
                            </p>

                            <p class="text-lg font-bold text-slate-900 mt-1">
                                {{ $property->area ?? 0 }} m²
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

                        {{-- Property Type --}}
                        <div>

                            <span class="text-sm text-slate-500">
                                Property Type
                            </span>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $property->type ?? 'N/A' }}
                            </p>

                        </div>


                        {{-- Location --}}
                        <div>

                            <span class="text-sm text-slate-500">
                                Location
                            </span>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $property->location ?? 'N/A' }}
                            </p>

                        </div>


                        {{-- Listed On --}}
                        <div>

                            <span class="text-sm text-slate-500">
                                Listed On
                            </span>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $property->created_at?->format('M d, Y') }}
                            </p>

                        </div>


                        {{-- Last Updated --}}
                        <div>

                            <span class="text-sm text-slate-500">
                                Last Updated
                            </span>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $property->updated_at?->format('M d, Y') }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ================= CONTACT SELLER ================= --}}
                @if($property->contact)

                    <div class="mt-8 pt-8 border-t border-slate-200">

                        <h2 class="text-xl font-bold text-slate-900 mb-2">
                            Contact Seller
                        </h2>

                        <p class="text-sm text-slate-500 mb-5">
                            Interested in this property? Contact the seller using the information below.
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
                                        {{ $property->contact }}
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