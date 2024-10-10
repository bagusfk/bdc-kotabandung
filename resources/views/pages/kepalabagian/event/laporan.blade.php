@extends('layouts.appkepalabidang')
@section('title', 'Kelola Event')
@section('content')
    <style>
        .dataTables_wrapper .dataTables_length select {
            padding-right: 2rem;
        }
    </style>

    <div class="mt-[1rem] w-fit">
        <h2 class="border-b-2 border-black text-lg font-semibold">Laporan Event</h2>
    </div>

    <div class="relative my-[1rem] overflow-x-auto">
        <table id="dataTable" class="display nowrap w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Event
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penyelenggara Event
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tempat Event
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Peserta
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stok Terjual
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga Produk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga di Event
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Hasil Penjualan
                    </th>
                </tr>
            </thead>
            <tbody id="dataList">
                @php
                    $no = 1;
                @endphp
                @foreach ($laporan as $data)
                    <tr>
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $no++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->register_event->event->event_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->register_event->event->event_organizer }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->register_event->event->location }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->register_event->ksm->owner }}
                        </td>
                        <td class="flex justify-center px-6 py-3">
                            {{ $data->stock_sold }}
                        </td>
                        <td class="px-6 py-3">
                            Rp.{{ $data->starting_price }}
                        </td>
                        <td class="px-6 py-3">
                            Rp.{{ $data->price_at_event }}
                        </td>
                        <td class="px-6 py-4">
                            Rp.{{ $data->sales_result }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                layout: {
                    topStart: {
                        buttons: [{
                                extend: 'excel'
                            },
                            {
                                extend: 'pdf'
                            },
                            {
                                extend: 'print'
                            }
                        ]
                    }
                }
            });
        });
    </script>
@endsection()
