@extends('layouts.appkepalabidang')
@section('title', 'Kelola Event')
@section('content')
    <style>
        .dataTables_wrapper .dataTables_length select {
            padding-right: 2rem;
        }
    </style>

    <div class="w-fit mt-[1rem]">
        <h2 class="text-lg font-semibold border-b-2 border-black">Laporan Event</h2>
    </div>

    <div class="relative overflow-x-auto my-[1rem]">
        <table id="dataTable"
            class="display min-h-[20rem] w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                        <td class="px-6 py-4">
                            {{ $data->sales_result }}
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
