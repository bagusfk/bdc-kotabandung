<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-200">
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                        <img class="w-4 mr-2" src="{{ asset('assets/house-solid.svg') }}">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-200">
                    <x-nav-link :href="route('company_profile')" :active="request()->routeIs('company_profile')">
                        <img class="w-3 mr-2" src="{{ asset('assets/building-solid.svg') }}">
                        {{ __('Company') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-200">
                    <x-nav-link :href="route('dashboard')">
                        <img class="w-4 mr-2" src="{{ asset('assets/newspaper-solid.svg') }}">
                        {{ __('E-Catalog') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex transition ease-in-out delay-100 hover:-translate-y-1 hover:scale-110 duration-200">
                    <x-nav-link :href="route('dashboard')">
                        <img class="w-4 mr-2" src="{{ asset('assets/users-solid.svg') }}">
                        {{ __('Event') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                @if (Route::has('login'))
                    @auth
                        <button id="modalLink" class="hidden font-semibold text-g ray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Log in</button>
                @else
                        <button id="modalLink" class="text-white py-[.5rem] dark:text-gray-400 dark:hover:text-white bg-[#50c2ff] hover:bg-transparent hover:border-[#50c2ff] hover:text-[#50c2ff] hover:border px-[1rem] rounded-md">Login</button>
                    @endauth
                @endif
                <div id="myModal" class="modal absolute w-full justify-center items-center h-screen left-0 bg-black bg-opacity-50 top-0 z-20 hidden">
                    <div class="modal-content w-full h-screen flex justify-center items-center fixed">
                        <div class="h-fit max-md:w-full lg:w-96 px-6 py-4 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
                            <div class="w-full flex justify-end">
                                <button id="modalCloseBtn" class="cursor-pointer">
                                    <img class="w-4 mr-2" src="{{ asset('assets/xmark-solid.svg') }}">
                                </button>
                            </div>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <div class="flex justify-center">
                                <img class="w-20" src="{{ asset('assets/xmark-solid.svg') }}" alt="">
                            </div>
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
                                <div class="mt-4">
                                    {{-- <x-input-label for="password" :value="__('Password')" /> --}}

                                    <x-input-user id="password" class="block mt-1 w-full"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="current-password"
                                                    placeholder="Password" icon="{{ asset('assets/key-solid.svg') }}" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
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
                                    <a href="/register" class="relative h-10 inline-flex items-center justify-center px-3 rounded-md border border-[#50c2ff] font-medium text-[#50c2ff]">
                                        {{-- <img class="w-4 mr-2" src="{{ asset('assets/user-plus-solid.svg') }}"> --}}
                                        Daftar
                                    </a>
                                    <button type="submit" class="relative h-10 inline-flex items-center justify-center px-3 rounded-md border border-transparent font-medium text-white bg-[#50c2ff]">
                                        {{-- <img class="w-4 mr-2" src="{{ asset('assets/power-off-solid.svg') }}"> --}}
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Route::has('login'))
                            @auth
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->username }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>

                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif --}}
                            @endauth
                        @endif
                    </x-slot>

                    <x-slot name="content">
                    @if (Route::has('login'))
                        @auth
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        @endauth
                    @else
                    @endif
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            {{-- <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div> --}}
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    {{-- <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div> --}}
</nav>
<script>
    // Ambil elemen tautan, modal, dan tombol tutup
    var modalLink = document.getElementById("modalLink");
    var modal = document.getElementById("myModal");
    var modalCloseBtn = document.getElementById("modalCloseBtn");

    // Tambahkan event listener untuk tautan
    modalLink.addEventListener("click", function(event) {
        event.preventDefault(); // Mencegah tindakan default tautan
        modal.classList.remove("hidden"); // Tampilkan modal saat tautan diklik
    });

    // Tambahkan event listener untuk tombol tutup modal
    modalCloseBtn.addEventListener("click", function(event) {
        modal.classList.add("hidden"); // Sembunyikan modal saat tombol tutup diklik
    });
</script>
