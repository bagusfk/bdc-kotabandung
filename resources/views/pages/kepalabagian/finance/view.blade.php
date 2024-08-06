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

        <div class="mt-[1rem]">
            @if (session('delete'))
                <div id="alert-2"
                    class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {!! html_entity_decode(session('delete')) !!}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @elseif (session('status'))
                <div id="alert-1"
                    class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {!! html_entity_decode(session('status')) !!}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
        </div>
        <div class="relative overflow-x-auto sm:rounded-lg my-[1rem] min-h-[20rem]">
            <label for="" class="font-bold text-lg block text-center">Neraca</label>
            <table class="display nowrap text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pt-[.5rem]"
                id="dataTable" style="width:100%;">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-center">Kas</th>
                        <th scope="col" class="px-6 py-3 text-center">Piutang</th>
                        <th scope="col" class="px-6 py-3 text-center">Perlengkapan</th>
                        <th scope="col" class="px-6 py-3 text-center">Peralatan</th>
                        <th scope="col" class="px-6 py-3 text-center">Utang</th>
                        <th scope="col" class="px-6 py-3 text-center">Modal</th>
                        <th scope="col" class="px-6 py-3 text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody id="dataList">
                    @foreach ($neraca as $data)
                        <tr class="text-center border-b border-black">
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">
                                {{ \Carbon\Carbon::parse($data->input_date)->format('d M Y') }}</td>
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">{{ $data->cash }}</td>
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">{{ $data->receivables }}</td>
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">{{ $data->supplies }}</td>
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">{{ $data->equipment }}</td>
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">{{ $data->debt }}</td>
                            <td class="pt-3 pb-1 px-6 border-r border-slate-400">{{ $data->capital }}</td>
                            <td class="pt-3 pb-1 px-6">{{ $data->information }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="labarugi_content">
        <div class="relative overflow-x-auto sm:rounded-lg my-[1rem] min-h-[20rem]">
            <label for="" class="font-bold text-lg block text-center">Laba / Rugi</label>
            <table class="display nowrap text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pt-[.5rem]"
                id="dataTable2" style="width: 100%;">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Nama KSM
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Penjualan
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Laba
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Rugi
                        </th>
                    </tr>
                </thead>
                <tbody id="dataList2">
                    @if ($finance->isEmpty())
                        <!-- Anda dapat menambahkan pesan atau tindakan lain jika tidak ada data -->
                    @else
                        @foreach ($finance as $finances)
                            <tr>
                                <td class="px-6 py-4 text-center">
                                    {{ \Carbon\Carbon::parse($finances->date_sale)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $finances->ksm->owner }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $finances->sale }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $finances->profit }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $finances->loss }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div id="omzet_content" class="relative">
        <label for="" class="font-bold text-lg block text-center">Omzet / {{ $currentMonthName }}</label>

        <div class="w-2/5 rounded-lg dark:bg-gray-800 p-4 md:p-6">
            <canvas id="chartLine2"></canvas>
        </div>

        <div class="relative overflow-x-auto sm:rounded-lg my-[1rem] min-h-[20rem]">
            <label for="" class="font-bold text-lg block text-center">Omzet</label>
            <table class="display nowrap text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pt-[.5rem]"
                id="dataTable3" style="width: 100%;">
                <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">
                            Nama KSM
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Omzet
                        </th>
                    </tr>
                </thead>
                <tbody id="dataList3">
                    @if ($omzet->isEmpty())
                        <!-- Anda dapat menambahkan pesan atau tindakan lain jika tidak ada data -->
                    @else
                        @foreach ($omzet as $omzets)
                            <tr>
                                <td class="px-6 py-4 text-center">
                                    {{ $omzets->ksm->owner }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $omzets->omzet }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
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
            $('#dataTable2').DataTable({
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
            $('#dataTable3').DataTable({
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

    <script>
        const neracaRadio = document.getElementById('neraca_radio');
        const neracaContent = document.getElementById('neraca_content');
        const labarugiContent = document.getElementById('labarugi_content');
        const omzetContent = document.getElementById('omzet_content');

        if (neracaRadio.checked) {
            neracaContent.classList.remove('hidden');
            labarugiContent.classList.add('hidden');
            omzetContent.classList.add('hidden');
        }

        document.querySelectorAll('input[name="kategori"]').forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'neraca') {
                    neracaContent.classList.remove('hidden');
                    labarugiContent.classList.add('hidden');
                    omzetContent.classList.add('hidden');
                } else if (this.value === 'labarugi') {
                    neracaContent.classList.add('hidden');
                    labarugiContent.classList.remove('hidden');
                    omzetContent.classList.add('hidden');
                } else {
                    neracaContent.classList.add('hidden');
                    labarugiContent.classList.add('hidden');
                    omzetContent.classList.remove('hidden');
                }
            });
        });
        // Data dari server (Laravel Blade template)
        var debt = @json($debt);
        var labels = @json($labels);

        // Fungsi untuk menghasilkan warna RGB acak
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        // Generate array warna yang sama panjang dengan data
        var backgroundColors = debt.map(() => getRandomColor());

        const ctx = document.getElementById('chartLine2').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Omzet',
                    data: debt,
                    backgroundColor: backgroundColors,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    datalabels: {
                        display: true,
                        color: '#fff',
                        anchor: 'center',
                        align: 'center',
                        formatter: (value) => {
                            return `${value}`; // Menampilkan nilai omzet
                        },
                        font: {
                            weight: 'bold',
                            size: 14
                        },
                        offset: 0
                    },
                    legend: {
                        position: 'top',
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>

@endsection()
