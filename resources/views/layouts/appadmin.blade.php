<!DOCTYPE html>
<html lang="en">
@vite(['resources/css/app.css', 'resources/js/app.js'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="Permissions-Policy" content="clipboard-read=, clipboard-write=">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>


    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/2.0.2/css/select.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.2/css/dataTables.dateTime.min.css">

    <!-- Datepicker CSS (Flowbite) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
    <script src="https://cdn.datatables.net/select/2.0.2/js/dataTables.select.js"></script>
    <script src="https://cdn.datatables.net/select/2.0.2/js/select.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.2/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
        <div
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:focus:ring-gray-600">
            {{-- <a href="#"
                class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <img class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    src="{{ asset('assets/bell-regular.svg') }}" alt="">
                <span class="ms-3">Notifikasi</span>
            </a> --}}
            {{-- <a href="#"
                class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"> --}}
            <img class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                src="{{ asset('assets/user-solid.svg') }}" alt="">
            <span class="ms-3">{{ auth()->user()->name }}</span>
            {{-- </a> --}}
        </div>
    </div>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-primary dark:bg-gray-800">
            <a href="{{ url('/dashboard-admin') }}" class="flex items-center ps-2.5 mb-5">
                <img src="{{ asset('/assets/logo-bdc.png') }}" class="h-6 me-3 sm:h-7" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Admin</span>
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
                    {{-- <a href="{{ route('manage-items') }}"
                        class="flex items-center p-2 text-gray-900 dark:text-white hover:border-b-2 hover:rounded-none hover:border-white dark:hover:bg-gray-700 {{ request()->is('kelola-barang') ? 'border-b-2 border-white' : '' }} group">
                        <img class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            src="{{ asset('assets/briefcase-solid.svg') }}" alt="">
                        <span class="flex-1 ms-3 text-white whitespace-nowrap">Kelola Barang</span>
                    </a> --}}

                    <button type="button"
                        class="flex text-left items-center w-full p-2 text-gray-900 transition duration-75 dark:text-white hover:border-b-2 hover:rounded-none hover:border-white dark:hover:bg-gray-700 group"
                        aria-controls="dropdown-item" data-collapse-toggle="dropdown-item">
                        <img class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            src="{{ asset('assets/briefcase-solid.svg') }}" alt="">
                        <span class="flex-1 ms-3 text-slate-50 whitespace-nowrap">Produk</span>
                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                        </svg>
                    </button>

                    <ul id="dropdown-item" class="hidden bg-white">
                        <li>
                            <a href="{{ route('manage-items') }}"
                                class="flex items-center w-full py-4 px-2 text-gray-900 transition duration-75 group hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">List</span></a>
                        </li>
                        <li>

                            <a href="{{ route('terlaris_id', 1) }}"
                                class="flex items-center w-full py-4 px-2 text-gray-900 transition duration-75 group hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Terlaris</span></a>

                            {{-- <ul id="dropdown-item-2" class="hidden bg-slate-200">
                                <li>
                                    <a href="{{ url('terlaris/1') }}"
                                        class="flex items-center w-full py-4 px-2 text-gray-900 transition duration-75 group hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                        </svg>
                                        <span class="flex-1 ms-3 whitespace-nowrap">Fashion</span></a>
                                </li>
                                <li>
                                    <a href="{{ url('terlaris/2') }}"
                                        class="flex items-center w-full py-4 px-2 text-gray-900 transition duration-75 group hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                        </svg>
                                        <span class="flex-1 ms-3 whitespace-nowrap">Kriya</span></a>
                                </li>
                                <li>
                                    <a href="{{ url('terlaris/3') }}"
                                        class="flex items-center w-full py-4 px-2 text-gray-900 transition duration-75 group hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                        </svg>
                                        <span class="flex-1 ms-3 whitespace-nowrap">Kuliner</span></a>
                                </li>
                            </ul> --}}
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('manage-ksm') }}"
                        class="flex items-center p-2 text-gray-900 dark:text-white hover:border-b-2 hover:rounded-none hover:border-white dark:hover:bg-gray-700 {{ request()->is('kelola-ksm') ? 'border-b-2 border-white' : '' }} group">
                        <img class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            src="{{ asset('assets/joomla.svg') }}" alt="">
                        <span class="flex-1 ms-3 text-slate-50 whitespace-nowrap">User</span>
                        {{-- <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span> --}}
                    </a>
                </li>

                <li>
                    <button type="button"
                        class="flex text-left items-center w-full p-2 text-gray-900 transition duration-75 dark:text-white hover:border-b-2 hover:rounded-none hover:border-white dark:hover:bg-gray-700 group"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <img class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            src="{{ asset('assets/users-solid.svg') }}" alt="">
                        <span class="flex-1 ms-3 text-slate-50 whitespace-nowrap">Event</span>
                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="hidden bg-white">
                        <li>
                            <a href="{{ route('list-event') }}"
                                class="flex items-center w-full py-4 px-2 text-gray-900 transition duration-75 group hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">List</span></a>
                        </li>
                        <li>
                            <a href="{{ route('dokumentasi-event') }}"
                                class="flex items-center w-full py-4 px-2 text-gray-900 transition duration-75 group hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Dokumentasi</span></a>
                        </li>
                        <li>
                            <a href="{{ route('daftar-event') }}"
                                class="flex items-center w-full py-4 px-2 text-gray-900 transition duration-75 group hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Daftar</span></a>
                        </li>
                        <li>
                            <a href="{{ route('laporan-event') }}"
                                class="flex items-center w-full py-4 px-2 text-gray-900 transition duration-75 group hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Laporan</span></a>
                        </li>
                    </ul>
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

    <!-- Flowbite Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

</body>

</html>
