<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="min-h-screen bg-gray-200">
        @if (session('success'))
            <div x-data="{ isOpen: true }" x-show="isOpen" x-cloak x-init="$watch('isOpen', value => {
                if (value) {
                    document.body.classList.add('overflow-hidden');
                } else {
                    document.body.classList.remove('overflow-hidden');
                }
            })" style="display: none">
                <div class="fixed inset-0 z-50 flex items-center justify-center px-4">
                    <div class="flex w-[550px] flex-col gap-8 rounded-xl bg-white p-2">
                        <div class="modal-header flex w-full items-center justify-end">
                            {{-- <h5 class="text-lg font-bold">asdasd</h5> --}}
                            <button @click="isOpen = false"
                                class="px-2 text-3xl text-gray-500 hover:text-gray-700">&times;</button>
                        </div>
                        <div class="modal-body flex flex-col gap-2 px-8 text-center font-sans">
                            <div class="flex h-44 items-center justify-center">
                                <img src="{{ asset('assets\landing\illustrations\success.svg') }}" alt=""
                                    class="h-72">
                            </div>
                            <div class="text-3xl font-bold">Selamat</div>
                            <div class="text-xl">Kamu berhasil terdaftar sebagai anggota KSM, sekarang ayo kita
                                tambahkan produk kamu!</div>
                        </div>
                        <div class="modal-footer flex justify-center pb-4 pt-2">
                            <button @click="isOpen = false"
                                class="rounded-xl bg-blue-500 px-8 py-2 text-white">Oke</button>
                        </div>
                    </div>
                </div>
                <div class="fixed inset-0 z-40 bg-black opacity-50" @click="isOpen = false"></div>
            </div>
        @endif

        <nav class="sticky top-0 z-50 h-16 bg-white shadow-sm">
            <div class="mx-auto flex h-full max-w-7xl justify-between px-4">
                <div class="flex h-full w-fit gap-3">
                    <a href="{{ request()->routeIs('dashboard_ksm') ? '/' : '/dashboard-ksm' }}"
                        class="my-auto flex h-9 w-9 items-center justify-center rounded-full border border-black pr-1">
                        <svg class="h-6 w-6 text-gray-700 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m15 19-7-7 7-7" />
                        </svg>
                    </a>
                    <div class="my-auto flex h-12 items-center text-3xl font-bold text-gray-700">Dashboard KSM</div>
                </div>
                <div class="flex h-full items-center">
                    <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay"
                        data-dropdown-offset-distance="-80" data-dropdown-offset-skidding="40"
                        data-dropdown-placement="left" data-dropdown-delay="0" data-dropdown-trigger="hover"
                        class="flex items-center rounded-full pe-1 text-sm font-medium text-gray-900 hover:bg-gray-100 md:me-0"
                        type="button">
                        <span class="sr-only">Open user menu</span>
                        <img class="me-2 h-8 w-8 rounded-full"
                            src="{{ asset(Auth::user()->ksm()->first()->owner_picture ?? 'assets\default\image\default-picture.jpg') }}"
                            alt="user photo">
                        <div class="flex items-center">
                            {{ Auth::user()->name }}
                            <svg class="ms-3 h-2.5 w-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </div>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownDelay"
                        class="min-w-44 z-10 hidden divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700">
                        <div class="py-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                            {{-- <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="mx-auto grid max-w-7xl grid-cols-1 px-4 py-6 md:grid-cols-4 md:gap-1 lg:gap-2 lg:px-4">
            <div class="md:px-4">
                <div class="sticky flex flex-col gap-4 rounded-2xl bg-white px-2 pb-2 pt-6 md:top-[88px]">
                    <div class="flex flex-col items-center gap-2">
                        <div class="h-28 w-28 overflow-hidden rounded-full bg-blue-300">
                            {{-- replace to image --}}
                            <div class="h-full w-full overflow-clip bg-red-300">
                                <img class="me-2 h-full rounded-full"
                                    src="{{ asset(Auth::user()->ksm()->first()->owner_picture ?? 'assets\default\image\default-picture.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                        <div class="px-2 text-lg font-bold leading-none text-gray-800">{{ Auth::user()->name }}</div>
                        {{-- <div class="px-2 text-xs font-semibold text-red-500 border border-red-500 rounded-full bg-red-50">belum punya produk!</div>
                        <div class="px-2 text-xs font-semibold text-red-500 border border-red-500 rounded-full bg-red-50">belum terverifikasi!</div>
                        <div class="px-2 text-xs font-semibold text-red-500 border border-red-500 rounded-full bg-red-50">belum punya brand!</div> --}}
                        {{-- <div class="h-6 bg-blue-300 w-44"></div> --}}
                    </div>
                    {{-- <div class="px-2 text-sm font-bold leading-none text-gray-500">Kategori</div> --}}
                    <div class="h-full overflow-y-auto rounded-xl bg-gray-200 px-3 py-4">
                        <ul class="space-y-1 text-xs">
                            <li>
                                <a href="{{ route('dashboard_ksm') }}"
                                    class="{{ request()->routeIs('dashboard_ksm') ? 'font-bold border bg-primary text-white' : 'text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700' }} group flex items-center rounded-lg p-2">
                                    <span class="">Dashboard</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group">
                                    <span class="">list disini</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-span-3 flex flex-col gap-4">
                {{ $slot }}
            </div>
        </div>
    </main>
</body>

</html>
