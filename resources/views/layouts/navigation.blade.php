<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="flex h-16 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between w-full">
            <!-- Logo -->
            <div class="flex w-full space-x-3 rtl:space-x-reverse">
                <a href="{{ route('dashboard') }}" class="flex items-center w-12 h-full my-auto">
                    {{-- <x-application-logo class="block w-auto text-gray-800 fill-current h-9 dark:text-gray-200" /> --}}
                    <img src="{{ asset('/assets/logo-bdc.png') }}" alt="" class="bg-cover">
                </a>
                <div class="sm:flex sm:relative max-lg:absolute max-lg:-left-[12px] sm:top-0 top-16 hidden w-full" id="navbar-sticky">
                    <div class="space-x-8 duration-200 max-sm:border-b max-sm:bg-white border-slate-500 sm:-my-px sm:ms-2 lg:ms-6 sm:flex sm:transition sm:ease-in-out sm:delay-100 sm:hover:-translate-y-1 sm:hover:scale-110">
                        <x-nav-link :href="route('dashboard')" class="items-center flex max-sm:w-full max-sm:px-6 max-sm:py-3 max-sm:hover:bg-[#04a7ff]" :active="request()->routeIs('dashboard')">
                            {{-- <img class="w-4 mr-2 " src="{{ asset('assets/house-solid.svg') }}"> --}}
                            <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
                            </svg>
                            {{ __('Home') }}
                        </x-nav-link>
                    </div>
                    <div class="space-x-8 duration-200 max-sm:border-b max-sm:bg-white border-slate-500 sm:-my-px sm:ms-2 lg:ms-6 sm:flex sm:transition sm:ease-in-out sm:delay-100 sm:hover:-translate-y-1 sm:hover:scale-110">
                        <x-nav-link :href="route('company_profile')" class="block max-sm:w-full max-sm:px-6 max-sm:py-3 max-sm:hover:bg-[#04a7ff]" :active="request()->routeIs('company_profile')">
                            {{-- <img class="w-3 mr-2 " src="{{ asset('assets/building-solid.svg') }}"> --}}
                            <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z"/>
                            </svg>
                            {{ __('Company') }}
                        </x-nav-link>
                    </div>
                    <div class="space-x-8 duration-200 max-sm:border-b max-sm:bg-white border-slate-500 sm:-my-px sm:ms-2 lg:ms-6 sm:flex sm:transition sm:ease-in-out sm:delay-100 sm:hover:-translate-y-1 sm:hover:scale-110">
                        <x-nav-link :href="route('catalog')" class="block max-sm:w-full max-sm:px-6 max-sm:py-3 max-sm:hover:bg-[#04a7ff]" :active="request()->routeIs('catalog')">
                            {{-- <img class="w-4 mr-2 " src="{{ asset('assets/newspaper-solid.svg') }}"> --}}
                            <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4"/>
                            </svg>
                            {{ __('E-Catalog') }}
                        </x-nav-link>
                    </div>
                    <div class="space-x-8 duration-200 max-sm:border-b max-sm:bg-white border-slate-500 sm:-my-px sm:ms-2 lg:ms-6 sm:flex sm:transition sm:ease-in-out sm:delay-100 sm:hover:-translate-y-1 sm:hover:scale-110">
                        <x-nav-link :href="route('event')" class="block max-sm:w-full max-sm:px-6 max-sm:py-3 max-sm:hover:bg-[#04a7ff]" :active="request()->routeIs('event')">
                            {{-- <svg class="w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg> --}}
                            <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                            </svg>
                            {{ __('Event') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>

            @if (Auth::user())
                @if (Auth::user()->role == 'pembeli' || Auth::user()->role == 'ksm')
                <div class="space-x-8 duration-200 max-sm:border-b max-sm:bg-white border-slate-500 sm:-my-px sm:ms-2 lg:ms-6 sm:flex sm:transition sm:ease-in-out sm:delay-100 sm:hover:-translate-y-1 sm:hover:scale-110">
                    <x-nav-link :href="route('cart')" class="block max-sm:w-full max-sm:px-6 max-sm:py-3 max-sm:hover:bg-[#04a7ff]" :active="request()->routeIs('cart')">
                        {{-- <img class="w-4 mr-2 " src="{{ asset('assets/newspaper-solid.svg') }}"> --}}
                        <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                        </svg>
                    </x-nav-link>
                </div>
                @endif
            @endif
            <!-- Navigation Links -->
                <div class="flex items-center space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">


                    <!-- Settings Dropdown -->
                    <div class="flex sm:items-center sm:ms-6">
                        @php
                            $currentUrl = Request::url();
                        @endphp
                        @if (Route::has('login'))
                            @auth
                                <button id="modalLink" class="hidden font-semibold text-g ray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Log in</button>
                        @else
                                @if (strpos($currentUrl, '/login') !== false)
                                @else
                                    <button id="modalLink" class="text-white py-[.5rem] dark:text-gray-400 dark:hover:text-white bg-[#04a7ff] hover:bg-transparent hover:border-[#04a7ff] hover:text-[#04a7ff] hover:border px-[1rem] rounded-md">Login</button>
                                @endif
                            @endauth
                        @endif
                        <div id="myModal" class="absolute top-0 left-0 z-20 items-center justify-center hidden w-full h-screen bg-black bg-opacity-50 modal">
                            <div class="fixed flex items-center justify-center w-full h-screen modal-content">
                                <div class="px-6 py-4 bg-white rounded-lg shadow-md sm:w-96 dark:bg-gray-800">
                                    <div class="flex justify-end w-full">
                                        <button id="modalCloseBtn" class="cursor-pointer">
                                            <img class="w-4 mr-2" src="{{ asset('assets/xmark-solid.svg') }}">
                                        </button>
                                    </div>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    <div class="flex justify-center">
                                        {{-- <img class="w-20" src="{{ asset('assets/xmark-solid.svg') }}" alt=""> --}}
                                        <img src="{{ asset('/assets/logo-bdc.png') }}" alt="" class="w-20">
                                    </div>
                                    <h2 class="text-[1rem] text-center my-5">Silahkan Masuk</h2>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email Address -->
                                        <div>
                                            {{-- <x-input-label for="email" :value="__('Email')" /> --}}
                                            <x-input-user id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" placeholder="Masukan email" icon="{{ asset('assets/user-solid.svg') }}"/>

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
                                                placeholder="Masukan password"
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
                                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                                            <div>{{ Auth::user()->name }}</div>

                                            <div class="ms-1">
                                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
                                    @if ( Auth::user()->role == 'ksm' )
                                        <x-dropdown-link :href="route('dashboard_ksm')">
                                            {{ __('Dashboard KSM') }}
                                        </x-dropdown-link>
                                    @elseif ( Auth::user()->role == 'pembeli' )
                                        <x-dropdown-link :href="route('register-ksm')" class="underline decoration-2">
                                            {{ __('Daftar Sebagai KSM') }}
                                        </x-dropdown-link>
                                    @endif

                                    @if ( Auth::user()->role == 'pembeli' || Auth::user()->role == 'ksm' )
                                        <x-dropdown-link :href="route('my-order')">
                                            {{ __('Pesanan Saya') }}
                                        </x-dropdown-link>
                                    @endif

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
                    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                        </svg>
                    </button>
                </div>
                {{-- <div class="hidden w-full md:w-auto" id="navbar-default">
                  <ul class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                      <a href="#" class="block px-3 py-2 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                    </li>
                    <li>
                      <a href="#" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                      <a href="#" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                      <a href="#" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                    </li>
                    <li>
                      <a href="#" class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                  </ul>
                </div> --}}
        </div>


            <!-- Hamburger -->
            {{-- <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
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
                <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
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
