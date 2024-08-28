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

        .border-bottom {
            border: none;
            border-bottom: 1px solid #000000;
            background: none;
        }

        .border-bottom:focus {
            border: none;
        }
    </style>

    @if (session('status'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
            {{ session('status') }}
        </div>
    @endif
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
        {{-- <button class="bg-primary text-white p-[.5rem] mr-2" onclick="sortData('asc')">Sort Ascending</button>
        <button class="bg-primary text-white p-[.5rem] mr-2" onclick="sortData('desc')">Sort Descending</button>
        <button class="bg-primary text-white p-[.5rem]" onclick="clearSorting()">Clear Sorting</button> --}}
    </div>

    <div class=" dark:bg-gray-800 md:p-6">
        <div class="">
            <canvas id="report_item"></canvas>
        </div>
    </div>

    <div class="w-fit mt-[1rem]">
        <h2 class="text-lg font-semibold border-b-2 border-black">Data Pesanan Masuk</h2>
    </div>

    <div class="relative overflow-x-auto sm:rounded-lg my-[1rem] min-h-[20rem]">
        <table id="dataTable" class="display nowrap text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Produk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Qty
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga/satuan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Toko
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pembeli
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat Pembeli
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ekspedisi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No. Resi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody id="dataList">
                @php
                    $no = 1;
                @endphp
                @foreach ($order as $orders)
                    <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $no++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $orders->product_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $orders->total_qty }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $orders->price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $orders->brand_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $orders->user_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $orders->user_address }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($orders->expedition && $orders->expedition_type != null)
                                {{ $orders->expedition }},
                                {{ $orders->expedition_type }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('no_resi', $orders->transaction) }}" method="POST">
                                @csrf
                                <input type="text" class="border-bottom" name="no_resi" value="{{ $orders->no_resi }}">
                                <button type="submit" class="p-[0.5rem] bg-green-500 rounded-lg hover:bg-green-600">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"
                                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4">
                            {{ $orders->total_price }}
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ url('order_status/' . $orders->transaction) }}" method="POST">
                                @csrf
                                <select name="status" id="status">
                                    <option value="process" {{ $orders->order_status == 'process' ? 'selected' : '' }}>
                                        Proses
                                    </option>
                                    <option value="dikemas" {{ $orders->order_status == 'dikemas' ? 'selected' : '' }}>
                                        Dikemas
                                    </option>
                                    <option value="dikirim" {{ $orders->order_status == 'dikirim' ? 'selected' : '' }}>
                                        Dikirim
                                    </option>
                                    <option value="selesai" {{ $orders->order_status == 'selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>
                                    <option value="cancel" {{ $orders->order_status == 'cancel' ? 'selected' : '' }}>Batal
                                    </option>
                                </select>
                                <button type="submit" class="p-[0.5rem] bg-green-500 rounded-lg hover:bg-green-600">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"
                                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script type="text/javascript">
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
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            axios.get('/report-item-json')
                .then(function(response) {
                    const categories = [];
                    const totalSold = [];
                    // Mengelompokkan data berdasarkan kategori
                    response.data.forEach(item => {
                        if (!categories.includes(item.category_name)) {
                            categories.push(item.category_name);
                            totalSold.push(item.total_sold);
                        } else {
                            // Jika kategori sudah ada, update total penjualan
                            const index = categories.indexOf(item.category_name);
                            totalSold[index] += item.total_sold;
                        }
                    });

                    const ctx = document.getElementById('report_item').getContext('2d');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: categories,
                            datasets: [{
                                label: 'Total Sold',
                                data: totalSold,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                })
        })
    </script>
    <script>
        //     document.addEventListener("DOMContentLoaded", function() {
        //         fetch('/report-item-json')
        //             .then(console.log(response.json()))
        //             .then(data => {
        //                 const categories = [];
        //                 const totalSold = [];
        //                 console.log(response);
        //                 // Mengelompokkan data berdasarkan kategori
        //                 data.forEach(item => {
        //                     if (!categories.includes(item.category_name)) {
        //                         categories.push(item.category_name);
        //                         totalSold.push(item.total_sold);
        //                     } else {
        //                         // Jika kategori sudah ada, update total penjualan
        //                         const index = categories.indexOf(item.category_name);
        //                         totalSold[index] += item.total_sold;
        //                     }
        //                 });

        //                 const ctx = document.getElementById('report_item').getContext('2d');

        //                 new Chart(ctx, {
        //                     type: 'bar',
        //                     data: {
        //                         labels: categories,
        //                         datasets: [{
        //                             label: 'Total Sold',
        //                             data: totalSold,
        //                             backgroundColor: 'rgba(75, 192, 192, 0.2)',
        //                             borderColor: 'rgba(75, 192, 192, 1)',
        //                             borderWidth: 1
        //                         }]
        //                     },
        //                     options: {
        //                         scales: {
        //                             y: {
        //                                 beginAtZero: true
        //                             }
        //                         }
        //                     }
        //                 });
        //             })
        //             .catch(error => console.error('Error fetching data:', error));
        //     });
        //
    </script>
@endsection()
