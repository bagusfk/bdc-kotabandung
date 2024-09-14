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
                class="ms-3 mt-2 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:rounded-none hover:border-b-2 hover:border-white hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 sm:hidden">
                <span class="sr-only">Open sidebar</span>
                <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
        </div>
        <div
            class="ms-3 mt-2 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:focus:ring-gray-600">
            <img class="h-5 w-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                src="{{ asset('assets/user-solid.svg') }}" alt="">
            <span class="ms-3">{{ auth()->user()->name }}</span>
        </div>
    </div>

    <aside id="logo-sidebar"
        class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full transition-transform sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full overflow-y-auto bg-primary px-3 py-4 dark:bg-gray-800">
            <a href="{{ url('/dashboard/kepalabagian') }}" class="mb-5 flex items-center ps-2.5">
                <img src="{{ asset('/assets/logo-bdc.png') }}" class="me-3 h-6 sm:h-7" alt="Flowbite Logo" />
                <span class="self-center whitespace-nowrap text-xl font-semibold dark:text-white">Kepala Bagian</span>
            </a>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('kepalabagiandashboard') }}"
                        class="{{ request()->is('dashboard') ? 'border-b-2 border-white' : '' }} group flex items-center p-2 text-gray-900 hover:rounded-none hover:border-b-2 hover:border-white dark:text-white dark:hover:bg-gray-700">
                        <img class="h-5 w-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            src="{{ asset('assets/database-solid.svg') }}" alt="">
                        <span class="ms-3 text-slate-50">Dashboard</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="group flex w-full items-center p-2 text-left text-gray-900 transition duration-75 hover:rounded-none hover:border-b-2 hover:border-white dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-item" data-collapse-toggle="dropdown-item">
                        <img class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            src="{{ asset('assets/briefcase-solid.svg') }}" alt="">
                        <span class="ms-3 flex-1 whitespace-nowrap text-slate-50">Laporan Produk</span>
                        <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                        </svg>
                    </button>

                    <ul id="dropdown-item" class="hidden bg-white">
                        <li>
                            <a href="{{ route('manage_items_kg') }}"
                                class="group flex w-full items-center px-2 py-4 text-gray-900 transition duration-75 hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">List</span></a>
                        </li>
                        <li>
                            <a href="{{ route('terlaris_kg', 1) }}"
                                class="group flex w-full items-center px-2 py-4 text-gray-900 transition duration-75 hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Terlaris</span></a>
                        </li>
                        <li>
                            <a href="{{ route('laris_kg', 1) }}"
                                class="group flex w-full items-center px-2 py-4 text-gray-900 transition duration-75 hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Laris</span></a>
                        </li>
                        <li>
                            <a href="{{ route('kurang_laris_kg', 1) }}"
                                class="group flex w-full items-center px-2 py-4 text-gray-900 transition duration-75 hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Kurang Laris</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('manage_ksm_kg') }}"
                        class="{{ request()->is('kelola-ksm') ? 'border-b-2 border-white' : '' }} group flex items-center p-2 text-gray-900 hover:rounded-none hover:border-b-2 hover:border-white dark:text-white dark:hover:bg-gray-700">
                        <img class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            src="{{ asset('assets/joomla.svg') }}" alt="">
                        <span class="ms-3 flex-1 whitespace-nowrap text-slate-50">Laporan Pengguna</span>
                        {{-- <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span> --}}
                    </a>
                </li>

                <li>
                    <button type="button"
                        class="group flex w-full items-center p-2 text-left text-gray-900 transition duration-75 hover:rounded-none hover:border-b-2 hover:border-white dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <img class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            src="{{ asset('assets/users-solid.svg') }}" alt="">
                        <span class="ms-3 flex-1 whitespace-nowrap text-slate-50">Laporan Event</span>
                        <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z" />
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="hidden bg-white">
                        <li>
                            <a href="{{ route('list_event_kg') }}"
                                class="group flex w-full items-center px-2 py-4 text-gray-900 transition duration-75 hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">List</span></a>
                        </li>
                        <li>
                            <a href="{{ route('daftar_event_kg') }}"
                                class="group flex w-full items-center px-2 py-4 text-gray-900 transition duration-75 hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Daftar</span></a>
                        </li>
                        <li>
                            <a href="{{ route('laporan_event_kg') }}"
                                class="group flex w-full items-center px-2 py-4 text-gray-900 transition duration-75 hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">Laporan</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('manage_sales_kg') }}"
                        class="{{ request()->is('kelola-penjualan') ? 'border-b-2 border-white' : '' }} group flex items-center p-2 text-gray-900 hover:rounded-none hover:border-b-2 hover:border-white dark:text-white dark:hover:bg-gray-700">
                        <img class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            src="{{ asset('assets/paypal.svg') }}" alt="">
                        <span class="ms-3 flex-1 whitespace-nowrap text-slate-50">Laporan Penjualan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manage_finance_kg') }}"
                        class="{{ request()->is('kelola-keuangan') ? 'border-b-2 border-white' : '' }} group flex items-center p-2 text-gray-900 hover:rounded-none hover:border-b-2 hover:border-white dark:text-white dark:hover:bg-gray-700">
                        <img class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            src="{{ asset('assets/money-bill-1-regular.svg') }}" alt="">
                        <span class="ms-3 flex-1 whitespace-nowrap text-slate-50">Laporan Keuangan</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link
                            class="group flex items-center rounded-lg py-2 pl-2 pr-2 text-gray-900 hover:rounded-none hover:border-b-2 hover:border-white hover:bg-transparent focus:bg-transparent dark:text-white dark:hover:bg-gray-700"
                            :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <img class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                src="{{ asset('assets/power-off-solid.svg') }}" alt="">
                            <span class="ms-3 flex-1 whitespace-nowrap text-slate-50"
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
