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
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-300 hover:bg-slate-800 transition">

                        <span class="text-lg">🚗</span>

                        <span class="font-medium">
                            Cars
                        </span>

                    </a>


                    {{-- Favorites --}}
                    <a href="{{ route('favorites.index') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl bg-indigo-600 text-white">

                        <span class="text-lg">❤️</span>

                        <span>
                            Favorites
                        </span>

                    </a>



                    <p class="px-3 pt-8 mb-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Account
                    </p>


                    {{-- Settings --}}
                    <a href="{{ route('profile.edit') }}"
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
                            Favorites
                        </h2>

                        <p class="text-sm text-slate-500 mt-0.5">
                            Properties and cars you have saved
                        </p>

                    </div>


                    <div class="flex items-center gap-4">

                        {{-- Search --}}
                        <div class="hidden md:flex items-center w-64 h-10 bg-slate-100 rounded-xl px-4">

                            <span class="text-slate-400 mr-2">
                                🔍
                            </span>

                            <input type="text"
                                   placeholder="Search favorites..."
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
                    @php
                        $propertyCount = $favorites->filter(fn($f) => $f->favoritable instanceof \App\Models\Property)->count();
                        $carCount = $favorites->filter(fn($f) => $f->favoritable instanceof \App\Models\Car)->count();
                    @endphp

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">


                        {{-- Total Favorites --}}
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Total Favorites
                                    </p>

                                    <h3 class="text-3xl font-bold text-slate-900 mt-2">
                                        {{ $favorites->count() }}
                                    </h3>

                                </div>

                                <div class="w-11 h-11 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-xl">
                                    ❤️
                                </div>

                            </div>

                            <p class="text-xs text-slate-400 mt-4">
                                Everything you've saved
                            </p>

                        </div>


                        {{-- Properties --}}
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Properties
                                    </p>

                                    <h3 class="text-3xl font-bold text-slate-900 mt-2">
                                        {{ $propertyCount }}
                                    </h3>

                                </div>

                                <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl">
                                    🏠
                                </div>

                            </div>

                            <p class="text-xs text-slate-400 mt-4">
                                Saved properties
                            </p>

                        </div>


                        {{-- Cars --}}
                        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">

                            <div class="flex items-start justify-between">

                                <div>

                                    <p class="text-sm text-slate-500">
                                        Cars
                                    </p>

                                    <h3 class="text-3xl font-bold text-slate-900 mt-2">
                                        {{ $carCount }}
                                    </h3>

                                </div>

                                <div class="w-11 h-11 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-xl">
                                    🚗
                                </div>

                            </div>

                            <p class="text-xs text-slate-400 mt-4">
                                Saved cars
                            </p>

                        </div>

                    </div>


                    {{-- ================= PAGE HEADER ================= --}}
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

                        <div>

                            <h2 class="text-2xl font-bold text-slate-900">
                                My Favorites
                            </h2>

                            <p class="text-sm text-slate-500 mt-1">
                                Properties and cars you have saved
                            </p>

                        </div>

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


                    {{-- ================= FAVORITES GRID ================= --}}
                    @if($favorites->count() > 0)

                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                            @foreach($favorites as $favorite)

                                @php
                                    $item = $favorite->favoritable;
                                    $isCar = $item instanceof \App\Models\Car;
                                @endphp

                                {{-- Make sure the item still exists --}}
                                @if($item)

                                    <article class="group bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300">


                                        {{-- ================= IMAGE ================= --}}
                                        <div class="relative h-56 bg-slate-200 overflow-hidden">

                                            @if($item->images->count())

                                                <img src="{{ asset('storage/' . $item->images->first()->image) }}"
                                                     alt="{{ $item->title }}"
                                                     class="w-full h-full object-cover transition duration-500 group-hover:scale-105">

                                            @else

                                                <div class="w-full h-full bg-gradient-to-br from-slate-700 via-slate-800 to-indigo-900 flex items-center justify-center">

                                                    <div class="text-center text-white">

                                                        <div class="text-5xl mb-2">
                                                            {{ $isCar ? '🚗' : '🏠' }}
                                                        </div>

                                                        <p class="text-sm font-medium text-white/70">
                                                            {{ $isCar ? 'No Car Image' : 'No Property Image' }}
                                                        </p>

                                                    </div>

                                                </div>

                                            @endif


                                            {{-- Type Badge --}}
                                            <div class="absolute top-4 left-4">

                                                <span class="px-3 py-1.5 rounded-lg bg-white/90 backdrop-blur text-xs font-bold text-slate-800 shadow-sm">

                                                    {{ $isCar ? $item->brand : ucfirst($item->type) }}

                                                </span>

                                            </div>


                                            {{-- ================= REMOVE FAVORITE BUTTON ================= --}}
                                            <div class="absolute top-4 right-4 z-20">

                                                <form action="{{ route('favorites.destroy') }}"
                                                      method="POST">

                                                    @csrf
                                                    @method('DELETE')

                                                    <input type="hidden"
                                                           name="type"
                                                           value="{{ $isCar ? 'car' : 'property' }}">

                                                    <input type="hidden"
                                                           name="id"
                                                           value="{{ $item->id }}">

                                                    <button type="submit"
                                                            title="Remove from favorites"
                                                            class="w-11 h-11 rounded-full bg-white/95 backdrop-blur shadow-lg flex items-center justify-center text-xl text-red-500 hover:bg-red-50 hover:scale-110 transition">

                                                        ❤️

                                                    </button>

                                                </form>

                                            </div>

                                        </div>


                                        {{-- ================= CARD BODY ================= --}}
                                        <div class="p-5">


                                            {{-- Type Label --}}
                                            <div class="flex items-center gap-2 mb-2">

                                                <span class="text-xs font-semibold uppercase tracking-wide {{ $isCar ? 'text-indigo-600' : 'text-blue-600' }}">
                                                    {{ $isCar ? 'Car' : 'Property' }}
                                                </span>

                                            </div>


                                            {{-- Title --}}
                                            <h3 class="text-xl font-bold text-slate-900 truncate">
                                                {{ $item->title }}
                                            </h3>


                                            {{-- ================= CAR DETAILS ================= --}}
                                            @if($isCar)

                                                <p class="text-sm text-slate-500 mt-2">
                                                    {{ $item->brand }} • {{ $item->model }} • {{ $item->year }}
                                                </p>

                                                <p class="flex items-center gap-1.5 text-sm text-slate-500 mt-2">
                                                    <span>📍</span>
                                                    {{ $item->location }}
                                                </p>

                                            {{-- ================= PROPERTY DETAILS ================= --}}
                                            @else

                                                <p class="flex items-center gap-1.5 text-sm text-slate-500 mt-2">
                                                    <span>📍</span>
                                                    {{ $item->location }}
                                                </p>

                                                <p class="text-sm text-slate-500 mt-1">
                                                    {{ ucfirst($item->type) }}
                                                </p>

                                            @endif


                                            {{-- Price --}}
                                            <div class="flex items-end justify-between mt-5 mb-5">

                                                <div>

                                                    <p class="text-xs text-slate-400 uppercase tracking-wide">
                                                        Price
                                                    </p>

                                                    <p class="text-2xl font-bold text-slate-900 mt-1">
                                                        ${{ number_format($item->price, 0) }}
                                                    </p>

                                                </div>

                                            </div>


                                            {{-- Action --}}
                                            @if($isCar)

                                                <a href="{{ route('cars.show', $item->id) }}"
                                                   class="w-full inline-flex items-center justify-center px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold transition">

                                                    View Car

                                                </a>

                                            @else

                                                <a href="{{ route('properties.show', $item->id) }}"
                                                   class="w-full inline-flex items-center justify-center px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold transition">

                                                    View Property

                                                </a>

                                            @endif

                                        </div>

                                    </article>

                                @endif

                            @endforeach

                        </div>


                    @else

                        {{-- ================= EMPTY STATE ================= --}}
                        <div class="bg-white rounded-2xl border border-slate-200 p-16 text-center shadow-sm">

                            <div class="w-20 h-20 mx-auto rounded-2xl bg-red-50 flex items-center justify-center text-4xl mb-5">
                                ♡
                            </div>

                            <h3 class="text-2xl font-bold text-slate-900">
                                No Favorites Yet
                            </h3>

                            <p class="text-slate-500 mt-2 mb-7">
                                You haven't added any cars or properties to your favorites yet.
                            </p>

                            <div class="flex flex-col sm:flex-row justify-center gap-3">

                                <a href="{{ route('properties.index') }}"
                                   class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition">

                                    Browse Properties

                                </a>

                                <a href="{{ route('cars.index') }}"
                                   class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition">

                                    Browse Cars

                                </a>

                            </div>

                        </div>

                    @endif

                </div>

            </main>

        </div>

    </div>

</x-app-layout>