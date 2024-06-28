@extends('layouts.appadmin')
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
        <table id="dataTable"
            class="display nowrap min-h-[20rem] w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                            @if ($data->status_validation == 'prosess')
                                <button type="button"
                                    class="agree-button text-white bg-primary hover:bg-primary focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-primary dark:hover:bg-primary focus:outline-none dark:focus:ring-blue-800"
                                    data-id="{{ $data->id }}">Izinkan</button>
                                <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tolak</button>
                            @elseif ($data->status_validation == 'agree')
                                Izinkan
                            @else
                                Tolak
                            @endif
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

            $('.agree-button').click(function() {
                var id = $(this).data('id');
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                $.ajax({
                    url: '/agree/' + id,
                    type: 'PUT',
                    data: {
                        _token: csrfToken // Sertakan token CSRF di dalam data permintaan
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
