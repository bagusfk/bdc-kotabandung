<x-guest-layout>
    <div class="w-full justify-center flex">
        <div class="w-fit mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
    <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <h2 class="text-[1rem] text-center my-5">Silahkan Masuk</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                {{-- <x-input-label for="email" :value="__('Email')" /> --}}
                <x-input-user id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Username" icon="{{ asset('assets/user-solid.svg') }}" />

                {{-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Username" icon="{{ asset('assets/user-solid.svg') }}" /> --}}
                {{-- <img src="{{ asset('assets/user-solid.svg')}}"> --}}
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div x-data="{ show: false }" class="mt-4">
                {{-- <x-input-label for="password" :value="__('Password')" /> --}}

                {{-- <x-input-user id="password" class="block w-full mt-1"
                                type="show ? 'text' : 'password'"
                                 icon="" /> --}}
                <div class="relative">
                    <input id="password"
                    :type="show ? 'text' : 'password'"
                    name="password"
                    required autocomplete="current-password"
                    placeholder="Masukan Password"
                    class="block mt-1 w-full pr-4 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <img class="w-5 absolute inset-y-0 right-0 pr-2 top-1/2 transform -translate-y-1/2" src="{{ asset('assets/key-solid.svg') }}">
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <div class="flex items-center mt-2">
                    <input
                        type="checkbox"
                        id="show-password"
                        x-model="show"
                        class="mr-2 leading-tight"
                    >
                    <label for="show-password" class="text-sm text-gray-700">Lihat password</label>
                </div>
            </div>

            <!-- Remember Me -->
            {{-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="grid grid-cols-2 gap-2 mt-4">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}
                <a href="/register" class="relative inline-flex items-center justify-center h-10 px-3 rounded-md border border-transparent font-medium text-white bg-indigo-950 hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <img class="w-4 mr-2" src="{{ asset('assets/user-plus-solid.svg') }}">
                    Daftar
                </a>
                <button type="submit" class="relative inline-flex items-center justify-center h-10 px-3 rounded-md border border-transparent font-medium text-white bg-indigo-950 hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <img class="w-4 mr-2" src="{{ asset('assets/power-off-solid.svg') }}">
                    Login
                </button>
            </div>
        </form>
        </div>
    </div>
</x-guest-layout>
