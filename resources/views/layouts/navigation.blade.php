<nav class="flex items-center gap-6">


    {{-- Properties --}}
    <a href="{{ route('properties.index') }}"
       class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition">
        🏠 Properties
    </a>

    {{-- Cars --}}
    <a href="{{ route('cars.index') }}"
       class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition">
        🚗 Cars
    </a>

</nav>