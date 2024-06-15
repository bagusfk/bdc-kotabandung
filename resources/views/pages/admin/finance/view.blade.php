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
        @if (session('delete'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                {!! html_entity_decode(session('delete')) !!}
            </div>
        @elseif (session('status'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                {!! html_entity_decode(session('status')) !!}
            </div>
        @endif
        <div class="relative overflow-x-auto sm:rounded-lg my-[1rem] min-h-[20rem]">
            <label for="" class="font-bold text-lg block text-center">Neraca</label>
            <table class="display w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pt-[.5rem]"
                id="dataTable">
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
                                <form action="{{ url('neraca_destroy/' . $data->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 border border-red-600 p-1.5" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6" style="text-align:right">Total Modal:</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>

        {{-- Create Modal --}}
        <div id="createModal" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
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
                        <form id="editForm" action="{{ route('neraca_update', 'id') }}" method="POST">
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
        <div class="w-full mt-[1rem] flex justify-end">
            <button class=" p-2.5 text-primary border-primary border" data-modal-target="createModal"
                data-modal-toggle="createModal">
                <svg class="w-4 h-4 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#04a7ff"
                        d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                </svg>
                Tambah
            </button>
            <a href="#"
                class="w-fit p-2.5 ms-2 text-sm font-medium text-primary border border-primary focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">
                <svg class="w-4 h-4 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#04a7ff"
                        d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                </svg>
                Cetak Data Pesanan Masuk
            </a>

        </div>
    </div>

    <div id="labarugi_content">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-[1rem] min-h-[20rem]">
            <label for="" class="font-bold text-lg block text-center">Laba / Rugi</label>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center w-10">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Keterangan
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            laba
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            rugi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    <tr class="bg-red-900">
                        <th scope="row"
                            class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            1
                        </th>
                        <td class="px-6 py-4 text-center">
                            Pendapatan Usaha
                        </td>
                        <td class="px-6 py-4 text-center">
                            Rp. 10.000.000
                        </td>
                        <td class="px-6 py-4 text-center">
                            Rp. 0
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"
                            class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            2
                        </th>
                        <td class="px-6 py-4 text-center">
                            Beban Pokok Pendapatan
                        </td>
                        <td class="px-6 py-4 text-center">
                            Rp. 10.000.000
                        </td>
                        <td class="px-6 py-4 text-center">
                            Rp. 0
                        </td>
                    </tr>
                    {{-- @foreach ($events as $data)
                        <tr>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $no++ }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $data->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->event_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->event_organizer }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->description }}
                            </td>
                            <td class="px-6 py-4 flex">
                                <a href="{{ url('/edit-item/' . $data->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                                <form method="POST" action="{{ url('/delete-item/'.$data->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="font-medium text-red-700 dark:text-blue-500 hover:underline" onclick="return confirm('Are you sure you want to search Google?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
        <div class="w-full mt-[1rem] flex justify-end">

            <a href="#"
                class="w-fit p-2.5 ms-2 text-sm font-medium text-primary border border-primary focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">
                <svg class="w-4 h-4 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#04a7ff"
                        d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                </svg>
                Tambah
            </a>
            <a href="#"
                class="w-fit p-2.5 ms-2 text-sm font-medium text-primary border border-primary focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">
                <svg class="w-4 h-4 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#04a7ff"
                        d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                </svg>
                Edit
            </a>
            <a href="#"
                class="w-fit p-2.5 ms-2 text-sm font-medium text-primary border border-primary focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">
                <svg class="w-4 h-4 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#04a7ff"
                        d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                </svg>
                Cetak Data Pesanan Masuk
            </a>

        </div>
    </div>

    <div id="omzet_content" class="relative">
        <label for="" class="font-bold text-lg block text-center">Omzet / Bulan</label>

        <div class="w-full rounded-lg dark:bg-gray-800 p-4 md:p-6">
            <canvas id="chartLine"></canvas>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-[1rem] min-h-[20rem]">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Nama KSM
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Produk
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Bayar
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            QTY
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Jumlah
                        </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php
                        $no = 1;
                    @endphp
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        1
                    </th>
                    <td class="px-6 py-4">
                        22/04/2024
                    </td>
                    <td class="px-6 py-4">
                        Soebagja
                    </td>
                    <td class="px-6 py-4">
                        Makanan Ringan
                    </td>
                    <td class="px-6 py-4">
                        Tunai
                    </td>
                    <td class="px-6 py-4">
                        120
                    </td>
                    <td class="px-6 py-4">
                        100.000
                    </td>
                    <td class="px-6 py-4">
                        12.000.000
                    </td>
                    {{-- @foreach ($events as $data)
                        <tr>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $no++ }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $data->id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->event_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->event_organizer }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->description }}
                            </td>
                            <td class="px-6 py-4 flex">
                                <a href="{{ url('/edit-item/' . $data->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                                <form method="POST" action="{{ url('/delete-item/'.$data->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="font-medium text-red-700 dark:text-blue-500 hover:underline" onclick="return confirm('Are you sure you want to search Google?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>

        <div class="w-full mt-[1rem] flex justify-end">

            <a href="#"
                class="w-fit p-2.5 ms-2 text-sm font-medium text-primary border border-primary focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">
                <svg class="w-4 h-4 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#04a7ff"
                        d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                </svg>
                Tambah
            </a>
            <a href="#"
                class="w-fit p-2.5 ms-2 text-sm font-medium text-primary border border-primary focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">
                <svg class="w-4 h-4 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#04a7ff"
                        d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                </svg>
                Edit
            </a>
            <a href="#"
                class="w-fit p-2.5 ms-2 text-sm font-medium text-primary border border-primary focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">
                <svg class="w-4 h-4 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="#04a7ff"
                        d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
                </svg>
                Cetak Data Pesanan Masuk
            </a>

        </div>
    </div>

    <script>
        function editData(data) {
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            moment.locale('id');

            // Initialize the DataTable
            $('#dataTable').DataTable({
                order: [],
                footerCallback: function(row, data, start, end, display) {
                    let api = this.api();

                    // Remove the formatting to get integer data for summation
                    let intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\Rp,.]/g, '') * 1 :
                            typeof i === 'number' ?
                            i :
                            0;
                    };

                    let columns = [5, 6]; // Index of the "Modal" column
                    let total = {};
                    let pageTotal = {};

                    columns.forEach(colIndex => {
                        total[colIndex] = api
                            .column(colIndex)
                            .data()
                            .reduce((a, b) => intVal(a) + intVal(b), 0);

                        pageTotal[colIndex] = api
                            .column(colIndex, {
                                page: 'current'
                            })
                            .data()
                            .reduce((a, b) => intVal(a) + intVal(b), 0);

                        // Update footer
                        let footerCell = api.column(colIndex).footer();
                        footerCell.innerHTML = 'Rp. ' + pageTotal[colIndex].toLocaleString(
                            'id-ID');
                        // footerCell.innerHTML = 'Rp. ' + pageTotal[colIndex].toLocaleString('id-ID') + ' ( Rp. ' + total[colIndex].toLocaleString('id-ID') + ' total)';
                    });
                }
            });

            // Initialize the DateTime plugin after DataTable initialization
            $.fn.dataTable.DateTime.defaults.format = 'D MMM YYYY';
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

        const line = document.getElementById('chartLine');

        new Chart(line, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [65, 59, 80, 81, 56, 55],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection()
