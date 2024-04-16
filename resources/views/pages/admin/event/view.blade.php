@extends('layouts.appadmin')
@section('title', 'Kelola Event')
@section('content')
    <div class="flex justify-between">
        <div class="flex items-center">
            <svg class="w-6 h-6 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z"/></svg>
            <span class="text-2xl font-semibold ml-[1rem]">Kelola Event</span>
        </div>
        <div class="lg:w-[500px]">
            <form class="w-full flex items-center mx-auto">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Event" required />
                </div>
                <button type="submit" class="w-1/4 p-2.5 ms-2 text-sm font-medium text-white bg-primary rounded-lg border border-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">Cari
                    {{-- <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg> --}}
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
    </div>

    <div class="w-full mt-[1rem]">
        <a href="{{ route('add-item') }}" class="text-sm font-medium text-white p-2.5 bg-primary rounded-lg inline-flex items-center">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="white" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
            </svg>
            <span class="ms-3">Tambah Event</span>
        </a>
    </div>

    <div class="w-fit mt-[1rem]">
        <h2 class="text-lg font-semibold border-b-2 border-black">Data Pendaftar Event</h2>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-[1rem] min-h-[20rem]">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ID Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stok
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Expired
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($events as $data)
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
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $events->links() }}

    <div class="w-fit mt-[1rem]">
        <h2 class="text-lg font-semibold border-b-2 border-black">Laporan Kegiatan Event</h2>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-[1rem] min-h-[20rem]">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Event
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penyelenggara Event
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Peserta
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hasil Penjualan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($events as $data)
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
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $events->links() }}

@endsection()
