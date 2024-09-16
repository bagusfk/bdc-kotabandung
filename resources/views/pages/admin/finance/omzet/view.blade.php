<div class="relative overflow-x-auto sm:rounded-lg my-[1rem] min-h-[20rem]">
    <label for="" class="font-bold text-lg block text-center">Omzet</label>
    <table class="display nowrap text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pt-[.5rem]"
        id="dataTable3" style="width: 100%;">
        <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    No
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Bulan
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Omzet / Bulan (Rp .)
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Jumlah Omzet (Rp .) (Akumulasi)
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Profit (Rp .)
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    #
                </th>
            </tr>
        </thead>
        @php
            $no = 1;
        @endphp
        <tbody id="dataList3">
            @if ($omzet->isEmpty())
                <!-- Anda dapat menambahkan pesan atau tindakan lain jika tidak ada data -->
            @else
                @foreach ($omzet as $omzets)
                    <tr>
                        <td class="px-6 py-4 text-center">
                            {{ $no++ }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ $omzets->month }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ 'Rp. ' . number_format($omzets->omzet, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ 'Rp. ' . number_format($omzets->total_omzet, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ 'Rp. ' . number_format($omzets->profit, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">

                            <button data-modal-target="editOmzet{{ $omzets->id }}"
                                data-modal-toggle="editOmzet{{ $omzets->id }}"
                                class="text-teal-400 border border-teal-400 p-1.5" type="button">
                                Edit
                            </button>

                            <div id="editOmzet{{ $omzets->id }}" tabindex="-1" role="dialog"
                                class="fixed top-0 modal left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-2xl max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <div
                                            class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Edit Data
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="editOmzet{{ $omzets->id }}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>

                                        <!-- Modal Body with Form -->
                                        <div class="p-6 space-y-6">
                                            <form id="createForm" action="{{ route('omzet_update', $omzets->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" class="hidden" value="{{ $omzets->id }}">
                                                <div class="mb-4">
                                                    <label for="month"
                                                        class="block text-sm font-medium text-gray-700">Bulan</label>
                                                    <input type="text" name="month" id="month"
                                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                        value="{{ $omzets->month }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="omzet"
                                                        class="block text-sm font-medium text-gray-700">Omzet / Bulan
                                                        (Rp .)
                                                    </label>
                                                    <input type="number" name="omzet" id="omzet"
                                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                        value="{{ $omzets->omzet }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="total_omzet"
                                                        class="block text-sm font-medium text-gray-700">Jumlah Omzet (Rp
                                                        .) (Akumulasi)</label>
                                                    <input type="number" name="total_omzet" id="total_omzet"
                                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                        value="{{ $omzets->total_omzet }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="profit"
                                                        class="block text-sm font-medium text-gray-700">Profit</label>
                                                    <input type="number" name="profit" id="profit"
                                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                        value="{{ $omzets->profit }}">
                                                </div>
                                                <div class="flex justify-end mt-6">
                                                    <button type="button"
                                                        class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2"
                                                        data-modal-hide="editOmzet{{ $omzets->id }}">Close</button>
                                                    <button type="submit"
                                                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button data-modal-target="popup-modal{{ $omzets->id }}"
                                data-modal-toggle="popup-modal{{ $omzets->id }}"
                                class="text-red-600 border border-red-600 p-1.5" type="button">
                                Hapus
                            </button>

                            <div id="popup-modal{{ $omzets->id }}" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="popup-modal{{ $omzets->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                Hapus?</h3>
                                            <form action="{{ url('omzet_destroy/' . $omzets->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button data-modal-hide="popup-modal3" type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Hapus
                                                </button>
                                            </form>
                                            <button data-modal-hide="popup-modal3" type="button"
                                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Jumlah Profit Tahun 2024 :</th>
                <th></th> <!-- This is where the total will be displayed -->
            </tr>
        </tfoot>
    </table>
    <p class="text-xs text-red-600">* Jika ingin membuat laporan berdasarkan bulan maka isi pada inputan search (Contoh
        :
        januari)</p>
    <p class="text-xs text-red-600">* Jika ingin membuat laporan berdasarkan tahun maka isi pada inputan search (Contoh
        :
        2024)</p>
    <p class="text-xs text-red-600">* Jika ingin membuat laporan berdasarkan bulan dan tahun maka isi pada inputan
        search
        (Contoh : januari 2024)</p>
</div>

<button type="button" class="btn btn-primary" data-modal-toggle="createModalOmzet"
    data-modal-target="createModalOmzet" style="display:none;" id="createAddOmzet">Add</button>


<div id="createModalOmzet" tabindex="-1" role="dialog"
    class="fixed top-0 modal left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative max-w-6xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Data
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="createModalOmzet">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-6 space-y-6">
                <form id="createForm" action="{{ route('omzet_store') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="bulan" class="block text-sm font-medium text-gray-700">Bulan</label>
                        <input onkeypress="" type="text" name="month" id="bulan"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="omzet_bulan" class="block text-sm font-medium text-gray-700">Omzet / Bulan (Rp
                            .)</label>
                        <input onkeypress="" type="number" name="omzet" id="omzet_bulan"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="jumlah_omzet" class="block text-sm font-medium text-gray-700">Jumlah Omzet (Rp
                            .) (Akumulasi)</label>
                        <input onkeypress="" type="number" name="total_omzet" id="jumlah_omzet"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="profit" class="block text-sm font-medium text-gray-700">Profit</label>
                        <input onkeypress="" type="number" name="profit" id="profit"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit"
                            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
