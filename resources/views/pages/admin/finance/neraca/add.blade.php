<div id="neraca_content">

    <div class="mt-[1rem]">
        @if (session('delete'))
            <div id="alert-2"
                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {!! html_entity_decode(session('delete')) !!}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @elseif (session('status'))
            <div id="alert-1"
                class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {!! html_entity_decode(session('status')) !!}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
    <div class="relative overflow-x-auto my-[1rem] min-h-[20rem]">
        <label for="" class="font-bold text-lg block text-center">Neraca</label>
        <table class="table12 display nowrap" id="dataTable1" width="100%" cellspacing="0" cellpadding="10">
            @foreach ($neraca as $neracas)
                @php
                    $harga_peroleh =
                        $neracas->persediaan_barang_awal +
                        $neracas->pembelian_barang +
                        $neracas->biaya_pengiriman +
                        $neracas->biaya_lain;
                @endphp
                <thead>
                    <tr>
                        <td>KODE</td>
                        <td>PENJUALAN DAN PENDAPATAN</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody id="dataList">
                    <tr>
                        <td>4100</td>
                        <td>Penjualan</td>
                        <td></td>
                        <td>{{ $neracas->penjualan }}</td>
                    </tr>
                    <tr>
                        <td>4120</td>
                        <td>Diskon</td>
                        <td></td>
                        <td>{{ $neracas->diskon }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Jumlah Penjualan</td>
                        <td></td>
                        <td>{{ 'Rp' . number_format($neracas->penjualan + $neracas->diskon, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>PENDAPATAN</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4300</td>
                        <td>Pendapatan Komisi</td>
                        <td></td>
                        <td>{{ $neracas->pendapatan_komisi }}</td>
                    </tr>
                    <tr>
                        <td>4400</td>
                        <td>Jasa Bank</td>
                        <td></td>
                        <td>{{ $neracas->jasa_bank }}</td>
                    </tr>
                    <tr>
                        <td>4500</td>
                        <td>Pendapatan Lainnya</td>
                        <td></td>
                        <td>{{ $neracas->pendapatan_lainnya }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Jumlah Pendapatan</td>
                        <td></td>
                        <td>{{ 'Rp . ' . number_format($neracas->jasa_bank + $neracas->pendapatan_lainnya + $neracas->pendapatan_komisi, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>TOTAL PENJUALAN DAN PENDAPATAN</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Persediaan Barang Dagang Awal</td>
                        <td></td>
                        <td>{{ $neracas->persediaan_barang_awal }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Harga Pokok Penjualan</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5010</td>
                        <td>Pembelian Barang</td>
                        <td></td>
                        <td>{{ $neracas->pembelian_barang }}</td>
                    </tr>
                    <tr>
                        <td>5020</td>
                        <td>Biaya Pengiriman Barang</td>
                        <td></td>
                        <td>{{ $neracas->biaya_pengiriman }}</td>
                    </tr>
                    <tr>
                        <td>5030</td>
                        <td>Biaya Lain-lain</td>
                        <td></td>
                        <td>{{ $neracas->biaya_lain }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Harga Perolehan</td>
                        <td></td>
                        <td>{{ 'Rp . ' . number_format($harga_peroleh, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Persediaan Barang Dagang Akhir</td>
                        <td></td>
                        <td>{{ $neracas->persediaan_barang_akhir }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Harga Pokok Penjualan</td>
                        <td></td>
                        <td>{{ 'Rp . ' . number_format($harga_peroleh - $neracas->persediaan_barang_akhir, 0, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>

    <button type="button" class="btn btn-primary" data-modal-toggle="tableModal1" data-modal-target="tableModal1"
        style="display:none;" id="createModal1">Add</button>

    <div id="tableModal1" tabindex="-1" role="dialog"
        class="fixed top-0 modal left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Data
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="tableModal1">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal Body with Form -->
                <div class="p-6 space-y-6">
                    <form id="createForm" action="{{ route('neraca_store') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Penjualan -->
                        <div class="mb-4">
                            <label for="penjualan" class="block text-sm font-medium text-gray-700">Penjualan</label>
                            <input type="number" name="penjualan" id="penjualan"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                required>
                        </div>
                        <!-- Diskon -->
                        <div class="mb-4">
                            <label for="diskon" class="block text-sm font-medium text-gray-700">Diskon</label>
                            <input type="number" name="diskon" id="diskon"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <!-- Pendapatan Komisi -->
                        <div class="mb-4">
                            <label for="pendapatan_komisi" class="block text-sm font-medium text-gray-700">Pendapatan
                                Komisi</label>
                            <input type="number" name="pendapatan_komisi" id="pendapatan_komisi"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <!-- Jasa Bank -->
                        <div class="mb-4">
                            <label for="jasa_bank" class="block text-sm font-medium text-gray-700">Jasa Bank</label>
                            <input type="number" name="jasa_bank" id="jasa_bank"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <!-- Pendapatan Lainnya -->
                        <div class="mb-4">
                            <label for="pendapatan_lainnya" class="block text-sm font-medium text-gray-700">Pendapatan
                                Lainnya</label>
                            <input type="number" name="pendapatan_lainnya" id="pendapatan_lainnya"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <!-- Persediaan Barang Dagang Awal -->
                        <div class="mb-4">
                            <label for="persediaan_barang_awal"
                                class="block text-sm font-medium text-gray-700">Persediaan Barang Dagang Awal</label>
                            <input type="number" name="persediaan_barang_awal" id="persediaan_barang_awal"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <!-- Pembelian Barang -->
                        <div class="mb-4">
                            <label for="pembelian_barang" class="block text-sm font-medium text-gray-700">Pembelian
                                Barang</label>
                            <input type="number" name="pembelian_barang" id="pembelian_barang"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <!-- Biaya Pengiriman Barang -->
                        <div class="mb-4">
                            <label for="biaya_pengiriman" class="block text-sm font-medium text-gray-700">Biaya
                                Pengiriman Barang</label>
                            <input type="number" name="biaya_pengiriman" id="biaya_pengiriman"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <!-- Biaya Lain-lain -->
                        <div class="mb-4">
                            <label for="biaya_lain" class="block text-sm font-medium text-gray-700">Biaya
                                Lain-lain</label>
                            <input type="number" name="biaya_lain" id="biaya_lain"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <!-- Persediaan Barang Dagang Akhir -->
                        <div class="mb-4">
                            <label for="persediaan_barang_akhir"
                                class="block text-sm font-medium text-gray-700">Persediaan Barang Dagang Akhir</label>
                            <input type="number" name="persediaan_barang_akhir" id="persediaan_barang_akhir"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Modal Footer with Submit Button -->
                        <div class="flex justify-end mt-6">
                            <button type="button"
                                class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2"
                                data-modal-toggle="tableModal1">Close</button>
                            <button type="submit"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
