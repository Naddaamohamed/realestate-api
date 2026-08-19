<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<title>EstateHub</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-slate-50 text-slate-900">


{{-- ================= HEADER ================= --}}
<header class="bg-white border-b border-slate-200">

    <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">

        {{-- Logo --}}
        <div class="flex items-center gap-3">

            <div class="w-11 h-11 rounded-xl bg-indigo-600 flex items-center justify-center shadow-sm">
                <span class="text-xl">
                    🏠
                </span>
            </div>

            <div>
                <h1 class="text-xl font-bold text-slate-900">
                    EstateHub
                </h1>

                <p class="text-xs text-slate-400">
                    Real Estate Platform
                </p>
            </div>

        </div>


        {{-- Authentication Buttons --}}
        <div class="flex items-center gap-3">

            @guest

                {{-- Sign In --}}
                <a href="{{ route('login') }}"
                   class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl text-slate-700 font-semibold border border-slate-200 bg-white hover:bg-slate-50 hover:border-slate-300 transition">

                    Sign In

                </a>


                {{-- Sign Up --}}
                @if (Route::has('register'))

                    <a href="{{ route('register') }}"
                       class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold shadow-sm transition">

                        Sign Up

                    </a>

                @endif

            @else

                {{-- Dashboard --}}
                <a href="{{ route('properties.index') }}"
                   class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold shadow-sm transition">

                    <span>
                        🏠
                    </span>

                    Dashboard

                </a>

            @endguest

        </div>

    </div>

</header>


{{-- ================= HERO ================= --}}
<section class="relative overflow-hidden">

    <div class="max-w-7xl mx-auto px-6 py-24 lg:py-32">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- Hero Content --}}
            <div>

                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-50 text-indigo-600 text-sm font-semibold mb-6">

                    <span>✨</span>

                    <span>
                        Your Trusted Real Estate Platform
                    </span>

                </div>


                <h2 class="text-5xl lg:text-6xl font-extrabold text-slate-900 leading-tight">

                    Find a Place

                    <span class="text-indigo-600">
                        You Can Call Home.
                    </span>

                </h2>


                <p class="text-lg text-slate-500 leading-8 mt-6 max-w-xl">

                    Discover properties that match your lifestyle.
                    Browse homes, apartments and real estate listings
                    in one simple and modern platform.

                </p>


                <div class="flex flex-wrap gap-4 mt-8">

                    <a href="{{ route('properties.index') }}"
                       class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold shadow-lg shadow-indigo-200 transition">

                        Explore Properties

                        <span>→</span>

                    </a>


                    @guest

                        <a href="{{ route('register') }}"
                           class="inline-flex items-center px-6 py-3.5 rounded-xl bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-semibold transition">

                            Get Started

                        </a>

                    @endguest

                </div>

            </div>


            {{-- Hero Visual --}}
            <div class="relative">

                <div class="bg-gradient-to-br from-indigo-600 via-indigo-700 to-slate-900 rounded-3xl p-8 shadow-2xl">

                    <div class="bg-white/10 backdrop-blur rounded-2xl p-8 border border-white/20">

                        <div class="text-7xl mb-6">
                            🏡
                        </div>

                        <p class="text-indigo-100 text-sm font-medium">
                            Featured Property
                        </p>

                        <h3 class="text-2xl font-bold text-white mt-2">
                            Your Dream Home
                        </h3>

                        <p class="text-indigo-100 mt-2">
                            Modern living. Perfect location.
                        </p>


                        <div class="grid grid-cols-3 gap-3 mt-8">

                            <div class="bg-white/10 rounded-xl p-3 text-center">
                                <p class="text-white font-bold">
                                    3
                                </p>

                                <p class="text-xs text-indigo-100">
                                    Beds
                                </p>
                            </div>


                            <div class="bg-white/10 rounded-xl p-3 text-center">
                                <p class="text-white font-bold">
                                    2
                                </p>

                                <p class="text-xs text-indigo-100">
                                    Baths
                                </p>
                            </div>


                            <div class="bg-white/10 rounded-xl p-3 text-center">
                                <p class="text-white font-bold">
                                    180
                                </p>

                                <p class="text-xs text-indigo-100">
                                    m²
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- ================= FEATURES ================= --}}
<section class="bg-white border-y border-slate-200">

    <div class="max-w-7xl mx-auto px-6 py-20">

        <div class="text-center mb-12">

            <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wider">
                Why EstateHub?
            </p>

            <h2 class="text-3xl font-bold text-slate-900 mt-2">
                Everything You Need in One Place
            </h2>

            <p class="text-slate-500 mt-3 max-w-2xl mx-auto">
                A simple way to discover, manage and save your favorite properties.
            </p>

        </div>


        <div class="grid md:grid-cols-3 gap-6">

            {{-- Feature 1 --}}
            <div class="p-7 rounded-2xl bg-slate-50 border border-slate-200">

                <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center text-2xl mb-5">
                    🔎
                </div>

                <h3 class="text-lg font-bold text-slate-900">
                    Easy Property Search
                </h3>

                <p class="text-sm text-slate-500 leading-6 mt-2">
                    Find properties based on your needs and explore listings quickly.
                </p>

            </div>


            {{-- Feature 2 --}}
            <div class="p-7 rounded-2xl bg-slate-50 border border-slate-200">

                <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center text-2xl mb-5">
                    🏠
                </div>

                <h3 class="text-lg font-bold text-slate-900">
                    Manage Your Properties
                </h3>

                <p class="text-sm text-slate-500 leading-6 mt-2">
                    Create, update and manage your real estate listings from one dashboard.
                </p>

            </div>


            {{-- Feature 3 --}}
            <div class="p-7 rounded-2xl bg-slate-50 border border-slate-200">

                <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center text-2xl mb-5">
                    ❤️
                </div>

                <h3 class="text-lg font-bold text-slate-900">
                    Save Favorites
                </h3>

                <p class="text-sm text-slate-500 leading-6 mt-2">
                    Save properties you love and easily come back to them later.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- ================= CTA ================= --}}
<section class="max-w-7xl mx-auto px-6 py-20">

    <div class="rounded-3xl bg-slate-900 px-8 py-14 lg:px-16 text-center">

        <h2 class="text-3xl lg:text-4xl font-bold text-white">
            Ready to Find Your Next Property?
        </h2>

        <p class="text-slate-400 mt-4 max-w-2xl mx-auto">
            Start exploring available properties and discover a place
            that feels right for you.
        </p>


        <div class="mt-8">

            <a href="{{ route('properties.index') }}"
               class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-semibold transition">

                Browse Properties

                <span>→</span>

            </a>

        </div>

    </div>

</section>


{{-- ================= FOOTER ================= --}}
<footer class="border-t border-slate-200 bg-white">

    <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">

        <div class="flex items-center gap-2">

            <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center">
                🏠
            </div>

            <span class="font-bold text-slate-900">
                EstateHub
            </span>

        </div>

        <p class="text-sm text-slate-400">
            © {{ date('Y') }} EstateHub. All rights reserved.
        </p>

    </div>

</footer>

</body>
</html>
