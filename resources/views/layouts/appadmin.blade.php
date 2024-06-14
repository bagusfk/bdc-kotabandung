<!DOCTYPE html>
<html lang="en">
@vite(['resources/css/app.css', 'resources/js/app.js'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/colreorder/1.5.5/css/colReorder.dataTables.min.css">

    <!-- Datepicker CSS (Flowbite) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.css">

    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <div class="flex justify-between">
        <div class="">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                type="button"
                class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-slate-100 hover:border-b-2 hover:rounded-none hover:border-white focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
        </div>
        <div class="flex">
            <a href="#"
                class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <img class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    src="{{ asset('assets/bell-regular.svg') }}" alt="">
                <span class="ms-3">Notifikasi</span>
            </a>
            <a href="#"
                class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <img class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    src="{{ asset('assets/user-solid.svg') }}" alt="">
                <span class="ms-3">{{ auth()->user()->name }}</span>
            </a>
        </div>
    </div>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-primary dark:bg-gray-800">
            <a href="{{ url('/admin') }}" class="flex items-center ps-2.5 mb-5">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 me-3 sm:h-7" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('index') }}"
                        class="flex items-center p-2 text-gray-900 dark:text-white hover:border-b-2 hover:rounded-none hover:border-white dark:hover:bg-gray-700 {{ request()->is('dashboard') ? 'border-b-2 border-white' : '' }} group">
                        <img class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            src="{{ asset('assets/database-solid.svg') }}" alt="">
                        <span class="ms-3 text-slate-50">Dashboard Admin</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manage-items') }}"
                        class="flex items-center p-2 text-gray-900 dark:text-white hover:border-b-2 hover:rounded-none hover:border-white dark:hover:bg-gray-700 {{ request()->is('kelola-barang') ? 'border-b-2 border-white' : '' }} group">
                        <img class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            src="{{ asset('assets/briefcase-solid.svg') }}" alt="">
                        <span class="flex-1 ms-3 text-white whitespace-nowrap">Kelola Barang</span>
                        {{-- <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span> --}}
                    </a>
                </li>
                <li>
                    <a href="{{ route('manage-ksm') }}"
                        class="flex items-center p-2 text-gray-900 dark:text-white hover:border-b-2 hover:rounded-none hover:border-white dark:hover:bg-gray-700 {{ request()->is('kelola-ksm') ? 'border-b-2 border-white' : '' }} group">
                        <img class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            src="{{ asset('assets/joomla.svg') }}" alt="">
                        <span class="flex-1 ms-3 text-slate-50 whitespace-nowrap">Kelola KSM</span>
                        {{-- <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span> --}}
                    </a>
                </li>
                <li>
                    <a href="{{ route('manage-event') }}"
                        class="flex items-center p-2 text-gray-900 dark:text-white hover:border-b-2 hover:rounded-none hover:border-white dark:hover:bg-gray-700 {{ request()->is('kelola-event') ? 'border-b-2 border-white' : '' }} group">
                        <img class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            src="{{ asset('assets/users-solid.svg') }}" alt="">
                        <span class="flex-1 ms-3 text-slate-50 whitespace-nowrap">Kelola Event</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manage-sales') }}"
                        class="flex items-center p-2 text-gray-900 dark:text-white hover:border-b-2 hover:rounded-none hover:border-white dark:hover:bg-gray-700 {{ request()->is('kelola-penjualan') ? 'border-b-2 border-white' : '' }} group">
                        <img class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            src="{{ asset('assets/paypal.svg') }}" alt="">
                        <span class="flex-1 ms-3 text-slate-50 whitespace-nowrap">Kelola Penjualan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manage-finance') }}"
                        class="flex items-center p-2 text-gray-900 dark:text-white hover:border-b-2 hover:rounded-none hover:border-white dark:hover:bg-gray-700 {{ request()->is('kelola-keuangan') ? 'border-b-2 border-white' : '' }} group">
                        <img class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            src="{{ asset('assets/money-bill-1-regular.svg') }}" alt="">
                        <span class="flex-1 ms-3 text-slate-50 whitespace-nowrap">Kelola Keuangan</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link
                            class="flex items-center py-2 pl-2 pr-2 text-gray-900 rounded-lg focus:bg-transparent dark:text-white hover:border-b-2 hover:rounded-none hover:bg-transparent hover:border-white dark:hover:bg-gray-700 group"
                            :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <img class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                src="{{ asset('assets/power-off-solid.svg') }}" alt="">
                            <span class="flex-1 ms-3 text-slate-50 whitespace-nowrap"
                                style="font-size: 1rem">Logout</span>
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Flowbite Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.5.5/js/dataTables.colReorder.min.js"></script>

    <!-- DataTables Buttons JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

</body>

</html>
