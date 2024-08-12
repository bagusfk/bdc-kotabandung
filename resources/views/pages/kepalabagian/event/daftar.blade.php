@extends('layouts.appkepalabidang')
@section('title', 'Daftar Event')
@section('content')
    <style>
        .dataTables_wrapper .dataTables_length select {
            padding-right: 2rem;
        }
    </style>
    <div class="w-fit mt-[1rem]">
        <h2 class="text-lg font-semibold border-b-2 border-black">Daftar Event</h2>
    </div>

    <div class="relative overflow-x-auto my-[1rem]">
        <table id="dataTable" class="display nowrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Event
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Usaha KSM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pemilik
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
                        Cluster
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Validasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lampiran Perizinan
                    </th>
                </tr>
            </thead>
            <tbody id="dataList">
                @php
                    $no = 1;
                @endphp
                @foreach ($register_event as $data)
                    <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $no++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->event->event_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->ksm->brand_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->ksm->owner }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->ksm->no_wa }}
                        </td>
                        @if ($data->ksm->category == null && $data->ksm->address == null)
                            <td class="px-6 py-4">
                                -
                            </td>
                            <td class="px-6 py-4">
                                -
                            </td>
                        @else
                            <td class="px-6 py-4">
                                {{ $data->ksm->category->category }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->ksm->address }}
                            </td>
                        @endif
                        <td class="px-6 py-4">
                            {{ $data->ksm->cluster }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($data->status_validation == 'agree')
                                Izinkan
                            @elseif ($data->status_validation == 'disagree')
                                Tolak
                            @endif
                        </td>
                        @if ($data->ksm->status_validation == null)
                            <td class="px-6 py-4">
                                -
                            </td>
                        @else
                            <td class="px-6 py-4">
                                {{ $data->ksm->status_validation }}
                            </td>
                        @endif
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
@endsection();
