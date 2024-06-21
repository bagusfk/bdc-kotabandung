@extends('layouts.appadmin')
@section('title', 'Kelola Penjualan')
@section('content')

    <style>
        select#dt-length-0 {
            padding-right: 2.5rem;
        }

        table.dataTable td.dt-type-numeric {
            text-align: center;
        }

        table.dataTable th.dt-type-numeric {
            text-align: left;
        }
    </style>

    <div class="flex justify-between mb-[2rem]">
        <div class="flex items-center">
            <svg class="w-6 h-6 inline-flex" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M111.4 295.9c-3.5 19.2-17.4 108.7-21.5 134-.3 1.8-1 2.5-3 2.5H12.3c-7.6 0-13.1-6.6-12.1-13.9L58.8 46.6c1.5-9.6 10.1-16.9 20-16.9 152.3 0 165.1-3.7 204 11.4 60.1 23.3 65.6 79.5 44 140.3-21.5 62.6-72.5 89.5-140.1 90.3-43.4 .7-69.5-7-75.3 24.2zM357.1 152c-1.8-1.3-2.5-1.8-3 1.3-2 11.4-5.1 22.5-8.8 33.6-39.9 113.8-150.5 103.9-204.5 103.9-6.1 0-10.1 3.3-10.9 9.4-22.6 140.4-27.1 169.7-27.1 169.7-1 7.1 3.5 12.9 10.6 12.9h63.5c8.6 0 15.7-6.3 17.4-14.9 .7-5.4-1.1 6.1 14.4-91.3 4.6-22 14.3-19.7 29.3-19.7 71 0 126.4-28.8 142.9-112.3 6.5-34.8 4.6-71.4-23.8-92.6z" />
            </svg>
            <span class="text-2xl font-semibold ml-[1rem]">Kelola Penjualan</span>
        </div>
    </div>
    <div class="w-full flex justify-end">
        <button class="bg-primary text-white p-[.5rem] mr-2" onclick="sortData('asc')">Sort Ascending</button>
        <button class="bg-primary text-white p-[.5rem] mr-2" onclick="sortData('desc')">Sort Descending</button>
        <button class="bg-primary text-white p-[.5rem]" onclick="clearSorting()">Clear Sorting</button>
    </div>

    <div class="grid grid-cols-2 gap-4 dark:bg-gray-800 md:p-6">
        <div class="">
            <canvas id="chartBar"></canvas>
        </div>
        <div class="">
            <canvas id="chartLine"></canvas>
        </div>
    </div>

    <div class="w-fit mt-[1rem]">
        <h2 class="text-lg font-semibold border-b-2 border-black">Data Pesanan Masuk</h2>
    </div>

    <div class="relative overflow-x-auto sm:rounded-lg my-[1rem] min-h-[20rem]">
        <table id="dataTable" class="display w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pembeli
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Qty
                    </th>
                    <th scope="col" class="px-6 py-3">
                        KSM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cluster KSM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Konfirmasi Pesanan
                    </th>
                </tr>
            </thead>
            <tbody id="dataList">
                @php
                    $no = 1;
                @endphp
                @foreach ($pembeli as $data)
                    <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $no++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->users->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->users->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->product->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->qty }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->product->user->ksm->brand_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->product->user->ksm->cluster }}
                        </td>
                        <td class="px-6 py-4 flex">
                            <a href="{{ url('/edit-item/' . $data->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                            <form method="POST" action="{{ url('/delete-item/' . $data->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <button type="submit" class="font-medium text-red-700 dark:text-blue-500 hover:underline"
                                    onclick="return confirm('Are you sure you want to search Google?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                layout: {
                    topStart: {
                        buttons: ['print']
                    }
                }
            });
        });

        function tableToCSV() {
            var csv = [];
            var rows = document.querySelectorAll("table tr");

            for (var i = 0; i < rows.length; i++) {
                var row = [],
                    cols = rows[i].querySelectorAll("td, th");

                for (var j = 0; j < cols.length; j++)
                    row.push(cols[j].innerText);

                csv.push(row.join(","));
            }

            // Download CSV
            downloadCSV(csv.join("\n"));
        }

        function downloadCSV(csv) {
            var csvFile;
            var downloadLink;

            // CSV file
            csvFile = new Blob([csv], {
                type: "text/csv"
            });

            // Download link
            downloadLink = document.createElement("a");

            // File name
            downloadLink.download = "table_data.csv";

            // Create a link to the file
            downloadLink.href = window.URL.createObjectURL(csvFile);

            // Hide download link
            downloadLink.style.display = "none";

            // Add the link to DOM
            document.body.appendChild(downloadLink);

            // Click download link
            downloadLink.click();
        }
    </script>
    <script>
        var chartBar = null;
        var chartLine = null;
        var sortingOrder = null;

        document.addEventListener('DOMContentLoaded', function() {
            renderCharts();
        });

        function sortData(order) {
            sortingOrder = order;
            renderCharts();
        }

        function clearSorting() {
            sortingOrder = null;
            renderCharts();
        }

        function renderCharts() {
            if (chartBar) {
                chartBar.destroy();
            }
            if (chartLine) {
                chartLine.destroy();
            }

            var ctx = document.getElementById('chartBar').getContext('2d');
            var line = document.getElementById('chartLine').getContext('2d');
            var labels = {!! json_encode($chartSale['labels']) !!};
            var labelCount = {!! json_encode($chartSale['labelCount']) !!};
            var ksmCount = {!! json_encode($chartSale['ksmCount']) !!};
            var dataCount = {!! json_encode($chartSale['qtyCount']) !!};
            var data = {!! json_encode($chartSale['qty']) !!};
            var ksm = {!! json_encode($chartSale['ksm']) !!};
            var totalTerjual = {!! json_encode($penjual) !!}
            var ksmTotalCounts = {!! json_encode($chartSale['ksmTotalCounts']) !!};

            var maxsData = Math.max.apply(null, dataCount);
            var suggestedMaxs = maxsData * 1.2;

            var allData = dataCount.concat(ksmTotalCounts);
            var maxData = Math.max.apply(null, allData);
            var suggestedMax = maxData * 1.2;

            var sortedDataCount = [...dataCount];
            var sortedKsmTotalCounts = [...ksmTotalCounts];
            var sortedLabels = [...labelCount];
            var sortedKsmLabels = [...ksmCount];

            // Combine data and labels into arrays of objects
            var combinedData = dataCount.map((value, index) => {
                return {
                    value: value,
                    label: labelCount[index]
                };
            });
            var combinedKsmData = ksmTotalCounts.map((value, index) => {
                return {
                    value: value,
                    label: ksmCount[index]
                };
            });

            // Sort combined arrays based on sortingOrder
            if (sortingOrder === 'asc') {
                combinedData.sort((a, b) => a.value - b.value);
                combinedKsmData.sort((a, b) => a.value - b.value);
            } else if (sortingOrder === 'desc') {
                combinedData.sort((a, b) => b.value - a.value);
                combinedKsmData.sort((a, b) => b.value - a.value);
            }

            // Separate the sorted arrays back into individual arrays
            sortedDataCount = combinedData.map(item => item.value);
            sortedLabels = combinedData.map(item => item.label);
            sortedKsmTotalCounts = combinedKsmData.map(item => item.value);
            sortedKsmLabels = combinedKsmData.map(item => item.label);

            chartBar = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: sortedLabels,
                    datasets: [{
                        label: 'Produk Terjual',
                        data: sortedDataCount,
                        fill: true,
                        borderColor: 'rgb(75, 0, 192)',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: suggestedMaxs
                        }
                    }
                }
            });

            chartLine = new Chart(line, {
                type: 'bar',
                data: {
                    labels: sortedKsmLabels,
                    datasets: [{
                        label: 'Total Barang KSM Yang Terjual',
                        data: sortedKsmTotalCounts,
                        fill: false,
                        backgroundColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: suggestedMax
                        }
                    },
                }
            });
        }
    </script>
@endsection()
