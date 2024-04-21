<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        </h2>
    </x-slot>
    <h1 class="w-48 ml-8 pt-10 mb-5 text-3xl">Pesanan Saya</h1>
    <div class="grid grid-cols-3 gap-6 max-w-7xl mx-auto mb-4">
        <div class="bag1 col-span-2 flex-col w-full">
            <div class="select_with_store border-slate-300 border py-2 px-3 bg-white mt-2 rounded-lg">
                <div class="flex justify-between items-center gap-3 border-b-2 py-2">
                    <div class="flex flex-wrap items-center gap-3">
                        <div class="font-bold">Nama Toko</div>
                        <div class="text-sm">INV0180912983172041924</div>
                        <div class="text-sm border border-blue-500 px-2 py-1 rounded-md text-blue-500">Belum dibayar</div>
                        <div class="text-sm bg-blue-500 px-2 py-1 rounded-md text-white">Dikemas</div>
                        <div class="text-sm bg-yellow-300 px-2 py-1 rounded-md text-white">Shipping</div>
                        <div class="text-sm bg-green-500 px-2 py-1 rounded-md text-white">Selesai</div>
                        <div class="text-sm bg-red-500 px-2 py-1 rounded-md text-white">Cancle</div>
                    </div>
                    <a href="" class="text-primary">Lacak Pesanan></a>
                </div>
                <div class="flex justify-between py-4">
                    <div class="gap-3 flex items-start">
                        <img src="{{asset('storage/img/kursi.png')}}" alt="" class="w-16 h-16">
                        <div>
                            <div class="font-bold">Nama Barang</div>
                            <div class="">1x Barang Rp15.000</div>
                        </div>
                    </div>
                    <div class="">
                        <div class="font-bold">Total Belanja</div>
                        <span class="price">Rp.500.000</span>
                    </div>
                </div>
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="flex justify-center items-center gap-3 border-b-2 border-t-2 py-2 w-full hover:bg-slate-50" type="button">
                    Tampilkan barang lainnya
                </button>
                <div class="flex items-center justify-end gap-8 py-3">
                    <!-- Modal toggle -->
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-primary hover:bg-sky-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800" type="button">
                        Lihat Detail Transaksi
                    </button>
                </div>
            </div>
        </div>
        {{-- <div class="bag2 col-span-1 flex-col w-full">
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
        </div> --}}
        {{-- <div class="col-span-2 bg-red-400 h-10"></div>
        <div class="col-span-1 bg-red-400 h-10"></div> --}}
    </div>

    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Detail Transaksi
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <div class="border-b py-2">
                        <div class="flex items-center gap-2">
                            <div class="text-sm border border-blue-500 px-2 py-1 rounded-md text-blue-500">Belum dibayar</div>
                            <div class="text-sm bg-blue-500 px-2 py-1 rounded-md text-white">Dikemas</div>
                            <div class="text-sm bg-yellow-300 px-2 py-1 rounded-md text-white">Shipping</div>
                            <div class="text-sm bg-green-500 px-2 py-1 rounded-md text-white">Selesai</div>
                            <div class="text-sm bg-red-500 px-2 py-1 rounded-md text-white">Cancle</div>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <div class="font-bold">No Invoice</div>
                            <a href="#" class="text-sm text-primary">INV0180912983172041924</a>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="font-bold">Tanggal Pembelian</div>
                            <div class="text-sm">12-12-2024</div>
                        </div>
                    </div>
                    <div class="border-b py-2">
                        <div class="flex items-center justify-between py-2">
                            <div class="font-bold">Detail Produk</div>
                            <div class="text-sm">(Nama Toko)</div>
                        </div>
                        {{-- list barang yang dibeli --}}
                        <div class="flex justify-between border border-slate-300 rounded-lg py-2 px-2 mb-2">
                            <div class="gap-3 flex items-start">
                                <img src="{{asset('storage/img/kursi.png')}}" alt="" class="w-16 h-16">
                                <div>
                                    <div class="font-bold">Nama Barang</div>
                                    <div class="">1x Barang Rp15.000</div>
                                </div>
                            </div>
                            <div class="">
                                <span class="price">Rp.500.000</span>
                            </div>
                        </div>
                        <div class="flex justify-between border border-slate-300 rounded-lg py-2 px-2 mb-2">
                            <div class="gap-3 flex items-start">
                                <img src="{{asset('storage/img/kursi.png')}}" alt="" class="w-16 h-16">
                                <div>
                                    <div class="font-bold">Nama Barang</div>
                                    <div class="">1x Barang Rp15.000</div>
                                </div>
                            </div>
                            <div class="">
                                <span class="price">Rp.500.000</span>
                            </div>
                        </div>
                        {{-- End list barang yang dibeli --}}
                        <div class="flex justify-between border border-slate-300 rounded-lg py-2 px-2 mb-2">
                            <div class="gap-3 flex items-start">
                                <div class="font-bold">Total Harga</div>
                            </div>
                            <div class="">
                                <span class="price text-primary font-bold">Rp.1000.000</span>
                            </div>
                        </div>
                    </div>

                    {{-- Info Pengiriman --}}
                    <div class="border-b py-2">
                        <div class="flex items-center justify-between py-2">
                            <div class="font-bold text-lg">Info Pengiriman</div>
                        </div>
                        <div class="flex justify-between mb-2">
                            <div class="gap-3 flex items-start">
                                <div class="font-bold">Kurir</div>
                            </div>
                            <div class="">
                                <span class="price">JNT</span>
                            </div>
                        </div>
                        <div class="flex justify-between mb-2">
                            <div class="gap-3 flex items-start">
                                <div class="font-bold">No Resi</div>
                            </div>
                            <div class="">
                                <span class="price">JNT098709809</span>
                            </div>
                        </div>
                        <div class="flex justify-between mb-2">
                            <div class="gap-3 flex items-start">
                                <div class="font-bold">Aamat</div>
                            </div>
                            <div class="flex flex-col items-end">
                                <div class="price font-bold">Bagus Farhan Kirana</div>
                                <div class="price font-semibold">08123456789</div>
                                <div class="price">Jl. Juriman blok adawd ahdsoai oahoid aowdhoid adoh</div>
                            </div>
                        </div>
                    </div>
                    {{-- End Info Pengiriman --}}

                    {{-- Info Pembayaran --}}
                    <div class="py-2">
                        <div class="flex items-center justify-between py-2">
                            <div class="font-bold text-lg">Rincian Pembayaran</div>
                        </div>
                        <div class="flex justify-between mb-2">
                            <div class="gap-3 flex items-start">
                                <div class="font-bold">Metode Pembayaran</div>
                            </div>
                            <div class="">
                                <span class="price">Bank Transfer - BNI</span>
                            </div>
                        </div>
                        <div class="flex justify-between mb-2">
                            <div class="gap-3 flex items-start">
                                <div class="font-bold">Total Harga (1 Barang)</div>
                            </div>
                            <div class="">
                                <span class="price">Rp500.000</span>
                            </div>
                        </div>
                        <div class="flex justify-between mb-2">
                            <div class="gap-3 flex items-start">
                                <div class="font-bold">Total Ongkos</div>
                            </div>
                            <div class="">
                                <span class="price">Rp9.000</span>
                            </div>
                        </div>
                        <div class="flex justify-between mb-2 mt-2 border-t">
                            <div class="gap-3 flex items-start">
                                <div class="font-bold text-xl">Total Belanja</div>
                            </div>
                            <div class="">
                                <div class="price font-bold text-xl text-primary">Rp509.000</div>
                            </div>
                        </div>
                    </div>
                    {{-- End Info Pembayaran --}}
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="button" class="text-white bg-primary hover:bg-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 w-full text-center">Tanya Admin</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
