<div class="relative overflow-x-auto my-[1rem] min-h-[20rem]">
    <label for="" class="font-bold text-lg block text-center">Neraca</label>
    <table class="text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pt-[.5rem] display nowrap"
        id="dataTable1" width="100%" cellspacing="0" cellpadding="10">
        <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">NO</th>
                <th scope="col" class="px-6 py-3 text-center">TANGGAL</th>
                <th scope="col" class="px-6 py-3 text-center">KODE</th>
                <th scope="col" class="px-6 py-3 text-center">KETERANGAN</th>
                <th scope="col" class="px-6 py-3 text-center">DEBIT</th>
                <th scope="col" class="px-6 py-3 text-center">KREDIT</th>
                <th scope="col" class="px-6 py-3 text-center">#</th>
            </tr>
        </thead>
        <tbody id="dataList">
            @php
                $nos = 1;
            @endphp
            @foreach ($neraca as $neracas)
                <tr>
                    <td>{{ $nos++ }}</td>
                    <td>{{ \Carbon\Carbon::parse($neracas->dated)->translatedFormat('d F Y') }}</td>
                    <td>{{ $neracas->kode }}</td>
                    <td>{{ $neracas->description }}</td>
                    <td>{{ $neracas->debit }}</td>
                    <td>{{ $neracas->kredit }}</td>
                    <td>
                        <button data-modal-target="editNeraca{{ $neracas->id }}"
                            data-modal-toggle="editNeraca{{ $neracas->id }}"
                            class="text-teal-400 border border-teal-400 p-1.5" type="button">
                            Edit
                        </button>

                        <div id="editNeraca{{ $neracas->id }}" tabindex="-1" role="dialog"
                            class="fixed top-0 modal left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div
                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Tambah Data
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="editNeraca{{ $neracas->id }}">
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
                                        <form id="createForm" action="{{ route('neraca_update', $neracas->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" class="hidden" value="{{ $neracas->id }}">
                                            <div class="mb-4">
                                                <label for="dated"
                                                    class="block text-sm font-medium text-gray-700">Tanggal</label>
                                                <input type="date" name="dated" id="dated"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                    value="{{ $neracas->dated }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="kode"
                                                    class="block text-sm font-medium text-gray-700">Kode</label>
                                                <input type="text" name="kode" id="kode"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                    value="{{ $neracas->kode }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="description"
                                                    class="block text-sm font-medium text-gray-700">Keterangan</label>
                                                <input type="text" name="description" id="description"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                    value="{{ $neracas->description }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="debit"
                                                    class="block text-sm font-medium text-gray-700">Debit</label>
                                                <input type="number" name="debit" id="debit"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                    value="{{ $neracas->debit }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="kredit"
                                                    class="block text-sm font-medium text-gray-700">Kredit</label>
                                                <input type="number" name="kredit" id="kredit"
                                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                    value="{{ $neracas->kredit }}">
                                            </div>
                                            <div class="flex justify-end mt-6">
                                                <button type="button"
                                                    class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2"
                                                    data-modal-hide="editNeraca{{ $neracas->id }}">Close</button>
                                                <button type="submit"
                                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button data-modal-target="neraca{{ $neracas->id }}"
                            data-modal-toggle="neraca{{ $neracas->id }}"
                            class="text-red-600 border border-red-600 p-1.5" type="button">
                            Hapus
                        </button>

                        <div id="neraca{{ $neracas->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="neraca{{ $neracas->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
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
                                        <form action="{{ url('neraca_destroy/' . $neracas->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button data-modal-hide="neraca3" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Hapus
                                            </button>
                                        </form>
                                        <button data-modal-hide="neraca3" type="button"
                                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" style="text-align:right">Total:</th>
                <th></th>
                <th></th>
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

<button type="button" class="btn btn-primary" data-modal-toggle="tableModal1" data-modal-target="tableModal1"
    style="display:none;" id="createModal1">Add</button>

<div id="tableModal1" tabindex="-1" role="dialog"
    class="fixed top-0 modal left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Data
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
                    <div class="mb-4">
                        <label for="dated" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="dated" id="dated"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="kode" class="block text-sm font-medium text-gray-700">Kode</label>
                        <input type="text" name="kode" id="kode"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Keterangan</label>
                        <input type="text" name="description" id="description"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="debit" class="block text-sm font-medium text-gray-700">Debit</label>
                        <input type="number" name="debit" id="debit"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="mb-4">
                        <label for="kredit" class="block text-sm font-medium text-gray-700">Kredit</label>
                        <input type="number" name="kredit" id="kredit"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
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
