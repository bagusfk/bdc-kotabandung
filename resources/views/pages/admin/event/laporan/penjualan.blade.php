@extends('layouts.appadmin')
@section('title', 'Kelola Event')
@section('content')
    <style>
        .dataTables_wrapper .dataTables_length select {
            padding-right: 2rem;
        }
    </style>

    <div class="table_1">
        <div class="w-fit mt-[1rem]">
            <h2 class="text-lg font-semibold border-b-2 border-black">Penjualan Event</h2>
        </div>

        <div class="relative overflow-x-auto my-[1rem]">
            <table id="dataTable"
                class="display no-wrap w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                            <td class="px-6 py-4 flex">
                                <a href="{{ url('/edit-laporan/' . $data->id) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                                <form method="POST" action="{{ url('/delete-laporan/' . $data->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="font-medium text-red-700 dark:text-blue-500 hover:underline"
                                        onclick="return confirm('Are you sure')">
                                        Delete
                                    </button>
                                </form>
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
