<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        </h2>
    </x-slot>
    <h1 class="w-48 ml-8 pt-10 mb-5 text-3xl">Keranjang</h1>
    <div class="grid grid-cols-3 gap-6 max-w-7xl mx-auto mb-4">
        <div class="bag1 col-span-2 flex-col w-full">
            <div class="select_all border-slate-300 border rounded-t-lg p-2 bg-white flex items-center gap-3">
                <input type="checkbox" name="select_all" class="rounded">
                <label for="select_all">Pilih Semua</label>
            </div>
            <div class="select_with_store border-slate-300 border p-2 bg-white mt-2">
                <div class="flex items-center gap-3 border-b-2 py-2">
                    <input type="checkbox" name="store_name" class="rounded">
                    <label for="store_name" class="font-bold">Nama Toko</label>
                </div>
                <div class="flex justify-between py-4">
                    <div class="gap-3 flex items-start">
                        <input type="checkbox" name="item_name" class="rounded">
                        <img src="{{asset('storage/img/kursi.png')}}" alt="" class="w-16 h-16">
                        <label for="item_name" class="">Nama Barang</label>
                    </div>
                    <div class="">
                        <span class="price">Rp.500.000</span>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-8">
                    <a href="#" class="text-red-500 font-medium">Hapus</a>
                    <form class="">
                        <div class="relative mx-auto items-center">
                            <button type="button" id="decrement-button"
                                data-input-counter-decrement="counter-input"
                                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
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
                                class="flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-md h-5 w-5 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
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
        <div class="bag2 col-span-1 flex-col w-full">
            <div class="container border-slate-300 border p-2 rounded-lg bg-white">
                <h1 class="mb-3 font-extrabold">Ringkasan Belanja</h1>
                <div class="flex mb-3 justify-between">
                    <span>Total Belanja</span>
                    <span>Rp.500.000</span>
                </div>
                <button class="bg-primary p-2 px-5 rounded text-white w-full">
                    Bayar
                </button>
            </div>
        </div>
        {{-- <div class="col-span-2 bg-red-400 h-10"></div>
        <div class="col-span-1 bg-red-400 h-10"></div> --}}
    </div>
</x-app-layout>
