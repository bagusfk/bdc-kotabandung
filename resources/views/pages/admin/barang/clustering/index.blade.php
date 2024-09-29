@extends('layouts.appadmin')
@section('title', 'Clustering')
@section('content')
    <div class="grid grid-cols-2">
        <div>
            <h1>Category Terlaris</h1>
            <div class="flex h-full items-center justify-center gap-4">
                <div class="flex items-center rounded-lg border-4 border-yellow-300 px-4 py-2">
                    <div>
                        <h1 class="w-48 truncate text-3xl font-bold">{{ $salesByCategory->first()->category_name }}</h1>
                    </div>
                    <div class="h-fit w-16 rounded-lg border p-1 text-center">
                        <p class="text-sm">Terjual</p>
                        <h1 class="text-md font-semibold">{{ $salesByCategory->first()->total_sales }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full max-w-[500px]">
            <canvas id="terlaris"></canvas>
        </div>
    </div>
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="-mb-px flex flex-wrap text-center text-sm font-medium" id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block rounded-t-lg border-b-2 p-4" id="profile-tab" data-tabs-target="#profile"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">Terlaris</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block rounded-t-lg border-b-2 p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300"
                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                    aria-selected="false">Laris</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block rounded-t-lg border-b-2 p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300"
                    id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings"
                    aria-selected="false">Kurang Laris</button>
            </li>
        </ul>
    </div>
    <div id="default-tab-content">
        <div class="hidden rounded-lg bg-gray-50 p-4 dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <h1>Produk Terlaris</h1>
            <div class="flex flex-wrap-reverse items-end justify-between gap-8">
                <div class="relative my-[1rem] w-fit overflow-x-auto shadow-md sm:rounded-lg">
                    <table id="dataTable"
                        class="display nowrap text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-3 py-2">
                                    No
                                </th>
                                <th scope="col" class="px-3 py-2">
                                    Gambar
                                </th>
                        </thead>
                        <tbody id="dataList">
                            @foreach ($terlaris as $item)
                                <tr
                                    class="{{ $loop->iteration == 1 ? 'border-yellow-300' : 'border-transparent' }} border-4">
                                    <th scope="row"
                                        class="whitespace-nowrap px-3 py-2 font-medium text-gray-900 dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-3 py-2">
                                        <div class="flex items-start gap-4">
                                            <img class="h-16 w-16 overflow-hidden rounded-lg border bg-gray-100"
                                                src="{{ asset($item->product_pictures()->first()->product_picture ?? 'assets/default/image/default-product.jpg') }}"
                                                alt="">
                                            <div>
                                                <h1 class="text-md w-48 truncate font-bold">{{ $item->name }}
                                                </h1>
                                                <p class="text-sm">{{ $item->ksm()->first()->brand_name }}</p>
                                                <p class="text-sm text-gray-400">kategory: {{ $item->category->category }}
                                                </p>
                                            </div>
                                            <div class="w-16 rounded-lg border p-1 text-center">
                                                <p class="text-sm">Terjual</p>
                                                <h1 class="text-md font-semibold">{{ $item->sales }}</h1>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="hidden rounded-lg bg-gray-50 p-4 dark:bg-gray-800" id="dashboard" role="tabpanel"
            aria-labelledby="dashboard-tab">
            <h1>Produk Laris</h1>
            <div class="flex flex-wrap-reverse items-end justify-between gap-8">
                <div class="relative my-[1rem] w-fit overflow-x-auto shadow-md sm:rounded-lg">
                    <table id="dataTablelaris"
                        class="display nowrap text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-3 py-2">
                                    No
                                </th>
                                <th scope="col" class="px-3 py-2">
                                    Gambar
                                </th>
                        </thead>
                        <tbody id="dataList">
                            @foreach ($laris as $item)
                                <tr
                                    class="{{ $loop->iteration == 1 ? 'border-yellow-300' : 'border-transparent' }} border-4">
                                    <th scope="row"
                                        class="whitespace-nowrap px-3 py-2 font-medium text-gray-900 dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-3 py-2">
                                        <div class="flex items-start gap-4">
                                            <img class="h-16 w-16 overflow-hidden rounded-lg border bg-gray-100"
                                                src="{{ asset($item->product_pictures()->first()->product_picture ?? 'assets/default/image/default-product.jpg') }}"
                                                alt="">
                                            <div>
                                                <h1 class="text-md w-48 truncate font-bold">{{ $item->name }}
                                                </h1>
                                                <p class="text-sm">{{ $item->ksm()->first()->brand_name }}</p>
                                                <p class="text-sm text-gray-400">kategory: {{ $item->category->category }}
                                                </p>
                                            </div>
                                            <div class="w-16 rounded-lg border p-1 text-center">
                                                <p class="text-sm">Terjual</p>
                                                <h1 class="text-md font-semibold">{{ $item->sales }}</h1>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="hidden rounded-lg bg-gray-50 p-4 dark:bg-gray-800" id="settings" role="tabpanel"
            aria-labelledby="settings-tab">
            <h1>Produk Kurang Laris</h1>
            <div class="flex flex-wrap-reverse items-end justify-between gap-8">
                <div class="relative my-[1rem] w-fit overflow-x-auto shadow-md sm:rounded-lg">
                    <table id="dataTablekuranglaris"
                        class="display nowrap text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-3 py-2">
                                    No
                                </th>
                                <th scope="col" class="px-3 py-2">
                                    Gambar
                                </th>
                        </thead>
                        <tbody id="dataList">
                            @foreach ($kurangLaris as $item)
                                <tr
                                    class="{{ $loop->iteration == 1 ? 'border-yellow-300' : 'border-transparent' }} border-4">
                                    <th scope="row"
                                        class="whitespace-nowrap px-3 py-2 font-medium text-gray-900 dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-3 py-2">
                                        <div class="flex items-start gap-4">
                                            <img class="h-16 w-16 overflow-hidden rounded-lg border bg-gray-100"
                                                src="{{ asset($item->product_pictures()->first()->product_picture ?? 'assets/default/image/default-product.jpg') }}"
                                                alt="">
                                            <div>
                                                <h1 class="text-md w-48 truncate font-bold">{{ $item->name }}
                                                </h1>
                                                <p class="text-sm">{{ $item->ksm()->first()->brand_name }}</p>
                                                <p class="text-sm text-gray-400">kategory: {{ $item->category->category }}
                                                </p>
                                            </div>
                                            <div class="w-16 rounded-lg border p-1 text-center">
                                                <p class="text-sm">Terjual</p>
                                                <h1 class="text-md font-semibold">{{ $item->sales }}</h1>
                                            </div>
                                        </div>
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
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
                paging: true,
                ordering: false,
                info: false,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
            });
            $('#dataTablelaris').DataTable({
                responsive: true,
                paging: true,
                ordering: false,
                info: false,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
            });
            $('#dataTablekuranglaris').DataTable({
                responsive: true,
                paging: true,
                ordering: false,
                info: false,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const salesData = @json($salesByCategory); // $items adalah hasil query tadi

            const labels = salesData.map(item => item.category_name);
            const data = salesData.map(item => item.total_sales);

            const color = 'rgb(54, 162, 235)';
            const maxSales = Math.max(...data);
            const stepSize = maxSales + 1;

            const lineChartUserPembeli = new Chart(document.getElementById('terlaris'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Penjualan',
                        data: data,
                        backgroundColor: color,
                        borderColor: color,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: stepSize,
                        }
                    }
                }
            });
        });
    </script>
@endsection
