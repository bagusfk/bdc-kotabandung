@extends('layouts.appkepalabidang')
@section('title', 'Kelola Penjualan')
@section('content')

    <style>
        th {
            white-space: nowrap;
        }

        select#dt-length-0 {
            padding-right: 2.5rem;
        }

        table.dataTable td.dt-type-numeric {
            text-align: center;
        }

        table.dataTable th.dt-type-numeric {
            text-align: left;
        }

        .dataTables_length>label>select {
            width: 75px;
        }
    </style>

    <div class="flex justify-between">
        <div class="flex items-center">
            <svg class="w-6 h-6 inline-flex" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM176 256a112 112 0 1 1 224 0 112 112 0 1 1 -224 0zm76-48c0 9.7 6.9 17.7 16 19.6V276h-4c-11 0-20 9-20 20s9 20 20 20h24 24c11 0 20-9 20-20s-9-20-20-20h-4V208c0-11-9-20-20-20H272c-11 0-20 9-20 20z" />
            </svg>
            <span class="text-2xl font-semibold ml-[1rem]">Kelola Keuangan</span>
        </div>
    </div>

    <div class="w-fit flex mt-[1rem]">
        <label class="inline-flex items-center mr-4">
            <input class="rounded-full mr-2" type="radio" name="kategori" id="neraca_radio" value="neraca" checked>
            <p>Neraca</p>
        </label>
        <label class="inline-flex items-center mr-4">
            <input class="rounded-full mr-2" type="radio" name="kategori" id="labarugi_radio" value="labarugi">
            <p>Laba/Rugi</p>
        </label>
        <label class="inline-flex items-center">
            <input class="rounded-full mr-2" type="radio" name="kategori" id="omzet_radio" value="omzet">
            <p>Omzet</p>
        </label>
    </div>
    <div id="neraca_content">
        <div class="relative overflow-x-auto sm:rounded-lg my-[1rem] min-h-[20rem]">
            <label for="" class="font-bold text-lg block text-center">Neraca</label>
            <table class="display nowrap text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pt-[.5rem]"
                id="dataTable1" width="100%" cellspacing="0" cellpadding="10">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">NO</th>
                        <th scope="col" class="px-6 py-3 text-center">TANGGAL</th>
                        <th scope="col" class="px-6 py-3 text-center">KODE</th>
                        <th scope="col" class="px-6 py-3 text-center">KETERANGAN</th>
                        <th scope="col" class="px-6 py-3 text-center">DEBIT</th>
                        <th scope="col" class="px-6 py-3 text-center">KREDIT</th>
                    </tr>
                </thead>
                <tbody id="dataList">
                    @php
                        $nos = 1;
                    @endphp
                    @foreach ($neraca as $neracas)
                        <tr>
                            <td>{{ $nos++ }}</td>
                            <td>{{ \Carbon\Carbon::parse($neracas->dated)->translatedFormat('d F Y') }}</td>
                            <td>{{ $neracas->kode }}</td>
                            <td>{{ $neracas->description }}</td>
                            <td>{{ $neracas->debit }}</td>
                            <td>{{ $neracas->kredit }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" style="text-align:right">Total:</th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <p class="text-xs text-red-600">* Jika ingin membuat laporan berdasarkan bulan maka isi pada inputan search
                (Contoh
                :
                januari)</p>
            <p class="text-xs text-red-600">* Jika ingin membuat laporan berdasarkan tahun maka isi pada inputan search
                (Contoh
                :
                2024)</p>
            <p class="text-xs text-red-600">* Jika ingin membuat laporan berdasarkan bulan dan tahun maka isi pada inputan
                search
                (Contoh : januari 2024)</p>
        </div>
    </div>

    <div id="labarugi_content">
        <div class="relative overflow-x-auto sm:rounded-lg my-[1rem] min-h-[20rem]">
            <label for="" class="font-bold text-lg block text-center">Laba / Rugi</label>
            <table class="display nowrap text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pt-[.5rem]"
                id="dataTable2" style="width: 100%;">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">NO</th>
                        <th scope="col" class="px-6 py-3 text-center">TANGGAL</th>
                        <th scope="col" class="px-6 py-3 text-center">KODE</th>
                        <th scope="col" class="px-6 py-3 text-center">KETERANGAN</th>
                        <th scope="col" class="px-6 py-3 text-center">DEBIT</th>
                        <th scope="col" class="px-6 py-3 text-center">KREDIT</th>
                    </tr>
                </thead>
                <tbody id="dataList2">
                    @if ($finance->isEmpty())
                        <!-- Anda dapat menambahkan pesan atau tindakan lain jika tidak ada data -->
                    @else
                        @php
                            $nor = 1;
                        @endphp
                        @foreach ($finance as $data)
                            <tr>
                                <td>{{ $nor++ }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->dated)->translatedFormat('d F Y') }}</td>
                                <td>{{ $data->kode }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->debit }}</td>
                                <td>{{ $data->kredit }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" style="text-align:right">Total:</th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <p class="text-xs text-red-600">* Jika ingin membuat laporan berdasarkan bulan maka isi pada inputan search
                (Contoh
                :
                januari)</p>
            <p class="text-xs text-red-600">* Jika ingin membuat laporan berdasarkan tahun maka isi pada inputan search
                (Contoh
                :
                2024)</p>
            <p class="text-xs text-red-600">* Jika ingin membuat laporan berdasarkan bulan dan tahun maka isi pada inputan
                search
                (Contoh : januari 2024)</p>
        </div>
    </div>

    <div id="omzet_content" class="relative">
        <div class="relative overflow-x-auto sm:rounded-lg my-[1rem] min-h-[20rem]">
            <label for="" class="font-bold text-lg block text-center">Omzet</label>
            <table class="display nowrap text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pt-[.5rem]"
                id="dataTable3" style="width: 100%;">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Bulan
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Omzet / Bulan (Rp .)
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Jumlah Omzet (Rp .) (Akumulasi)
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Profit (Rp .)
                        </th>
                    </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody id="dataList3">
                    @if ($omzet->isEmpty())
                        <!-- Anda dapat menambahkan pesan atau tindakan lain jika tidak ada data -->
                    @else
                        @foreach ($omzet as $omzets)
                            <tr>
                                <td class="px-6 py-4 text-center">
                                    {{ $no++ }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $omzets->month }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ 'Rp. ' . number_format($omzets->omzet, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ 'Rp. ' . number_format($omzets->total_omzet, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ 'Rp. ' . number_format($omzets->profit, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <p class="text-xs text-red-600">* Jika ingin membuat laporan berdasarkan bulan maka isi pada inputan search
                (Contoh
                :
                januari)</p>
            <p class="text-xs text-red-600">* Jika ingin membuat laporan berdasarkan tahun maka isi pada inputan search
                (Contoh
                :
                2024)</p>
            <p class="text-xs text-red-600">* Jika ingin membuat laporan berdasarkan bulan dan tahun maka isi pada inputan
                search
                (Contoh : januari 2024)</p>
        </div>

    </div>
    <script>
        function editData(data) {
            var formAction = '{{ url('neraca_update') }}/' + data.id;
            document.getElementById('editForm').action = formAction;
            document.getElementById('edit_id').value = data.id;
            document.getElementById('edit_input_date').value = data.input_date;
            document.getElementById('edit_cash').value = data.cash;
            document.getElementById('edit_receivables').value = data.receivables;
            document.getElementById('edit_supplies').value = data.supplies;
            document.getElementById('edit_equipment').value = data.equipment;
            document.getElementById('edit_debt').value = data.debt;
            document.getElementById('edit_capital').value = data.capital;
            document.getElementById('edit_information').value = data.information;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable1').DataTable({
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\Rp.,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i :
                            0;
                    };

                    // Total over this page for column 4
                    pageTotalColumn4 = api
                        .column(4, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page for column 5
                    pageTotalColumn5 = api
                        .column(5, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Format the result as Rupiah
                    var formatRupiah = function(num) {
                        return 'Rp. ' + num.toLocaleString('id-ID', {
                            style: 'decimal',
                            maximumFractionDigits: 0
                        });
                    };

                    // Update footer for column 4
                    $(api.column(4).footer()).html(
                        formatRupiah(pageTotalColumn4)
                    );

                    // Update footer for column 5
                    $(api.column(5).footer()).html(
                        formatRupiah(pageTotalColumn5)
                    );
                },
                layout: {
                    topStart: {
                        buttons: [{
                                text: 'Add',
                                action: function() {
                                    // Trigger the hidden button with data-target for create
                                    $('#createModal1').click();
                                }
                            }, {
                                extend: 'excel',
                                title: 'Neraca',
                                exportOptions: {
                                    columns: ':not(:first-child)' // Exclude the first and last columns
                                }
                            },
                            {
                                extend: 'pdf',
                                title: 'Neraca',
                                exportOptions: {
                                    columns: ':not(:first-child)' // Exclude the first and last columns
                                }
                            },
                            {
                                extend: 'print',
                                title: 'Neraca',
                                exportOptions: {
                                    columns: ':not(:first-child)' // Exclude the first and last columns
                                }
                            }
                        ]
                    }
                }
            });
            $('#dataTable2').DataTable({
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\Rp.,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i :
                            0;
                    };

                    // Total over this page for column 4
                    pageTotalColumn4 = api
                        .column(4, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page for column 5
                    pageTotalColumn5 = api
                        .column(5, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Format the result as Rupiah
                    var formatRupiah = function(num) {
                        return 'Rp. ' + num.toLocaleString('id-ID', {
                            style: 'decimal',
                            maximumFractionDigits: 0
                        });
                    };

                    // Update footer for column 4
                    $(api.column(4).footer()).html(
                        formatRupiah(pageTotalColumn4)
                    );

                    // Update footer for column 5
                    $(api.column(5).footer()).html(
                        formatRupiah(pageTotalColumn5)
                    );
                },
                layout: {
                    topStart: {
                        buttons: [{
                                text: 'Add',
                                action: function() {
                                    // Trigger the hidden button with data-target for create
                                    $('#createModal2').click();
                                }
                            }, {
                                extend: 'excel',
                                title: 'Laba / Rugi',
                                exportOptions: {
                                    columns: ':not(:first-child)' // Exclude the first and last columns
                                }
                            },
                            {
                                extend: 'pdf',
                                title: 'Laba / Rugi',
                                exportOptions: {
                                    columns: ':not(:first-child)' // Exclude the first and last columns
                                }
                            },
                            {
                                extend: 'print',
                                title: 'Laba / Rugi',
                                exportOptions: {
                                    columns: ':not(:first-child)' // Exclude the first and last columns
                                }
                            }
                        ]
                    }
                }
            });
            $('#dataTable3').DataTable({
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\Rp.,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i :
                            0;
                    };

                    // Total over all pages
                    total = api
                        .column(4)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(4, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var formatRupiah = function(num) {
                        return 'Rp. ' + num.toLocaleString('id-ID', {
                            style: 'decimal',
                            maximumFractionDigits: 0
                        });
                    };

                    // Update footer with formatted totals
                    $(api.column(4).footer()).html(
                        formatRupiah(total)
                    );
                },
                layout: {
                    topStart: {
                        buttons: [{
                                text: 'Add',
                                action: function() {
                                    // Trigger the hidden button with data-target for create
                                    $('#createAddOmzet').click();
                                }
                            },
                            {
                                extend: 'excel',
                                title: 'Omzet',
                                exportOptions: {
                                    columns: ':not(:first-child)' // Exclude the first and last columns
                                }
                            },
                            {
                                extend: 'pdf',
                                title: 'Omzet',
                                exportOptions: {
                                    columns: ':not(:first-child)' // Exclude the first and last columns
                                }
                            },
                            {
                                extend: 'print',
                                title: 'Omzet',
                                exportOptions: {
                                    columns: ':not(:first-child)' // Exclude the first and last columns
                                }
                            }
                        ]
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const neracaRadio = document.getElementById('neraca_radio');
            const labarugiRadio = document.getElementById('labarugi_radio');
            const omzetRadio = document.getElementById('omzet_radio');
            const neracaContent = document.getElementById('neraca_content');
            const labarugiContent = document.getElementById('labarugi_content');
            const omzetContent = document.getElementById('omzet_content');

            if (neracaRadio.checked) {
                neracaContent.classList.remove('hidden');
                labarugiContent.classList.add('hidden');
                omzetContent.classList.add('hidden');
            }

            // Get the selected category from the session
            const selectCategory = "{{ session('selected_radio', '') }}";

            // Set the correct radio button based on the session value
            document.querySelectorAll('input[name="kategori"]').forEach(radio => {
                if (radio.value === selectCategory) {
                    radio.checked = true;
                }

                // Show/hide the content based on the selected radio button
                radio.addEventListener('change', function() {
                    if (this.value === 'neraca') {
                        neracaContent.classList.remove('hidden');
                        labarugiContent.classList.add('hidden');
                        omzetContent.classList.add('hidden');
                    } else if (this.value === 'labarugi') {
                        neracaContent.classList.add('hidden');
                        labarugiContent.classList.remove('hidden');
                        omzetContent.classList.add('hidden');
                    } else if (this.value === 'omzet') {
                        neracaContent.classList.add('hidden');
                        labarugiContent.classList.add('hidden');
                        omzetContent.classList.remove('hidden');
                    }
                });
            });

            // Trigger change event for the initially selected radio
            if (selectCategory) {
                document.querySelector(`input[value="${selectCategory}"]`).dispatchEvent(new Event('change'));
            }
        });
    </script>

@endsection()
