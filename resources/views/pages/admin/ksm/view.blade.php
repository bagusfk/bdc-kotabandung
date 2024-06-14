@extends('layouts.appadmin')
@section('title', 'Kelola Ksm')
@section('content')
    <div class="flex justify-between">
        <div class="flex items-center">
            <svg class="w-6 h-6 inline-flex" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M.6 92.1C.6 58.8 27.4 32 60.4 32c30 0 54.5 21.9 59.2 50.2 32.6-7.6 67.1 .6 96.5 30l-44.3 44.3c-20.5-20.5-42.6-16.3-55.4-3.5-14.3 14.3-14.3 37.9 0 52.2l99.5 99.5-44 44.3c-87.7-87.2-49.7-49.7-99.8-99.7-26.8-26.5-35-64.8-24.8-98.9C20.4 144.6 .6 120.7 .6 92.1zm129.5 116.4l44.3 44.3c10-10 89.7-89.7 99.7-99.8 14.3-14.3 37.6-14.3 51.9 0 12.8 12.8 17 35-3.5 55.4l44 44.3c31.2-31.2 38.5-67.6 28.9-101.2 29.2-4.1 51.9-29.2 51.9-59.5 0-33.2-26.8-60.1-59.8-60.1-30.3 0-55.4 22.5-59.5 51.6-33.8-9.9-71.7-1.5-98.3 25.1-18.3 19.1-71.1 71.5-99.6 99.9zm266.3 152.2c8.2-32.7-.9-68.5-26.3-93.9-11.8-12.2 5 4.7-99.5-99.7l-44.3 44.3 99.7 99.7c14.3 14.3 14.3 37.6 0 51.9-12.8 12.8-35 17-55.4-3.5l-44 44.3c27.6 30.2 68 38.8 102.7 28 5.5 27.4 29.7 48.1 58.9 48.1 33 0 59.8-26.8 59.8-60.1 0-30.2-22.5-55-51.6-59.1zm-84.3-53.1l-44-44.3c-87 86.4-50.4 50.4-99.7 99.8-14.3 14.3-37.6 14.3-51.9 0-13.1-13.4-16.9-35.3 3.2-55.4l-44-44.3c-30.2 30.2-38 65.2-29.5 98.3-26.7 6-46.2 29.9-46.2 58.2C0 453.2 26.8 480 59.8 480c28.6 0 52.5-19.8 58.6-46.7 32.7 8.2 68.5-.6 94.2-26 32.1-32 12.2-12.4 99.5-99.7z" />
            </svg>
            <span class="text-2xl font-semibold ml-[1rem]">Kelola KSM</span>
        </div>
        <div class="lg:w-[500px]">
            <form class="w-full flex items-center mx-auto">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari Barang" required />
                </div>
                <button type="submit"
                    class="w-1/4 p-2.5 ms-2 text-sm font-medium text-white bg-primary rounded-lg border border-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">Cari
                    {{-- <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg> --}}
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
    </div>
    <div class="w-fit mt-[1rem]">
        <h2 class="text-lg font-semibold border-b-2 border-black">Pendaftar KSM Baru</h2>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-[1rem]">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Usaha
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pemilik
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No Whatsapp
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis Produk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat KSM
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = ($ksm1->currentPage() - 1) * $ksm1->perPage() + 1;
                @endphp
                @foreach ($ksm1 as $data)
                    <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $no++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->brand_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->owner }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->no_wa }}
                        </td>
                        @if ($data->category === null && $data->address === null)
                            <td class="px-6 py-4">
                                -
                            </td>
                            <td class="px-6 py-4">
                                -
                            </td>
                        @else
                            <td class="px-6 py-4">
                                {{ $data->category->category }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->address }}
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $ksm1->links() }}

    </div>

    <div class="w-full mt-[1rem] flex justify-end">
        <a href="#"
            class="w-fit p-2.5 ms-2 text-sm font-medium text-primary border border-primary focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">
            <svg class="w-4 h-4 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="#04a7ff"
                    d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
            </svg>
            Cetak Pendaftar KSM Baru
        </a>
    </div>

    <div class="w-fit mt-[1rem]">
        <h2 class="text-lg font-semibold border-b-2 border-black">Data Anggota KSM</h2>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-[1rem]">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Usaha
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pemilik
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No Whatsapp
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis Produk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat KSM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cluster KSM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = ($ksm2->currentPage() - 1) * $ksm2->perPage() + 1;
                @endphp
                @foreach ($ksm2 as $data)
                    <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $no++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->brand_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->owner }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->no_wa }}
                        </td>
                        @if ($data->category === null && $data->address === null)
                            <td class="px-6 py-4">
                                -
                            </td>
                            <td class="px-6 py-4">
                                -
                            </td>
                        @else
                            <td class="px-6 py-4">
                                {{ $data->category->category }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->address }}
                            </td>
                        @endif
                        <td class="px-6 py-4">
                            {{ $data->cluster }}
                        </td>
                        <td class="px-6 py-4 flex">
                            <a href="{{ url('/edit-ksm/' . $data->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                            <form method="POST" action="{{ url('/delete-ksm/' . $data->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <button type="submit" class="font-medium text-red-700 dark:text-blue-500 hover:underline"
                                    onclick="return confirm('Are you sure you want to search Google?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $ksm2->links() }}

    </div>

    <div class="w-full mt-[1rem] flex justify-end">
        <a href="#"
            class="w-fit p-2.5 ms-2 text-sm font-medium text-primary border border-primary focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">
            <svg class="w-4 h-4 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="#04a7ff"
                    d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z" />
            </svg>
            Cetak Laporan Data KSM
        </a>
    </div>
@endsection()
