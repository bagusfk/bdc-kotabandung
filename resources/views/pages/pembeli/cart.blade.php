<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        </h2>
    </x-slot>
    <h1 class="w-48 pt-10 mb-5 ml-8 text-3xl">Keranjang</h1>
    <div class="grid grid-cols-3 gap-6 mx-auto mb-4 max-w-7xl">
        <div class="flex-col w-full col-span-2 bag1">
            <div class="flex items-center gap-3 p-2 bg-white border rounded-t-lg select_all border-slate-300">
                <input type="checkbox" name="select_all" class="rounded">
                <label for="select_all">Pilih Semua</label>
            </div>
            <div class="p-2 mt-2 bg-white border select_with_store border-slate-300">
                <div class="flex items-center gap-3 py-2 border-b-2">
                    <input type="checkbox" name="store_name" class="rounded">
                    <label for="store_name" class="font-bold">Nama Toko</label>
                </div>
                <div class="flex justify-between py-4">
                    <div class="flex items-start gap-3">
                        <input type="checkbox" name="item_name" class="rounded">
                        <img src="{{asset('storage/img/kursi.png')}}" alt="" class="w-16 h-16">
                        <label for="item_name" class="">Nama Barang</label>
                    </div>
                    <div class="">
                        <span class="price">Rp.500.000</span>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-8">
                    <a href="#" class="font-medium text-red-500">Hapus</a>
                    <form class="">
                        <div class="relative items-center mx-auto">
                            <button type="button" id="decrement-button"
                                data-input-counter-decrement="counter-input"
                                class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            <input type="text" id="counter-input" data-input-counter data-input-counter-min="1" data-input-counter-max=""
                                class="flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center"
                                placeholder="" value="1" required />
                            <button type="button" id="increment-button"
                                data-input-counter-increment="counter-input"
                                class="inline-flex items-center justify-center flex-shrink-0 w-5 h-5 bg-gray-100 border border-gray-300 rounded-md dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex-col w-full col-span-1 bag2">
            <div class="container p-2 bg-white border rounded-lg border-slate-300">
                <h1 class="mb-3 font-extrabold">Ringkasan Belanja</h1>
                <div class="flex justify-between mb-3">
                    <span>Total Belanja</span>
                    <span>Rp.500.000</span>
                </div>
                <button class="w-full p-2 px-5 text-white rounded bg-primary">
                    Bayar
                </button>
            </div>
        </div>
        {{-- <div class="h-10 col-span-2 bg-red-400"></div>
        <div class="h-10 col-span-1 bg-red-400"></div> --}}
    </div>
</x-app-layout>
