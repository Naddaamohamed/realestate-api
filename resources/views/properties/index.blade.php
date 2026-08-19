<x-app-layout>

    <div class="min-h-screen bg-slate-50">

        <div class="flex">

            {{-- ================= SIDEBAR ================= --}}
            <aside class="flex w-64 min-h-screen bg-slate-900 text-white flex-col fixed left-0 top-0 z-50 overflow-visible">

                {{-- Logo --}}
                <div class="h-20 flex items-center px-7 border-b border-slate-800 shrink-0">

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


                {{-- ================= NAVIGATION ================= --}}
                <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

                    <p class="px-3 mb-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Main Menu
                    </p>


                    {{-- Properties --}}
                    <a href="{{ route('properties.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl bg-indigo-600 text-white">

                        <span class="text-lg">
                            🏠
                        </span>

                        <span class="font-medium">
                            Properties
                        </span>

                    </a>


                    {{-- Cars --}}
                    <a href="{{ route('cars.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

                        <span class="text-lg">
                            🚗
                        </span>

                        <span class="font-medium">
                            Cars
                        </span>

                    </a>


                    {{-- Favorites --}}
                    <a href="{{ route('favorites.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

                        <span class="text-lg">
                            ❤️
                        </span>

                        <span class="font-medium">
                            Favorites
                        </span>

                    </a>


                   

                    {{-- Account --}}
                    <p class="px-3 pt-8 mb-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Account
                    </p>


                    {{-- Settings --}}
                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

                        <span class="text-lg">
                            ⚙️
                        </span>

                        <span class="font-medium">
                            Settings
                        </span>

                    </a>

                </nav>


                {{-- ================= USER DROPDOWN ================= --}}
                <div class="p-4 border-t border-slate-800 shrink-0 relative">


                    {{-- ================= DROPDOWN MENU ================= --}}
                    {{-- 
                        bottom-full = تظهر فوق الزرار
                        left-4 right-4 = نفس عرض الزرار تقريباً
                        mb-2 = مسافة بسيطة بين القائمة والزرار
                        z-[100] = تظهر فوق باقي العناصر
                    --}}
                    <div id="userMenu"
                         class="hidden absolute bottom-full left-4 right-4 mb-2 z-[100] bg-slate-800 rounded-xl border border-slate-700 overflow-hidden shadow-2xl">


                        {{-- Edit Account --}}
                        <a href="{{ route('profile.edit') }}"
                           class="flex items-center gap-3 px-4 py-3 text-slate-300 hover:bg-slate-700 hover:text-white transition">

                            <span class="text-lg">
                                ⚙️
                            </span>

                            <span class="text-sm font-medium">
                                Edit Account
                            </span>

                        </a>


                        {{-- Logout --}}
                        <form method="POST"
                              action="{{ route('logout') }}">

                            @csrf

                            <button type="submit"
                                    class="w-full flex items-center gap-3 px-4 py-3 text-slate-300 hover:bg-red-500/10 hover:text-red-400 transition">

                                <span class="text-lg">
                                    🚪
                                </span>

                                <span class="text-sm font-medium">
                                    Logout
                                </span>

                            </button>

                        </form>

                    </div>


                    {{-- ================= USER BUTTON ================= --}}
                    <button type="button"
                            onclick="toggleUserMenu()"
                            class="w-full flex items-center gap-3 p-3 rounded-xl bg-slate-800 hover:bg-slate-700 transition">


                        {{-- Avatar --}}
                        <div class="w-10 h-10 shrink-0 rounded-full bg-indigo-500 flex items-center justify-center font-bold text-white">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>


                        {{-- Name & Email --}}
                        <div class="min-w-0 flex-1 text-left">

                            <p class="font-medium truncate text-white">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="text-xs text-slate-400 truncate">
                                {{ auth()->user()->email }}
                            </p>

                        </div>


                        {{-- Arrow --}}
                        <span id="userMenuArrow"
                              class="text-slate-400 text-lg transition-transform duration-200">

                            ⌄

                        </span>

                    </button>

                </div>

            </aside>


            {{-- ================= MAIN ================= --}}
            <main class="flex-1 lg:ml-64">


                {{-- ================= TOP NAVIGATION ================= --}}
                <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-5 sm:px-8">

                    <div>

                        <h2 class="text-xl font-bold text-slate-900">
                            Properties
                        </h2>

                        <p class="text-sm text-slate-500 mt-0.5">
                            Manage and explore your properties
                        </p>

                    </div>


                    <div class="flex items-center gap-4">


                        {{-- Search --}}
                        <div class="hidden md:flex items-center w-64 h-10 bg-slate-100 rounded-xl px-4">

                            <span class="text-slate-400 mr-2">
                                🔍
                            </span>

                            <input type="text"
                                   placeholder="Search properties..."
                                   class="w-full bg-transparent border-0 focus:ring-0 text-sm text-slate-700 placeholder-slate-400">

                        </div>


                        {{-- Avatar --}}
                        <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>

                    </div>

                </header>


                {{-- ================= CONTENT ================= --}}
                <div class="p-5 sm:p-8">


                    {{-- ================= STATS ================= --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">


                        {{-- Total --}}
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Total Properties
                                    </p>

                                    <h3 class="text-3xl font-bold text-slate-900 mt-2">
                                        {{ $properties->count() }}
                                    </h3>

                                </div>

                                <div class="w-11 h-11 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-xl">
                                    🏠
                                </div>

                            </div>

                            <p class="text-xs text-slate-400 mt-4">
                                All your listed properties
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
                                        {{ $properties->where('status', 'available')->count() }}
                                    </h3>

                                </div>

                                <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl">
                                    ✓
                                </div>

                            </div>

                            <p class="text-xs text-slate-400 mt-4">
                                Currently available
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
                                        {{ $properties->where('status', 'sold')->count() }}
                                    </h3>

                                </div>

                                <div class="w-11 h-11 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center text-xl">
                                    $
                                </div>

                            </div>

                            <p class="text-xs text-slate-400 mt-4">
                                Successfully sold
                            </p>

                        </div>


                        {{-- Rented --}}
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Rented
                                    </p>

                                    <h3 class="text-3xl font-bold text-slate-900 mt-2">
                                        {{ $properties->where('status', 'rented')->count() }}
                                    </h3>

                                </div>

                                <div class="w-11 h-11 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl">
                                    🔑
                                </div>

                            </div>

                            <p class="text-xs text-slate-400 mt-4">
                                Currently rented
                            </p>

                        </div>

                    </div>


                    {{-- ================= PAGE HEADER ================= --}}
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

                        <div>

                            <h2 class="text-2xl font-bold text-slate-900">
                                Property Listings
                            </h2>

                            <p class="text-sm text-slate-500 mt-1">
                                Discover and manage your real estate listings
                            </p>

                        </div>


                        <a href="{{ route('properties.create') }}"
                           class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold shadow-sm transition">

                            <span class="text-lg">
                                +
                            </span>

                            Add Property

                        </a>

                    </div>


                    {{-- ================= SUCCESS MESSAGE ================= --}}
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


                    {{-- ================= PROPERTY GRID ================= --}}
                    @if($properties->count())

                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                            @foreach($properties as $property)

                                <article class="group bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">


                                    {{-- ================= IMAGE ================= --}}
                                    <div class="relative h-56 bg-slate-100 overflow-hidden">

                                        @if($property->images->isNotEmpty())

                                            <img src="{{ asset('storage/' . $property->images->first()->image) }}"
                                                 alt="{{ $property->title }}"
                                                 class="w-full h-full object-cover transition duration-500 group-hover:scale-105">

                                        @else

                                            <div class="w-full h-full bg-gradient-to-br from-slate-700 via-slate-800 to-indigo-900 flex items-center justify-center">

                                                <div class="text-center text-white">

                                                    <div class="text-5xl mb-2">
                                                        🏢
                                                    </div>

                                                    <p class="text-sm font-medium text-white/70">
                                                        No Property Image
                                                    </p>

                                                </div>

                                            </div>

                                        @endif


                                        {{-- Purpose --}}
                                        <div class="absolute top-4 left-4">

                                            <span class="px-3 py-1.5 rounded-lg bg-white/90 backdrop-blur text-xs font-bold text-slate-800 shadow-sm">

                                                {{ ucfirst($property->purpose ?? 'Sale') }}

                                            </span>

                                        </div>


                                        {{-- Status --}}
                                        <div class="absolute top-4 right-4">

                                            @if($property->status === 'available')

                                                <span class="px-3 py-1.5 rounded-lg bg-emerald-500 text-white text-xs font-semibold shadow-sm">
                                                    Available
                                                </span>

                                            @elseif($property->status === 'sold')

                                                <span class="px-3 py-1.5 rounded-lg bg-red-500 text-white text-xs font-semibold shadow-sm">
                                                    Sold
                                                </span>

                                            @else

                                                <span class="px-3 py-1.5 rounded-lg bg-purple-500 text-white text-xs font-semibold shadow-sm">
                                                    {{ ucfirst($property->status) }}
                                                </span>

                                            @endif

                                        </div>


                                        {{-- ================= FAVORITE BUTTON ================= --}}
                                        @php

                                            $isFavorite = auth()->user()->favorites()
                                                ->where('favoritable_type', get_class($property))
                                                ->where('favoritable_id', $property->id)
                                                ->exists();

                                        @endphp


                                        <div class="absolute top-16 right-4 z-10">

                                            @if($isFavorite)

                                                {{-- Remove Favorite --}}
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
                                                            title="Remove from Favorites"
                                                            class="w-10 h-10 rounded-xl bg-red-500/95 hover:bg-red-600 text-white shadow-lg backdrop-blur transition flex items-center justify-center">

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
                                                           value="property">

                                                    <input type="hidden"
                                                           name="id"
                                                           value="{{ $property->id }}">


                                                    <button type="submit"
                                                            title="Add to Favorites"
                                                            class="w-10 h-10 rounded-xl bg-white/95 hover:bg-red-50 text-slate-500 hover:text-red-500 shadow-lg backdrop-blur transition flex items-center justify-center">

                                                        ♡

                                                    </button>

                                                </form>

                                            @endif

                                        </div>

                                    </div>


                                    {{-- ================= CARD BODY ================= --}}
                                    <div class="p-5">


                                        {{-- Type --}}
                                        <div class="flex items-center gap-2 mb-2">

                                            <span class="text-xs font-semibold uppercase tracking-wide text-indigo-600">
                                                {{ ucfirst($property->type) }}
                                            </span>

                                            <span class="text-slate-300">
                                                •
                                            </span>

                                            <span class="text-xs text-slate-500">
                                                {{ $property->area }} m²
                                            </span>

                                        </div>


                                        {{-- Title --}}
                                        <h3 class="text-xl font-bold text-slate-900 truncate">
                                            {{ $property->title }}
                                        </h3>


                                        {{-- Location --}}
                                        <p class="flex items-center gap-1.5 text-sm text-slate-500 mt-2">

                                            <span>
                                                📍
                                            </span>

                                            {{ $property->location }}

                                        </p>


                                        {{-- Description --}}
                                        <p class="text-sm text-slate-500 leading-6 mt-3 line-clamp-2 min-h-[48px]">
                                            {{ $property->description }}
                                        </p>


                                        {{-- Features --}}
                                        <div class="grid grid-cols-3 border-y border-slate-100 my-5 py-4">

                                            <div class="text-center">

                                                <p class="text-lg font-bold text-slate-900">
                                                    {{ $property->bedrooms }}
                                                </p>

                                                <p class="text-xs text-slate-400">
                                                    Beds
                                                </p>

                                            </div>


                                            <div class="text-center border-x border-slate-100">

                                                <p class="text-lg font-bold text-slate-900">
                                                    {{ $property->bathrooms }}
                                                </p>

                                                <p class="text-xs text-slate-400">
                                                    Baths
                                                </p>

                                            </div>


                                            <div class="text-center">

                                                <p class="text-lg font-bold text-slate-900">
                                                    {{ $property->area }}
                                                </p>

                                                <p class="text-xs text-slate-400">
                                                    m²
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
                                                    ${{ number_format($property->price, 0) }}
                                                </p>

                                            </div>

                                        </div>


                                        {{-- ================= ACTIONS ================= --}}
                                        <div class="flex gap-2">


                                            {{-- View Details --}}
                                            <a href="{{ route('properties.show', $property->id) }}"
                                               class="flex-1 inline-flex items-center justify-center px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold transition">

                                                View Details

                                            </a>


                                            {{-- Edit --}}
                                            @can('update', $property)

                                                <a href="{{ route('properties.edit', $property->id) }}"
                                                   class="inline-flex items-center justify-center px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold transition">

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

                        {{-- ================= EMPTY STATE ================= --}}
                        <div class="bg-white rounded-2xl border border-slate-200 p-16 text-center shadow-sm">

                            <div class="w-20 h-20 mx-auto rounded-2xl bg-indigo-50 flex items-center justify-center text-4xl mb-5">
                                🏠
                            </div>

                            <h3 class="text-2xl font-bold text-slate-900">
                                No properties yet
                            </h3>

                            <p class="text-slate-500 mt-2 mb-7">
                                Start building your property portfolio by adding your first listing.
                            </p>

                            <a href="{{ route('properties.create') }}"
                               class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition">

                                <span>
                                    +
                                </span>

                                Add Your First Property

                            </a>

                        </div>

                    @endif

                </div>

            </main>

        </div>

    </div>


    {{-- ================= USER DROPDOWN SCRIPT ================= --}}
    <script>

        function toggleUserMenu() {

            const menu = document.getElementById('userMenu');
            const arrow = document.getElementById('userMenuArrow');

            menu.classList.toggle('hidden');

            arrow.classList.toggle('rotate-180');

        }

    </script>

</x-app-layout>