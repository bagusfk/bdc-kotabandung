<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        {{-- Loader --}}
        <div id="loader" class="fixed top-0 left-0 z-50 w-screen h-screen flex justify-center items-center bg-black bg-opacity-50 hidden">
            <div class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-white"></div>
        </div>
        <div class="w-full fixed z-20">
            @include('layouts.navigation')
        </div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

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
