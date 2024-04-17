<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        </h2>
    </x-slot>
    <h1 class="w-48 ml-8 pt-10 mb-5 text-3xl">Keranjang</h1>
    <div class="flex gap-8 px-[2rem]  max-w-7xl mx-auto mb-4">
        <div class="bag1 flex-col w-[60rem]">
            <div class="select_all border-black border rounded p-2">
                <input type="checkbox" name="select_all" class="rounded">
                <label for="select_all">Pilih Semua</label>
            </div>
            <div class="select_with_store border-black border rounded p-2 mt-5">
                <input type="checkbox" name="store_name" class="rounded">
                <label for="store_name">Nama Toko</label>
                <ul class="ml-5 mt-3">
                    <li class="mb-3 flex gap-4">
                        <input type="checkbox" name="item_name" class="rounded mt-6">
                        <img src="{{asset('storage/img/kursi.png')}}" alt="" class="w-16 h-16">
                        <label for="item_name" class="mt-5">Nama Barang</label>
                        <div class="ml-72">
                            <span class="price">Rp.500.000</span>
                            <form class="mt-7">
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
                                    <input type="text" id="counter-input" data-input-counter
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
                    </li>
                    <li class="mb-3 flex gap-4">
                        <input type="checkbox" name="item_name" class="rounded mt-6">
                        <img src="{{asset('storage/img/kursi.png')}}" alt="" class="w-16 h-16">
                        <label for="item_name" class="mt-5">Nama Barang</label>
                        <div class="con  ml-72">
                            <span class="price">Rp.500.000</span>
                            <form class="mt-7">
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
                                    <input type="text" id="counter-input" data-input-counter
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
                    </li>
                </ul>
            </div>
            <div class="select_with_store border-black border rounded p-2 mt-5">
                <input type="checkbox" name="store_name" class="rounded">
                <label for="store_name">Nama Toko</label>
                <ul class="ml-5 mt-3">
                    <li class="mb-3 flex gap-4">
                        <input type="checkbox" name="item_name" class="rounded mt-6">
                        <img src="{{asset('storage/img/kursi.png')}}" alt="" class="w-16 h-16">
                        <label for="item_name" class="mt-5">Nama Barang</label>
                        <div class="con  ml-72">
                            <span class="price">Rp.500.000</span>
                            <form class="mt-7">
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
                                    <input type="text" id="counter-input" data-input-counter
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
                    </li>
                    <li class="mb-3 flex gap-4">
                        <input type="checkbox" name="item_name" class="rounded mt-6">
                        <img src="{{asset('storage/img/kursi.png')}}" alt="" class="w-16 h-16">
                        <label for="item_name" class="mt-5">Nama Barang</label>
                        <div class="con  ml-72">
                            <span class="price">Rp.500.000</span>
                            <form class="mt-7">
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
                                    <input type="text" id="counter-input" data-input-counter
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
                    </li>
                </ul>
            </div>

        </div>
        <div class="bag2 flex-col">
            <div class="container border-black border p-2 pr-24 rounded">
                <h1 class="mb-3">Ringkasan Belanja</h1>
                <div class="flex gap-24 mb-3">
                    <span>Harga</span>
                    <span>Rp.500.000</span>
                </div>
                <button class="bg-green-500 p-2 px-5 rounded text-white">
                    Bayar
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
