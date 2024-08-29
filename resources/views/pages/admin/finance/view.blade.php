@extends('layouts.appadmin')
@section('title', 'Kelola Penjualan')
@section('content')

    <style>
        th {
            white-space: nowrap;
        }

        select#dt-length-0 {
            padding-right: 2.5rem;
        }

        table.dataTable td.dt-type-numeric {
            text-align: center;
        }

        table.dataTable th.dt-type-numeric {
            text-align: left;
        }

        .dataTables_length>label>select {
            width: 75px;
        }

        .table12,
        .table12 td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

    <div class="flex justify-between">
        <div class="flex items-center">
            <svg class="w-6 h-6 inline-flex" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM176 256a112 112 0 1 1 224 0 112 112 0 1 1 -224 0zm76-48c0 9.7 6.9 17.7 16 19.6V276h-4c-11 0-20 9-20 20s9 20 20 20h24 24c11 0 20-9 20-20s-9-20-20-20h-4V208c0-11-9-20-20-20H272c-11 0-20 9-20 20z" />
            </svg>
            <span class="text-2xl font-semibold ml-[1rem]">Kelola Keuangan</span>
        </div>
    </div>

    <div class="w-fit flex mt-[1rem]">
        <label class="inline-flex items-center mr-4">
            <input class="rounded-full mr-2" type="radio" name="kategori" id="neraca_radio" value="neraca" checked>
            <p>Neraca</p>
        </label>
        <label class="inline-flex items-center mr-4">
            <input class="rounded-full mr-2" type="radio" name="kategori" id="labarugi_radio" value="labarugi">
            <p>Laba/Rugi</p>
        </label>
        <label class="inline-flex items-center">
            <input class="rounded-full mr-2" type="radio" name="kategori" id="omzet_radio" value="omzet">
            <p>Omzet</p>
        </label>
    </div>
    <div id="neraca_content">

        <div class="mt-[1rem]">
            @if (session('delete'))
                <div id="alert-2"
                    class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
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
        <div class="relative overflow-x-auto sm:rounded-lg my-[1rem] min-h-[20rem]">
            <label for="" class="font-bold text-lg block text-center">Neraca</label>
            <table class="display nowrap text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pt-[.5rem]"
                id="dataTable" style="width:100%;">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-center">Kas</th>
                        <th scope="col" class="px-6 py-3 text-center">Piutang</th>
                        <th scope="col" class="px-6 py-3 text-center">Perlengkapan</th>
                        <th scope="col" class="px-6 py-3 text-center">Peralatan</th>
                        <th scope="col" class="px-6 py-3 text-center">Utang</th>
                        <th scope="col" class="px-6 py-3 text-center">Modal</th>
                        <th scope="col" class="px-6 py-3 text-center">Keterangan</th>
                        <th scope="col" class="px-6 py-3 text-center">#</th>
                    </tr>
                </thead>
                <tbody id="dataList">
                    @foreach ($neraca as $data)
                        <tr class="text-center border-b border-black">
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">
                                {{ \Carbon\Carbon::parse($data->input_date)->format('d M Y') }}</td>
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">{{ $data->cash }}</td>
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">{{ $data->receivables }}</td>
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">{{ $data->supplies }}</td>
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">{{ $data->equipment }}</td>
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">{{ $data->debt }}</td>
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">{{ $data->capital }}</td>
                            <td class="pt-3 pb-1 px-6">{{ $data->information }}</td>
                            <td>
                                <button class="text-primary border border-primary p-1.5" data-modal-target="editModal"
                                    data-modal-toggle="editModal" onclick="editData({{ $data }})">Edit</button>


                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="text-red-600 border border-red-600 p-1.5" type="button">
                                    Hapus
                                </button>



                                <div id="popup-modal" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-modal">
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
                                                <form action="{{ url('neraca_destroy/' . $data->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-modal-hide="popup-modal" type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Hapus
                                                    </button>
                                                </form>
                                                <button data-modal-hide="popup-modal" type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Hidden button to trigger the modal -->
        <button type="button" class="btn btn-primary" data-modal-toggle="createModal" data-modal-target="createModal"
            style="display:none;" id="triggerCreateModalButton">Add</button>

        <!-- Modal HTML -->
        <div id="createModal" tabindex="-1" role="dialog"
            class="fixed top-0 modal left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Tambah Data Neraca
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="createModal">
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
                        <form id="createForm" action="{{ route('neraca_store') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="input_date" class="block text-sm font-medium text-gray-700">Tanggal</label>
                                <input type="date" name="input_date" id="input_date"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="cash" class="block text-sm font-medium text-gray-700">Kas</label>
                                <input onkeypress="" type="number" name="cash" id="cash"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="receivables" class="block text-sm font-medium text-gray-700">Piutang</label>
                                <input onkeypress="" type="number" name="receivables" id="receivables"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="supplies" class="block text-sm font-medium text-gray-700">Perlengkapan</label>
                                <input onkeypress="" type="number" name="supplies" id="supplies"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="equipment" class="block text-sm font-medium text-gray-700">Peralatan</label>
                                <input onkeypress="" type="number" name="equipment" id="equipment"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="debt" class="block text-sm font-medium text-gray-700">Utang</label>
                                <input onkeypress="" type="number" name="debt" id="debt"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="capital" class="block text-sm font-medium text-gray-700">Modal</label>
                                <input onkeypress="" type="number" name="capital" id="capital"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="information"
                                    class="block text-sm font-medium text-gray-700">Keterangan</label>
                                <textarea name="information" id="information"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
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

        {{-- Edit Modal --}}
        <div id="editModal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Data Neraca
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="editModal">
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
                        <form id="editForm" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" id="edit_id">
                            <div class="mb-4">
                                <label for="edit_input_date"
                                    class="block text-sm font-medium text-gray-700">Tanggal</label>
                                <input type="date" name="input_date" id="edit_input_date"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="edit_cash" class="block text-sm font-medium text-gray-700">Kas</label>
                                <input type="number" name="cash" id="edit_cash"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="edit_receivables"
                                    class="block text-sm font-medium text-gray-700">Piutang</label>
                                <input type="number" name="receivables" id="edit_receivables"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="edit_supplies"
                                    class="block text-sm font-medium text-gray-700">Perlengkapan</label>
                                <input type="number" name="supplies" id="edit_supplies"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="edit_equipment"
                                    class="block text-sm font-medium text-gray-700">Peralatan</label>
                                <input type="number" name="equipment" id="edit_equipment"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="edit_debt" class="block text-sm font-medium text-gray-700">Utang</label>
                                <input type="number" name="debt" id="edit_debt"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="edit_capital" class="block text-sm font-medium text-gray-700">Modal</label>
                                <input type="number" name="capital" id="edit_capital"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="edit_information"
                                    class="block text-sm font-medium text-gray-700">Keterangan</label>
                                <textarea name="information" id="edit_information"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
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
    </div>

    <div id="labarugi_content">
        <div class="relative overflow-x-auto my-[1rem] min-h-[20rem]">
            <label for="" class="font-bold text-lg block text-center">Laba / Rugi</label>
            <button type="button"
                class="p-[.5rem] border-black border rounded-sm mb-[1rem] bg-gradient-to-b from-white to-gray-200 text-black"
                data-modal-toggle="createModalButton" data-modal-target="createModalButton"
                id="createAddButton">Edit</button>
            @foreach ($finance as $data)
                <table class="table12" width="100%" cellspacing="0" cellpadding="10">
                    <tr style="font-weight: bold">
                        <td colspan="3" align="center">AKTIVA</td>
                        <td colspan="3" align="center">PASSIVA</td>
                    </tr>
                    <tr>
                        <td width="7%">1100</td>
                        <td width="28%">KAS</td>
                        <td width="15%">{{ $data->kas }}</td>
                        <td width="7%">2100</td>
                        <td width="28%">Hutang</td>
                        <td width="15%">{{ $data->hutang }}</td>
                    </tr>
                    <tr>
                        <td>1110</td>
                        <td>Bank BJB</td>
                        <td>{{ $data->bank_bjb }}</td>
                        <td>2110</td>
                        <td>Alokasi BOP Komite</td>
                        <td>{{ $data->alokasi_bop_komite }}</td>
                    </tr>
                    <tr>
                        <td>1111</td>
                        <td>Bank BANDUNG</td>
                        <td>{{ $data->bank_bandung }}</td>
                        <td>2120</td>
                        <td>Alokasi BOP Pengelola</td>
                        <td>{{ $data->alokasi_bop_pengelola }}</td>
                    </tr>
                    <tr>
                        <td>1120</td>
                        <td>Sewa Bayar Dimuka</td>
                        <td>{{ $data->sewa_bayar_dimuka }}</td>
                        <td>2130</td>
                        <td>Alokasi Gaji Pengelola</td>
                        <td>{{ $data->alokasi_gaji_pengelola }}</td>
                    </tr>
                    <tr>
                        <td>1130</td>
                        <td>Piutang</td>
                        <td>{{ $data->piutang }}</td>
                        <td>2140</td>
                        <td>Alokasi Gaji Tenaga Ahli</td>
                        <td>{{ $data->alokasi_gaji_tenaga_ahli }}</td>
                    </tr>
                    <tr>
                        <td>1140</td>
                        <td>Persediaan</td>
                        <td>{{ $data->persediaan }}</td>
                        <td>2150</td>
                        <td>Alokasi Pengembangan Kapasitas</td>
                        <td>{{ $data->alokasi_pengembangan_kapasitas }}</td>
                    </tr>
                    <tr>
                        <td>1150</td>
                        <td>Inventaris</td>
                        <td>{{ $data->inventaris }}</td>
                        <td>2160</td>
                        <td>Alokasi Sewa Kantor dan Peralatan</td>
                        <td>{{ $data->alokasi_sewa_kantor_dan_peralatan }}</td>
                    </tr>
                    <tr>
                        <td>1160</td>
                        <td>Investasi</td>
                        <td>{{ $data->investasi }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>1170</td>
                        <td>Harta Tetap</td>
                        <td>{{ $data->harta_tetap }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Penyusutan Harta Tetap</td>
                        <td>{{ $data->penyusutan_harta_tetap }}</td>
                        <td></td>
                        <td align="right">Total Hutang</td>
                        <td>{{ $totalHutang =
                            $data->hutang +
                            $data->alokasi_bop_komite +
                            $data->alokasi_bop_pengelola +
                            $data->alokasi_gaji_pengelola +
                            $data->alokasi_gaji_tenaga_ahli +
                            $data->alokasi_pengembangan_kapasitas +
                            $data->alokasi_sewa_kantor_dan_peralatan }}
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>3100</td>
                        <td>Modal BDC</td>
                        <td>{{ $data->modal_bdc }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>3110</td>
                        <td>Modal Awal</td>
                        <td>{{ $data->modal_awal }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>3120</td>
                        <td>Pemupukan Modal Dari Laba</td>
                        <td>{{ $data->pemupukan_modal_dari_laba }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>L/R Tahun Lalu</td>
                        <td>{{ $data->lr_tahun_lalu }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>L/R Tahun Berjalan</td>
                        <td>{{ $data->lr_tahun_berjalan }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="right">Total Modal</td>
                        <td>{{ $totalModal = $data->modal_bdc + $data->modal_awal + $data->pemupukan_modal_dari_laba + $data->lr_tahun_lalu + $data->lr_tahun_berjalan }}
                        </td>
                    </tr>
                    <tr style="font-weight: bold;">
                        <td colspan="2">TOTAL KEKAYAAN</td>
                        <td>{{ $data->kas + $data->bank_bjb + $data->bank_bandung + $data->sewa_bayar_dimuka + $data->piutang + $data->persediaan + $data->inventaris + $data->investasi + $data->harta_tetap + $data->penyusutan_harta_tetap }}
                        </td>
                        <td colspan="2">TOTAL KEWAJIBAN MODAL</td>
                        <td>{{ $totalHutang + $totalModal }}
                        </td>
                    </tr>
                </table>
            @endforeach
        </div>


        <div id="createModalButton" tabindex="-1" role="dialog"
            class="fixed top-0 modal left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Data
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="createModalButton">
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
                        <form id="createForm" action="{{ route('labarugi_store') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="kas" class="block text-sm font-medium text-gray-700">Kas</label>
                                <input onkeypress="" type="number" name="kas" id="kas"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="bank_bjb" class="block text-sm font-medium text-gray-700">Bank BJB</label>
                                <input onkeypress="" type="number" name="bank_bjb" id="bank_bjb"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="bank_bandung" class="block text-sm font-medium text-gray-700">Bank
                                    BANDUNG</label>
                                <input onkeypress="" type="number" name="bank_bandung" id="bank_bandung"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="sewa_bayar_dimuka" class="block text-sm font-medium text-gray-700">Sewa Bayar
                                    Dimuka</label>
                                <input onkeypress="" type="number" name="sewa_bayar_dimuka" id="sewa_bayar_dimuka"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="piutang" class="block text-sm font-medium text-gray-700">Piutang</label>
                                <input onkeypress="" type="number" name="piutang" id="piutang"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="persediaan" class="block text-sm font-medium text-gray-700">Persediaan</label>
                                <input onkeypress="" type="number" name="persediaan" id="persediaan"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="inventaris" class="block text-sm font-medium text-gray-700">Inventaris</label>
                                <input onkeypress="" type="number" name="inventaris" id="inventaris"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="investasi" class="block text-sm font-medium text-gray-700">Investasi</label>
                                <input onkeypress="" type="number" name="investasi" id="investasi"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="harta_tetap" class="block text-sm font-medium text-gray-700">Harta
                                    Tetap</label>
                                <input onkeypress="" type="number" name="harta_tetap" id="harta_tetap"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="penyusutan_harta_tetap"
                                    class="block text-sm font-medium text-gray-700">Penyusutan Harta Tetap</label>
                                <input onkeypress="" type="number" name="penyusutan_harta_tetap"
                                    id="penyusutan_harta_tetap"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="hutang" class="block text-sm font-medium text-gray-700">Hutang</label>
                                <input onkeypress="" type="number" name="hutang" id="hutang"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="alokasi_bop_komite" class="block text-sm font-medium text-gray-700">Alokasi
                                    BOP Komite</label>
                                <input onkeypress="" type="number" name="alokasi_bop_komite" id="alokasi_bop_komite"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="alokasi_bop_pengelola" class="block text-sm font-medium text-gray-700">Alokasi
                                    BOP Pengelola</label>
                                <input onkeypress="" type="number" name="alokasi_bop_pengelola"
                                    id="alokasi_bop_pengelola"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="alokasi_gaji_pengelola"
                                    class="block text-sm font-medium text-gray-700">Alokasi gaji Pengelola</label>
                                <input onkeypress="" type="number" name="alokasi_gaji_pengelola"
                                    id="alokasi_gaji_pengelola"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="alokasi_gaji_tenaga_ahli"
                                    class="block text-sm font-medium text-gray-700">Alokasi Gaji Tenaga Ahli</label>
                                <input onkeypress="" type="number" name="alokasi_gaji_tenaga_ahli"
                                    id="alokasi_gaji_tenaga_ahli"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="alokasi_pengembangan_kapasitas"
                                    class="block text-sm font-medium text-gray-700">Alokasi Pengembangan Kapasitas</label>
                                <input onkeypress="" type="number" name="alokasi_pengembangan_kapasitas"
                                    id="alokasi_pengembangan_kapasitas"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="alokasi_sewa_kantor_dan_peralatan"
                                    class="block text-sm font-medium text-gray-700">Alokasi Sewa Kantor dan
                                    Peralatan</label>
                                <input onkeypress="" type="number" name="alokasi_sewa_kantor_dan_peralatan"
                                    id="alokasi_sewa_kantor_dan_peralatan"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="modal_bdc" class="block text-sm font-medium text-gray-700">Modal BDC</label>
                                <input onkeypress="" type="number" name="modal_bdc" id="modal_bdc"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="modal_awal" class="block text-sm font-medium text-gray-700">Modal Awal</label>
                                <input onkeypress="" type="number" name="modal_awal" id="modal_awal"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="pemupukan_modal_dari_laba"
                                    class="block text-sm font-medium text-gray-700">Pemupukan Modal Dari Laba</label>
                                <input onkeypress="" type="number" name="pemupukan_modal_dari_laba"
                                    id="pemupukan_modal_dari_laba"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="lr_tahun_lalu" class="block text-sm font-medium text-gray-700">L/R Tahun
                                    Lalu</label>
                                <input onkeypress="" type="number" name="lr_tahun_lalu" id="lr_tahun_lalu"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="mb-4">
                                <label for="lr_tahun_berjalan" class="block text-sm font-medium text-gray-700">L/R Tahun
                                    Berjalan</label>
                                <input onkeypress="" type="number" name="lr_tahun_berjalan" id="lr_tahun_berjalan"
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
    </div>

    <div id="omzet_content" class="relative">

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
                                <td class="px-6 py-4 text-center">

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
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                        Hapus?</h3>
                                                    <form action="{{ url('omzet_destroy/' . $omzets->id) }}"
                                                        method="POST" style="display:inline;">
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
        </div>

        <button type="button" class="btn btn-primary" data-modal-toggle="createModalOmzet"
            data-modal-target="createModalOmzet" style="display:none;" id="createAddOmzet">Add</button>


        <div id="createModalOmzet" tabindex="-1" role="dialog"
            class="fixed top-0 modal left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
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

    </div>
    <script>
        function editData(data) {
            var formAction = '{{ url('neraca_update') }}/' + data.id;
            document.getElementById('editForm').action = formAction;
            document.getElementById('edit_id').value = data.id;
            document.getElementById('edit_input_date').value = data.input_date;
            document.getElementById('edit_cash').value = data.cash;
            document.getElementById('edit_receivables').value = data.receivables;
            document.getElementById('edit_supplies').value = data.supplies;
            document.getElementById('edit_equipment').value = data.equipment;
            document.getElementById('edit_debt').value = data.debt;
            document.getElementById('edit_capital').value = data.capital;
            document.getElementById('edit_information').value = data.information;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                layout: {
                    topStart: {
                        buttons: [{
                                text: 'Add',
                                action: function() {
                                    // Trigger the hidden button with data-target for create
                                    $('#triggerCreateModalButton').click();
                                }
                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            {
                                extend: 'pdf',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            }
                        ]
                    }
                }
            });
            $('#dataTable3').DataTable({
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\Rp.,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i :
                            0;
                    };

                    // Total over all pages
                    total = api
                        .column(4)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(4, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var formatRupiah = function(num) {
                        return 'Rp. ' + num.toLocaleString('id-ID', {
                            style: 'decimal',
                            maximumFractionDigits: 0
                        });
                    };

                    // Update footer with formatted totals
                    $(api.column(4).footer()).html(
                        formatRupiah(pageTotal) + ' ( ' + formatRupiah(total) + ' total)'
                    );
                },
                layout: {
                    topStart: {
                        buttons: [{
                                text: 'Add',
                                action: function() {
                                    // Trigger the hidden button with data-target for create
                                    $('#createAddOmzet').click();
                                }
                            },
                            {
                                extend: 'excel',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            {
                                extend: 'pdf',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            }
                        ]
                    }
                }
            });
        });
    </script>

    <script>
        const neracaRadio = document.getElementById('neraca_radio');
        const neracaContent = document.getElementById('neraca_content');
        const labarugiContent = document.getElementById('labarugi_content');
        const omzetContent = document.getElementById('omzet_content');

        if (neracaRadio.checked) {
            neracaContent.classList.remove('hidden');
            labarugiContent.classList.add('hidden');
            omzetContent.classList.add('hidden');
        }

        document.querySelectorAll('input[name="kategori"]').forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'neraca') {
                    neracaContent.classList.remove('hidden');
                    labarugiContent.classList.add('hidden');
                    omzetContent.classList.add('hidden');
                } else if (this.value === 'labarugi') {
                    neracaContent.classList.add('hidden');
                    labarugiContent.classList.remove('hidden');
                    omzetContent.classList.add('hidden');
                } else {
                    neracaContent.classList.add('hidden');
                    labarugiContent.classList.add('hidden');
                    omzetContent.classList.remove('hidden');
                }
            });
        });
    </script>

@endsection()
