@extends('layouts.appadmin')
@section('title', 'Daftar Event')
@section('content')
    <style>
        .dataTables_wrapper .dataTables_length select {
            padding-right: 2rem;
        }
    </style>
    <div class="mt-[1rem] w-fit">
        <h2 class="border-b-2 border-black text-lg font-semibold">Daftar Event</h2>
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
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
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
                            {{ $data->ksm->cluster == 'd'
                                ? 'D (Reseller)'
                                : ($data->ksm->cluster == 'c'
                                    ? 'C (Legalitas tidak lengkap)'
                                    : ($data->ksm->cluster == 'b'
                                        ? 'B (Legalitas kurang lengkap)'
                                        : ($data->ksm->cluster == 'a'
                                            ? 'A (Legalitas lengkap)'
                                            : 'Tidak ada cluster'))) }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($data->status_validation == 'prosess')
                                <button type="button"
                                    class="agree-button mb-2 me-2 rounded-lg bg-primary px-5 py-2.5 text-sm font-medium text-white hover:bg-primary focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-primary dark:hover:bg-primary dark:focus:ring-blue-800"
                                    data-id="{{ $data->id }}">Izinkan</button>
                                <button type="button" data-id="{{ $data->id }}"
                                    class="reject-button mb-2 me-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tolak</button>
                            @elseif ($data->status_validation == 'agree')
                                Izinkan
                            @else
                                Tolak
                            @endif
                        </td>
                        @if ($data->ksm->permission_letter == null)
                            <td class="px-6 py-4">
                                -
                            </td>
                        @else
                            <td class="px-6 py-4">
                                {{ $data->ksm->permission_letter }}
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

            // $('.agree-button').click(function() {
            //     var id = $(this).data('id');
            //     var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            //     $.ajax({
            //         url: '/agree/' + id,
            //         type: 'PUT',
            //         data: {
            //             _token: csrfToken // Sertakan token CSRF di dalam data permintaan
            //         },
            //         success: function(response) {
            //             console.log(response);
            //             location.reload();
            //         },
            //         error: function(xhr, status, error) {
            //             console.error(error);
            //         }
            //     });
            // });

            // $('.reject-button').click(function() {
            //     var id = $(this).data('id');
            //     var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            //     $.ajax({
            //         url: '/reject/' + id,
            //         type: 'PUT',
            //         data: {
            //             _token: csrfToken // Sertakan token CSRF di dalam data permintaan
            //         },
            //         success: function(response) {
            //             console.log(response);
            //             location.reload();
            //         },
            //         error: function(xhr, status, error) {
            //             console.error(error);
            //         }
            //     });
            // });
            // Event delegation for agree button
            $(document).on('click', '.agree-button', function() {
                var id = $(this).data('id');
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                $.ajax({
                    url: '/agree/' + id,
                    type: 'PUT',
                    data: {
                        _token: csrfToken
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            // Event delegation for reject button
            $(document).on('click', '.reject-button', function() {
                var id = $(this).data('id');
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                $.ajax({
                    url: '/reject/' + id,
                    type: 'PUT',
                    data: {
                        _token: csrfToken
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection();
