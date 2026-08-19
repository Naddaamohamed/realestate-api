<x-app-layout>

    <div class="min-h-screen bg-slate-50">

        <div class="flex">

            {{-- ================= SIDEBAR ================= --}}
            <aside class="hidden lg:flex w-64 min-h-screen bg-slate-900 text-white flex-col fixed left-0 top-0">

                {{-- Logo --}}
                <div class="h-20 flex items-center px-7 border-b border-slate-800">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center">
                            <span class="text-xl">🏠</span>
                        </div>

                        <div>
                            <h1 class="font-bold text-lg tracking-tight">
                                EstateHub
                            </h1>

                            <p class="text-xs text-slate-400">
                                Real Estate Platform
                            </p>
                        </div>

                    </div>

                </div>


                {{-- Navigation --}}
                <nav class="flex-1 px-4 py-6 space-y-2">

                    <p class="px-3 mb-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Main Menu
                    </p>


                    {{-- Properties --}}
                    <a href="{{ route('properties.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

                        <span class="text-lg">🏠</span>

                        <span class="font-medium">
                            Properties
                        </span>

                    </a>


                    {{-- Cars --}}
                    <a href="{{ route('cars.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl bg-indigo-600 text-white">

                        <span class="text-lg">🚗</span>

                        <span class="font-medium">
                            Cars
                        </span>

                    </a>


                    {{-- Favorites --}}
                    <a href="{{ route('favorites.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

                        <span class="text-lg">❤️</span>

                        <span>
                            Favorites
                        </span>

                    </a>



                    <p class="px-3 pt-8 mb-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Account
                    </p>


                    {{-- Settings --}}
                    <a href="#"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

                        <span class="text-lg">⚙️</span>

                        <span>
                            Settings
                        </span>

                    </a>

                </nav>


                {{-- User --}}
                <div class="p-4 border-t border-slate-800">

                    <div class="flex items-center gap-3 p-3 rounded-xl bg-slate-800">

                        <div class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center font-bold">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>

                        <div class="min-w-0">

                            <p class="font-medium truncate">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="text-xs text-slate-400 truncate">
                                {{ auth()->user()->email }}
                            </p>

                        </div>

                    </div>

                </div>

            </aside>


            {{-- ================= MAIN ================= --}}
            <main class="flex-1 lg:ml-64">

                {{-- Header --}}
                <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-5 sm:px-8">

                    <div>

                        <h2 class="text-xl font-bold text-slate-900">
                            Cars
                        </h2>

                        <p class="text-sm text-slate-500 mt-0.5">
                            Manage and explore your vehicles
                        </p>

                    </div>


                    <div class="flex items-center gap-4">

                        {{-- Search --}}
                        <div class="hidden md:flex items-center w-64 h-10 bg-slate-100 rounded-xl px-4">

                            <span class="text-slate-400 mr-2">
                                🔍
                            </span>

                            <input type="text"
                                   placeholder="Search cars..."
                                   class="w-full bg-transparent border-0 focus:ring-0 text-sm text-slate-700 placeholder-slate-400">

                        </div>



                        {{-- Avatar --}}
                        <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>

                    </div>

                </header>


                {{-- Content --}}
                <div class="p-5 sm:p-8">


                    {{-- ================= STATS ================= --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">


                        {{-- Total Cars --}}
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Total Cars
                                    </p>

                                    <h3 class="text-3xl font-bold text-slate-900 mt-2">
                                        {{ $cars->count() }}
                                    </h3>

                                </div>

                                <div class="w-11 h-11 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-xl">
                                    🚗
                                </div>

                            </div>

                            <p class="text-xs text-slate-400 mt-4">
                                All listed vehicles
                            </p>

                        </div>


                        {{-- Available --}}
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Available
                                    </p>

                                    <h3 class="text-3xl font-bold text-slate-900 mt-2">
                                        {{ $cars->where('status', 'available')->count() }}
                                    </h3>

                                </div>

                                <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl">
                                    ✓
                                </div>

                            </div>

                            <p class="text-xs text-slate-400 mt-4">
                                Cars currently available
                            </p>

                        </div>


                        {{-- Sold --}}
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Sold
                                    </p>

                                    <h3 class="text-3xl font-bold text-slate-900 mt-2">
                                        {{ $cars->where('status', 'sold')->count() }}
                                    </h3>

                                </div>

                                <div class="w-11 h-11 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-xl">
                                    $
                                </div>

                            </div>

                            <p class="text-xs text-slate-400 mt-4">
                                Successfully sold
                            </p>

                        </div>


                        {{-- Brands --}}
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Brands
                                    </p>

                                    <h3 class="text-3xl font-bold text-slate-900 mt-2">
                                        {{ $cars->pluck('brand')->unique()->count() }}
                                    </h3>

                                </div>

                                <div class="w-11 h-11 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl">
                                    🏷️
                                </div>

                            </div>

                            <p class="text-xs text-slate-400 mt-4">
                                Different car brands
                            </p>

                        </div>

                    </div>


                    {{-- ================= PAGE HEADER ================= --}}
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

                        <div>

                            <h2 class="text-2xl font-bold text-slate-900">
                                Car Listings
                            </h2>

                            <p class="text-sm text-slate-500 mt-1">
                                Discover and manage your vehicle listings
                            </p>

                        </div>


                        <a href="{{ route('cars.create') }}"
                           class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold shadow-sm transition">

                            <span class="text-lg">
                                +
                            </span>

                            Add Car

                        </a>

                    </div>


                    {{-- Success Message --}}
                    @if(session('success'))

                        <div class="mb-6 flex items-center gap-3 rounded-xl bg-emerald-50 border border-emerald-200 px-5 py-4 text-emerald-700">

                            <span class="text-lg">
                                ✓
                            </span>

                            <span class="font-medium">
                                {{ session('success') }}
                            </span>

                        </div>

                    @endif


                    {{-- ================= CAR GRID ================= --}}
                    @if($cars->count())

                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                            @foreach($cars as $car)

                                <article class="group bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">


                                    {{-- ================= CAR IMAGE ================= --}}
                                    <div class="relative h-56 bg-slate-200 overflow-hidden">

                                        @if($car->images->count())

                                            <img src="{{ asset('storage/' . $car->images->first()->image) }}"
                                                 alt="{{ $car->title }}"
                                                 class="w-full h-full object-cover transition duration-500 group-hover:scale-105">

                                        @else

                                            <div class="w-full h-full bg-gradient-to-br from-slate-700 via-slate-800 to-indigo-900 flex items-center justify-center">

                                                <div class="text-center text-white">

                                                    <div class="text-5xl mb-2">
                                                        🚗
                                                    </div>

                                                    <p class="text-sm font-medium text-white/70">
                                                        No Car Image
                                                    </p>

                                                </div>

                                            </div>

                                        @endif


                                        {{-- Brand --}}
                                        <div class="absolute top-4 left-4">

                                            <span class="px-3 py-1.5 rounded-lg bg-white/90 backdrop-blur text-xs font-bold text-slate-800 shadow-sm">

                                                {{ $car->brand }}

                                            </span>

                                        </div>


                                        {{-- ================= FAVORITE BUTTON ================= --}}
                                        <div class="absolute top-4 right-4 z-20">

                                            @php
                                                $isFavorite = \App\Models\Favorite::where('user_id', auth()->id())
                                                    ->where('favoritable_type', \App\Models\Car::class)
                                                    ->where('favoritable_id', $car->id)
                                                    ->exists();
                                            @endphp


                                            @if($isFavorite)

                                                {{-- Remove Favorite --}}
                                                <form action="{{ route('favorites.destroy') }}"
                                                      method="POST">

                                                    @csrf
                                                    @method('DELETE')

                                                    <input type="hidden"
                                                           name="type"
                                                           value="car">

                                                    <input type="hidden"
                                                           name="id"
                                                           value="{{ $car->id }}">

                                                    <button type="submit"
                                                            title="Remove from favorites"
                                                            class="w-11 h-11 rounded-full bg-white/95 backdrop-blur shadow-lg flex items-center justify-center text-xl text-red-500 hover:bg-red-50 hover:scale-110 transition">

                                                        ❤️

                                                    </button>

                                                </form>

                                            @else

                                                {{-- Add Favorite --}}
                                                <form action="{{ route('favorites.store') }}"
                                                      method="POST">

                                                    @csrf

                                                    <input type="hidden"
                                                           name="type"
                                                           value="car">

                                                    <input type="hidden"
                                                           name="id"
                                                           value="{{ $car->id }}">

                                                    <button type="submit"
                                                            title="Add to favorites"
                                                            class="w-11 h-11 rounded-full bg-white/95 backdrop-blur shadow-lg flex items-center justify-center text-xl text-slate-400 hover:text-red-500 hover:bg-red-50 hover:scale-110 transition">

                                                        ♡

                                                    </button>

                                                </form>

                                            @endif

                                        </div>


                                        {{-- Status --}}
                                        <div class="absolute top-20 right-4">

                                            @if($car->status === 'available')

                                                <span class="px-3 py-1.5 rounded-lg bg-emerald-500 text-white text-xs font-semibold shadow-sm">
                                                    Available
                                                </span>

                                            @elseif($car->status === 'sold')

                                                <span class="px-3 py-1.5 rounded-lg bg-red-500 text-white text-xs font-semibold shadow-sm">
                                                    Sold
                                                </span>

                                            @else

                                                <span class="px-3 py-1.5 rounded-lg bg-purple-500 text-white text-xs font-semibold shadow-sm">
                                                    {{ ucfirst($car->status) }}
                                                </span>

                                            @endif

                                        </div>

                                    </div>


                                    {{-- ================= CARD BODY ================= --}}
                                    <div class="p-5">


                                        {{-- Brand & Year --}}
                                        <div class="flex items-center gap-2 mb-2">

                                            <span class="text-xs font-semibold uppercase tracking-wide text-indigo-600">
                                                {{ $car->brand }}
                                            </span>

                                            <span class="text-slate-300">
                                                •
                                            </span>

                                            <span class="text-xs text-slate-500">
                                                {{ $car->year }}
                                            </span>

                                        </div>


                                        {{-- Title --}}
                                        <h3 class="text-xl font-bold text-slate-900 truncate">
                                            {{ $car->title }}
                                        </h3>


                                        {{-- Model --}}
                                        <p class="text-sm text-slate-500 mt-2">
                                            {{ $car->model }}
                                        </p>


                                        {{-- Location --}}
                                        <p class="flex items-center gap-1.5 text-sm text-slate-500 mt-2">

                                            <span>
                                                📍
                                            </span>

                                            {{ $car->location }}

                                        </p>


                                        {{-- Description --}}
                                        <p class="text-sm text-slate-500 leading-6 mt-3 line-clamp-2 min-h-[48px]">

                                            {{ $car->description }}

                                        </p>


                                        {{-- Features --}}
                                        <div class="grid grid-cols-3 border-y border-slate-100 my-5 py-4">


                                            {{-- Mileage --}}
                                            <div class="text-center">

                                                <p class="text-lg font-bold text-slate-900">
                                                    {{ number_format($car->mileage) }}
                                                </p>

                                                <p class="text-xs text-slate-400">
                                                    KM
                                                </p>

                                            </div>


                                            {{-- Transmission --}}
                                            <div class="text-center border-x border-slate-100">

                                                <p class="text-sm font-bold text-slate-900 capitalize">
                                                    {{ $car->transmission }}
                                                </p>

                                                <p class="text-xs text-slate-400">
                                                    Transmission
                                                </p>

                                            </div>


                                            {{-- Fuel --}}
                                            <div class="text-center">

                                                <p class="text-sm font-bold text-slate-900 capitalize">
                                                    {{ $car->fuel_type }}
                                                </p>

                                                <p class="text-xs text-slate-400">
                                                    Fuel
                                                </p>

                                            </div>

                                        </div>


                                        {{-- Price --}}
                                        <div class="flex items-end justify-between mb-5">

                                            <div>

                                                <p class="text-xs text-slate-400 uppercase tracking-wide">
                                                    Price
                                                </p>

                                                <p class="text-2xl font-bold text-slate-900 mt-1">
                                                    ${{ number_format($car->price, 0) }}
                                                </p>

                                            </div>

                                        </div>


                                        {{-- Actions --}}
                                        <div class="flex gap-2">


                                            {{-- View --}}
                                            <a href="{{ route('cars.show', $car->id) }}"
                                               class="flex-1 inline-flex items-center justify-center px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold transition">

                                                View Details

                                            </a>


                                            {{-- Edit --}}
                                            @can('update', $car)

                                                <a href="{{ route('cars.edit', $car->id) }}"
                                                   class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold transition">

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
                                                            class="w-10 h-10 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 transition">

                                                        🗑

                                                    </button>

                                                </form>

                                            @endcan


                                        </div>

                                    </div>

                                </article>

                            @endforeach

                        </div>


                    @else

                        {{-- Empty State --}}
                        <div class="bg-white rounded-2xl border border-slate-200 p-16 text-center shadow-sm">

                            <div class="w-20 h-20 mx-auto rounded-2xl bg-indigo-50 flex items-center justify-center text-4xl mb-5">
                                🚗
                            </div>

                            <h3 class="text-2xl font-bold text-slate-900">
                                No cars yet
                            </h3>

                            <p class="text-slate-500 mt-2 mb-7">
                                Start building your vehicle inventory by adding your first car.
                            </p>

                            <a href="{{ route('cars.create') }}"
                               class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition">

                                <span>
                                    +
                                </span>

                                Add Your First Car

                            </a>

                        </div>

                    @endif

                </div>

            </main>

        </div>

    </div>

</x-app-layout>