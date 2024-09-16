@extends('layouts.appadmin')
@section('title', 'Kelola Event')
@section('content')
    <style>
        .dataTables_wrapper .dataTables_length select {
            padding-right: 2rem;
        }
    </style>

    <div class="table_1">
        <div class="mt-[1rem] w-fit">
            <h2 class="border-b-2 border-black text-lg font-semibold">Penjualan Event</h2>
        </div>

        <div class="relative my-[1rem] overflow-x-auto">
            <table id="dataTable"
                class="display no-wrap w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Event
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Event
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Penyelenggara Event
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lokasi Event
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
                <tbody id="dataList">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($laporan as $data)
                        <tr>
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $no++ }}
                            </th>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($data->register_event->event->event_date_start)->format('d-m-Y') }}
                                s/d
                                {{ \Carbon\Carbon::parse($data->register_event->event->event_date_end)->format('d-m-Y') }}
                            </td>
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
                            <td class="px-6 py-4">
                                <div class="flex">
                                    <a href="{{ url('/edit-laporan/' . $data->id) }}"
                                        class="mr-2 font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                                    <form method="POST" action="{{ url('/delete-laporan/' . $data->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="font-medium text-red-700 hover:underline dark:text-blue-500"
                                            onclick="return confirm('Are you sure')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        $('#dataTable').DataTable({
            layout: {
                topStart: {
                    buttons: [{
                        text: 'Add',
                        action: function() {
                            window.location.href = '/tambah-laporan';
                        }
                    }]
                }
            }
        });
    </script>
@endsection()
