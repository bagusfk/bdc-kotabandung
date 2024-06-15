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
    </div>
    <div class="w-fit mt-[1rem]">
        <h2 class="text-lg font-semibold border-b-2 border-black">Pendaftar KSM Baru</h2>
    </div>

    <div class="relative overflow-x-auto mt-[1rem]">
        <table id="dataTable" class="display w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
            <tbody id="dataList">
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
    </div>

    <div class="w-fit mt-[1rem]">
        <h2 class="text-lg font-semibold border-b-2 border-black">Data Anggota KSM</h2>
    </div>

    <div class="relative overflow-x-auto mt-[1rem]">
        <table id="dataTable2" class="display w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
            <tbody id="dataList2">
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

    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excel',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                ]
            });
            $('#dataTable2').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excel',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                ]
            });
        });
    </script>
@endsection()
