@extends('layouts.appadmin')
@section('content')
    <style>
        /* Optional: Add some basic styling */
        .hidden {
            display: none;
        }

        .active-tab {
            color: #6B21A8;
            border-bottom-color: #6B21A8;
        }
    </style>
    <div class="">
        <div class="mx-auto mb-4 space-y-6 border-b border-gray-200 max-w-7xl sm:px-6 lg:px-8 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab"
                        data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">KSM</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="dashboard-styled-tab"
                        data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard"
                        aria-selected="true">Pembeli</button>
                </li>
            </ul>
        </div>
        <div id="default-styled-tab-content" class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="hidden space-y-6" id="styled-profile" role="tabpanel" aria-labelledby="profile-styled-tab">
                <!-- Content for Profile Tab -->
                <div class="w-fit mt-[1rem]">
                    <h2 class="text-lg font-semibold border-b-2 border-black">Pendaftar Baru Harian</h2>
                </div>
                <div class="relative overflow-x-auto mt-[1rem]">
                    <table id="dataTable"
                        class="w-full text-sm text-left text-gray-500 display nowrap rtl:text-right dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama Usaha</th>
                                <th scope="col" class="px-6 py-3">Nama Pemilik</th>
                                <th scope="col" class="px-6 py-3">No Whatsapp</th>
                                <th scope="col" class="px-6 py-3">Jenis Produk</th>
                                <th scope="col" class="px-6 py-3">Alamat KSM</th>
                            </tr>
                        </thead>
                        <tbody id="dataList">
                            @php $no1 = 1; @endphp
                            @foreach ($ksm1 as $data)
                                <tr>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $no1++ }}</th>
                                    <td class="px-6 py-4">{{ $data->brand_name }}</td>
                                    <td class="px-6 py-4">{{ $data->owner }}</td>
                                    <td class="px-6 py-4">{{ $data->no_wa }}</td>
                                    @if ($data->category === null && $data->address === null)
                                        <td class="px-6 py-4">-</td>
                                        <td class="px-6 py-4">-</td>
                                    @else
                                        <td class="px-6 py-4">{{ $data->category->category }}</td>
                                        <td class="px-6 py-4">{{ $data->address }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-fit mt-[1rem]">
                    <h2 class="text-lg font-semibold border-b-2 border-black">Data KSM</h2>
                </div>
                <div class="relative overflow-x-auto mt-[1rem]">
                    <table id="dataTable2"
                        class="w-full text-sm text-left text-gray-500 display nowrap rtl:text-right dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama Usaha</th>
                                <th scope="col" class="px-6 py-3">Nama Pemilik</th>
                                <th scope="col" class="px-6 py-3">No Whatsapp</th>
                                <th scope="col" class="px-6 py-3">Jenis Produk</th>
                                <th scope="col" class="px-6 py-3">Alamat KSM</th>
                                <th scope="col" class="px-6 py-3">Cluster KSM</th>
                                <th scope="col" class="px-6 py-3">#</th>
                            </tr>
                        </thead>
                        <tbody id="dataList2">
                            @php $no2 = 1; @endphp
                            @foreach ($ksm2 as $data)
                                <tr>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $no2++ }}</th>
                                    <td class="px-6 py-4">{{ $data->brand_name }}</td>
                                    <td class="px-6 py-4">{{ $data->owner }}</td>
                                    <td class="px-6 py-4">{{ $data->no_wa }}</td>
                                    @if ($data->category === null && $data->address === null)
                                        <td class="px-6 py-4">-</td>
                                        <td class="px-6 py-4">-</td>
                                    @else
                                        <td class="px-6 py-4">{{ $data->category->category }}</td>
                                        <td class="px-6 py-4">{{ $data->address }}</td>
                                    @endif
                                    <td class="px-6 py-4">
                                        {{ $data->cluster == 'd' ? 'D (Reseller)'
                                            : ($data->cluster == 'c' ? 'C (Dokumen tidak lengkap)'
                                            : ($data->cluster == 'b' ? 'B (Tidak ada NIB)'
                                            : ($data->cluster == 'a' ? 'A (Dokumen lengkap)'
                                            : 'Tidak ada cluster'))) }}
                                    </td>
                                    <td class="flex px-6 py-4">
                                        <a href="{{ url('/edit-ksm/' . $data->id) }}"
                                            class="mr-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <form method="POST" action="{{ url('/delete-ksm/' . $data->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="font-medium text-red-700 dark:text-blue-500 hover:underline"
                                                onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="hidden space-y-6" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-styled-tab">
                <!-- Content for Address Tab -->

                <div class="w-fit mt-[1rem]">
                    <h2 class="text-lg font-semibold border-b-2 border-black">Pendaftar Baru Harian</h2>
                </div>
                <div class="relative overflow-x-auto mt-[1rem]">
                    <table id="dataTable3"
                        class="w-full text-sm text-left text-gray-500 display nowrap rtl:text-right dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">No Whatsapp</th>
                                <th scope="col" class="px-6 py-3">Alamat</th>
                            </tr>
                        </thead>
                        <tbody id="dataList3">
                            @php $no3 = 1; @endphp
                            @foreach ($pembeli as $data)
                                <tr>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $no3++ }}</th>
                                    <td class="px-6 py-4">{{ $data->name }}</td>
                                    <td class="px-6 py-4">{{ $data->email }}</td>
                                    <td class="px-6 py-4">{{ $data->no_wa }}</td>
                                    @if ($data->address === null)
                                        <td class="px-6 py-4">-</td>
                                    @else
                                        <td class="px-6 py-4">{{ $data->address }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="w-fit mt-[1rem]">
                    <h2 class="text-lg font-semibold border-b-2 border-black">Data Pembeli</h2>
                </div>
                <div class="relative overflow-x-auto mt-[1rem]">
                    <table id="dataTable4"
                        class="w-full text-sm text-left text-gray-500 display nowrap rtl:text-right dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">No Whatsapp</th>
                                <th scope="col" class="px-6 py-3">Alamat</th>
                                <th scope="col" class="px-6 py-3">#</th>
                            </tr>
                        </thead>
                        <tbody id="dataList4">
                            @php $no4 = 1; @endphp
                            @foreach ($pembeli2 as $data)
                                <tr>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $no4++ }}</th>
                                    <td class="px-6 py-4">{{ $data->name }}</td>
                                    <td class="px-6 py-4">{{ $data->email }}</td>
                                    <td class="px-6 py-4">{{ $data->no_wa }}</td>
                                    @if ($data->address === null)
                                        <td class="px-6 py-4">-</td>
                                    @else
                                        <td class="px-6 py-4">{{ $data->address }}</td>
                                    @endif
                                    <td class="flex px-6 py-4">
                                        <a href="{{ url('/edit-pembeli/' . $data->id) }}"
                                            class="mr-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <form method="POST" action="{{ url('/delete-pembeli/' . $data->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="font-medium text-red-700 dark:text-blue-500 hover:underline"
                                                onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('[data-tabs-target]');
            const tabContents = document.querySelectorAll('[role="tabpanel"]');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const target = document.querySelector(tab.dataset.tabsTarget);

                    tabContents.forEach(tc => {
                        tc.classList.add('hidden');
                    });

                    tabs.forEach(t => {
                        t.classList.remove('active-tab');
                    });

                    target.classList.remove('hidden');
                    tab.classList.add('active-tab');
                });
            });

            // Activate the first tab and content by default
            if (tabs.length > 0) {
                tabs[0].click();
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                layout: {
                    topStart: {
                        buttons: [{
                                extend: 'excel',
                                messageTop: 'Pendaftar KSM hari ini'
                                // messageBottom: null
                            },
                            {
                                extend: 'pdf',
                                messageTop: 'Pendaftar KSM hari ini'
                                // messageBottom: null
                            },
                            {
                                extend: 'print',
                                messageTop: 'Pendaftar KSM hari ini'
                                // messageBottom: null
                            }
                        ]
                    }
                }
            });
            $('#dataTable2').DataTable({
                layout: {
                    topStart: {
                        buttons: [{
                                extend: 'excel',
                                messageTop: 'Data KSM'
                                // messageBottom: null
                            },
                            {
                                extend: 'pdf',
                                messageTop: 'Data KSM'
                                // messageBottom: null
                            },
                            {
                                extend: 'print',
                                messageTop: 'Data KSM'
                                // messageBottom: null
                            }
                        ]
                    }
                }
            });
            $('#dataTable3').DataTable({
                layout: {
                    topStart: {
                        buttons: [{
                                extend: 'excel',
                                messageTop: 'Pendaftar user hari ini',
                            },
                            {
                                extend: 'pdf',
                                messageTop: 'Pendaftar user hari ini',
                            },
                            {
                                extend: 'print',
                                messageTop: 'Pendaftar user hari ini',
                            }
                        ]
                    }
                }
            });
            $('#dataTable4').DataTable({
                layout: {
                    topStart: {
                        buttons: [{
                                extend: 'excel',
                                messageTop: 'Data User',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            {
                                extend: 'pdf',
                                messageTop: 'Data User',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            },
                            {
                                extend: 'print',
                                messageTop: 'Data User',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                }
                            }
                        ]
                    }
                }
            });
        });
    </script>
@endsection()
