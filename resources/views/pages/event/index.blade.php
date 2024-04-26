<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 pb-12 md:grid-cols-1 lg:grid-cols-2">
                <div class="flex flex-col w-full gap-4 px-8 py-12 bg-white border-2 border-slate-200 rounded-b-xl">
                    <h1 class="text-2xl font-[1000] tracking-tight text-gray-900 dark:text-white">Galery Event</h1>
                    <div class="flex items-center justify-center bg-blue-300 h-96"> untuk slide galery</div>
                </div>
                <div class="flex flex-col justify-center w-full">
                    <h1 class="text-[40px] leading-10 font-[1000] text-primary dark:text-white">
                        Temukan event seru untuk kamu dan teman-teman kamu disini!
                    </h1>
                    <p class="mt-4 font-bold text-gray-400">Pilih dan ikuti beragam event seru dan menarik dari BDC.</p>
                </div>
            </div>
            <div class="py-4 mb-8 text-xl font-semibold">Event Terbaru</div>
            <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
                {{-- @foreach($events as $event) --}}
                    <div class="duration-300 ease-out bg-white border border-gray-200 rounded-lg shadow hover:scale-105 dark:bg-gray-800 dark:border-gray-700">
                        <img class="object-cover rounded-t-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="product image" />
                        <div class="px-8 pb-5 mt-8">
                            <div data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal" type="button" class="cursor-pointer">
                                <h2 class="hover:underline text-2xl font-[1000] tracking-tight text-gray-900 dark:text-white line-clamp-2">Apple Watch Series 7 GPS, Aluminium Case, Starlight Sport</h2>
                            </div>
                            <div class="py-4 text-sm">
                                <div class="text-primary">12 Des 2024 - 30 Des 2024</div>
                                <div class="text-primary">Bandung, lorem ipsum dolor</div>
                            </div>
                            <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400 line-clamp-3">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                            {{-- <a href="#" class="text-white flex items-center gap-4 w-fit bg-primary hover:bg-sky-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-sky-500 dark:focus:ring-blue-400">
                                Details
                            </a> --}}
                            <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal" class="text-white flex items-center gap-4 w-fit bg-primary hover:bg-sky-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-sky-500 dark:focus:ring-blue-400" type="button">
                                Details
                                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>

    <!-- Extra Large Modal -->
    <div id="extralarge-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 pb-16 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-h-full max-w-7xl">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        Detail Event
                    </h3>
                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="extralarge-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="grid gap-16 px-16 py-4 space-y-4 lg:grid-cols-3 grid-col-1 md:py-5">
                    <div class="col-span-2">
                        <div class="py-4">
                            <h2 class="hover:underline text-2xl font-[1000] tracking-tight text-gray-900 dark:text-white line-clamp-2">Apple Watch Series 7 GPS, Aluminium Case, Starlight Sport</h2>
                        </div>
                        <div class="pb-8">
                            <img class="object-cover rounded-t-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="product image" />
                        </div>
                        <div class="py-2">
                            <h2 class="text-2xl ">Deskripsi</h2>
                        </div>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                        </p>
                    </div>
                    <div class="">
                        <div class="px-4 py-6 border-2 rounded-xl bg-sky-100 border-primary">Anda telah mendaftar pada event ini, tunggu informasi selanjutnya.</div>
                        <div class="px-4 py-6 bg-red-100 border-2 border-red-400 rounded-xl">Pendaftaran anda telah ditolak, ayo lengkapi perizinan dan tingkatkan lagi kualitas produk kamu.</div>
                        <div class="px-4 py-6 bg-green-100 border-2 border-green-400 rounded-xl">Pendaftaran anda telah diterima, tunggu konfirmasi selanjutnya.</div>
                        <div class="py-2">
                            <h2 class="text-2xl ">Jadwal Pelakasanaan Event</h2>
                        </div>
                        <div class="">
                            <div>
                                <dt>Mulai</dt>
                                <dd>12 Desember 2024</dd>
                            </div>
                            <div>
                                <dt>Selesai</dt>
                                <dd>30 Desember 2024</dd>
                            </div>
                        </div>
                        <div>
                            <div class="py-2">
                                <h2 class="text-2xl ">Lokasi</h2>
                            </div>
                            <div class="">
                                <div>Bandung, asdasd asdasd</div>
                            </div>
                        </div>
                        <div class="my-8">
                            <a href="#" type="button" class="flex justify-center w-full px-3 py-2 text-white bg-primary rounded-xl">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
