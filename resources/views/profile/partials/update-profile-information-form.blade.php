<section class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-sm">

    <header class="mb-6">

        <h2 class="text-lg font-bold text-slate-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            {{ __("Update your account's profile information and email address.") }}
        </p>

    </header>


    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>


    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        {{-- Name --}}
        <div>

            <label for="name" class="block text-sm font-semibold text-slate-700 mb-1.5">
                {{ __('Name') }}
            </label>

            <input id="name"
                   name="name"
                   type="text"
                   value="{{ old('name', $user->name) }}"
                   required
                   autofocus
                   autocomplete="name"
                   class="block w-full rounded-xl border-slate-200 bg-slate-50 text-sm text-slate-900 placeholder-slate-400 focus:border-indigo-500 focus:bg-white focus:ring-indigo-500 transition">

            @error('name')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Email --}}
        <div>

            <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">
                {{ __('Email') }}
            </label>

            <input id="email"
                   name="email"
                   type="email"
                   value="{{ old('email', $user->email) }}"
                   required
                   autocomplete="username"
                   class="block w-full rounded-xl border-slate-200 bg-slate-50 text-sm text-slate-900 placeholder-slate-400 focus:border-indigo-500 focus:bg-white focus:ring-indigo-500 transition">

            @error('email')
                <p class="mt-2 text-sm text-red-600">
                    {{ $message }}
                </p>
            @enderror


            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div class="mt-3 rounded-xl bg-amber-50 border border-amber-200 px-4 py-3">

                    <p class="text-sm text-amber-800">

                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                                class="font-semibold underline hover:text-amber-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>

                    </p>


                    @if (session('status') === 'verification-link-sent')

                        <p class="mt-2 font-medium text-sm text-emerald-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>

                    @endif

                </div>

            @endif

        </div>


        {{-- Actions --}}
        <div class="flex items-center gap-4 pt-2">

            <button type="submit"
                    class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold shadow-sm transition">
                {{ __('Save') }}
            </button>


            @if (session('status') === 'profile-updated')

                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="flex items-center gap-1.5 text-sm font-medium text-emerald-600">

                    <span>✓</span>
                    {{ __('Saved.') }}

                </p>

            @endif

        </div>

    </form>

</section>