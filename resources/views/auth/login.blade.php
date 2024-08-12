<x-guest-layout>
    <div class="flex justify-center w-full">
        <div class="px-6 py-4 mt-6 bg-white shadow-md w-fit dark:bg-gray-800 sm:rounded-lg">
    <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <h2 class="text-[1rem] text-center my-5">Silahkan Masuk</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                {{-- <x-input-label for="email" :value="__('Email')" /> --}}
                <x-input-user id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Username" icon="{{ asset('assets/user-solid.svg') }}" />

                {{-- <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Username" icon="{{ asset('assets/user-solid.svg') }}" /> --}}
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
                    class="block w-full pr-4 mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <img class="absolute inset-y-0 right-0 w-5 pr-2 transform -translate-y-1/2 top-1/2" src="{{ asset('assets/key-solid.svg') }}">
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <div class="flex items-center mt-2">
                    <input
                        type="checkbox"
                        id="show-password-page"
                        x-model="show"
                        class="mr-2 leading-tight"
                    >
                    <label for="show-password-page" class="text-sm text-gray-700">Lihat password</label>
                </div>
            </div>

            <!-- Remember Me -->
            {{-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="grid grid-cols-2 gap-2 mt-4">
                {{-- @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}
                <a href="/register" class="relative inline-flex items-center justify-center h-10 px-3 font-medium text-white border border-transparent rounded-md bg-indigo-950 hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <img class="w-4 mr-2" src="{{ asset('assets/user-plus-solid.svg') }}">
                    Daftar
                </a>
                <button type="submit" class="relative inline-flex items-center justify-center h-10 px-3 font-medium text-white border border-transparent rounded-md bg-indigo-950 hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <img class="w-4 mr-2" src="{{ asset('assets/power-off-solid.svg') }}">
                    Login
                </button>
            </div>
        </form>
        </div>
    </div>
</x-guest-layout>
