<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <style>
            .swiper {
                width: 100%;
                height: 100%;
            }

            .swiper-slide {
                text-align: center;
                font-size: 18px;
                background: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .swiper-slide img {
                display: block;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }

            @keyframes fadeOut {
                from {
                    opacity: 1;
                }
                to {
                    opacity: 0;
                }
            }

            .fade-in {
                animation: fadeIn 0.3s ease-in-out; /* Sesuaikan durasi dan efek animasi sesuai kebutuhan */
            }

            .fade-out {
                animation: fadeOut 0.3s ease-in-out; /* Sesuaikan durasi dan efek animasi sesuai kebutuhan */
            }

            .bg-pattern {
                --s: 100px; /* control the size*/
                --c1: #ffffff;
                --c2: #f5f5f5;

                background:
                    repeating-conic-gradient(var(--c1) 0 45deg,var(--c2) 0 90deg)
                    0/var(--s) var(--s);
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        {{-- Loader --}}
        <div id="loader" class="fixed top-0 left-0 z-50 flex items-center justify-center w-screen h-screen bg-black bg-opacity-50">
            <div class="w-32 h-32 border-t-2 border-b-2 border-white rounded-full animate-spin"></div>
        </div>
        <div class="fixed z-20 w-full">
            @include('layouts.navigation')
        </div>
        <div class="min-h-screen bg-white dark:bg-gray-900">

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow dark:bg-gray-800">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
                @include('layouts.footer')
            </main>
        </div>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- Loader -->
        <script>
            window.addEventListener('DOMContentLoaded', function () {
                // Tampilkan loader saat halaman dimuat
                document.getElementById('loader').classList.remove('hidden');
            });

            window.addEventListener('load', function () {
                // Sembunyikan loader setelah halaman selesai dimuat
                setTimeout(function() {
                    document.getElementById('loader').classList.add('hidden');
                }, 2000);
            });
        </script>

    </body>
</html>
