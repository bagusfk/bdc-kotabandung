<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl flex mx-auto px-4 sm:px-6 lg:px-8 h-16">
        <div class="w-full flex justify-between">
            <!-- Logo -->
            <div class="flex w-full space-x-3 rtl:space-x-reverse">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
                <div class="sm:flex sm:relative max-lg:absolute max-lg:-left-[12px] sm:top-0 top-16 hidden w-full" id="navbar-sticky">
                    <div class="max-sm:border-b max-sm:bg-white border-slate-500 space-x-8 sm:-my-px sm:ms-2 lg:ms-6 sm:flex sm:transition sm:ease-in-out sm:delay-100 sm:hover:-translate-y-1 sm:hover:scale-110 duration-200">
                        <x-nav-link :href="route('dashboard')" class="block max-sm:w-full max-sm:px-6 max-sm:py-3 max-sm:hover:bg-[#04a7ff]" :active="request()->routeIs('welcome')">
                            <img class="w-4 mr-2 " src="{{ asset('assets/house-solid.svg') }}">
                            {{ __('Home') }}
                        </x-nav-link>
                    </div>
                    <div class="max-sm:border-b max-sm:bg-white border-slate-500 space-x-8 sm:-my-px sm:ms-2 lg:ms-6 sm:flex sm:transition sm:ease-in-out sm:delay-100 sm:hover:-translate-y-1 sm:hover:scale-110 duration-200">
                        <x-nav-link :href="route('company_profile')" class="block max-sm:w-full max-sm:px-6 max-sm:py-3 max-sm:hover:bg-[#04a7ff]" :active="request()->routeIs('company_profile')">
                            <img class="w-3 mr-2 " src="{{ asset('assets/building-solid.svg') }}">
                            {{ __('Company') }}
                        </x-nav-link>
                    </div>
                    <div class="max-sm:border-b max-sm:bg-white border-slate-500 space-x-8 sm:-my-px sm:ms-2 lg:ms-6 sm:flex sm:transition sm:ease-in-out sm:delay-100 sm:hover:-translate-y-1 sm:hover:scale-110 duration-200">
                        <x-nav-link :href="route('catalog')" class="block max-sm:w-full max-sm:px-6 max-sm:py-3 max-sm:hover:bg-[#04a7ff]">
                           <img class="w-4 mr-2 " src="{{ asset('assets/newspaper-solid.svg') }}">
                            {{ __('E-Catalog') }}
                        </x-nav-link>
                    </div>
                    <div class="max-sm:border-b max-sm:bg-white border-slate-500 space-x-8 sm:-my-px sm:ms-2 lg:ms-6 sm:flex sm:transition sm:ease-in-out sm:delay-100 sm:hover:-translate-y-1 sm:hover:scale-110 duration-200">
                        <x-nav-link :href="route('dashboard')" class="block max-sm:w-full max-sm:px-6 max-sm:py-3 max-sm:hover:bg-[#04a7ff]">
                            <svg class="w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                            {{ __('Event') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
            <!-- Navigation Links -->
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

                    <!-- Settings Dropdown -->
                    <div class="flex sm:items-center sm:ms-6">

                        @if (Route::has('login'))
                            @auth
                                <button id="modalLink" class="hidden font-semibold text-g ray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Log in</button>
                        @else
                                <button id="modalLink" class="text-white py-[.5rem] dark:text-gray-400 dark:hover:text-white bg-[#04a7ff] hover:bg-transparent hover:border-[#04a7ff] hover:text-[#04a7ff] hover:border px-[1rem] rounded-md">Login</button>
                            @endauth
                        @endif
                        <div id="myModal" class="modal absolute w-full justify-center items-center h-screen left-0 bg-black bg-opacity-50 top-0 z-20 hidden">
                            <div class="modal-content w-full h-screen flex justify-center items-center fixed">
                                <div class="sm:w-96 px-6 py-4 bg-white dark:bg-gray-800 shadow-md rounded-lg">
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
                                            <a href="/register" class="relative h-10 inline-flex items-center justify-center px-3 rounded-md border border-[#04a7ff] font-medium text-[#04a7ff]">
                                                {{-- <img class="w-4 mr-2" src="{{ asset('assets/user-plus-solid.svg') }}"> --}}
                                                Daftar
                                            </a>
                                            <button type="submit" class="relative h-10 inline-flex items-center justify-center px-3 rounded-md border border-transparent font-medium text-white bg-[#04a7ff]">
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
                                            <div>{{ Auth::user()->name }}</div>

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
                    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                        </svg>
                    </button>
                </div>
                {{-- <div class="hidden w-full md:w-auto" id="navbar-default">
                  <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                      <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                    </li>
                    <li>
                      <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                      <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                      <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                    </li>
                    <li>
                      <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                  </ul>
                </div> --}}
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
    var menuButton = document.querySelector('[data-collapse-toggle="navbar-sticky"]');

    // Event navbar
    menuButton.addEventListener("click", function(event) {
        var menu = document.getElementById("navbar-sticky");
        if (menu.classList.contains("fade-in")) {
            menu.classList.remove("fade-in");
            setTimeout(function() {
                menu.classList.add("fade-out");
            }, 300);
        } else {
            menu.classList.remove("fade-out");
            menu.classList.add("fade-in");
        }
    });

    // Tambahkan event listener untuk tautan
    modalLink.addEventListener("click", function(event) {
        event.preventDefault(); // Mencegah tindakan default tautan
        modal.classList.remove("hidden"); // Tampilkan modal saat tautan diklik
        modal.classList.remove("fade-out");
        modal.classList.add("fade-in");
    });

    // Tambahkan event listener untuk tombol tutup modal
    modalCloseBtn.addEventListener("click", function(event) {
        modal.classList.add("fade-out");
        modal.classList.remove("fade-in");
        setTimeout(() => {
            modal.classList.add("hidden"); // Sembunyikan modal setelah animasi fadeOut selesai
        }, 300);
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
