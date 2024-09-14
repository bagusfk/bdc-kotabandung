@extends('layouts.appkepalabidang')
@section('title', 'Fashion')
@section('content')
    {{-- <style>
        table,
        th {
            border: 1px solid black;
        }

        table,
        th,
        td {
            text-align: center;
            padding: 0 40px 0 40px;
        }
    </style> --}}
    @php
        $url = request()->segment(2);
        $routeUrls = [
            'terlaris_id' => 0,
            'laris_id' => 1,
            'kurang_laris_id' => 2,
        ];
        $currentRoute = Route::currentRouteName();
        // dd($currentRoute);
    @endphp
    <h3 class="text-sm">Produk {{ $status }}</h3>
    <div class="flex items-center justify-between">
        <div class="w-[10rem]">
            <div class="">
                <ul class="bg-slate-200">
                    @foreach ($category as $categories)
                        @php
                            $selectedUrlIndex = $routeUrls[$currentRoute] ?? 0;
                            // dd($selectedUrlIndex);
                        @endphp
                        <li>
                            <a href="{{ url($categories->url[$selectedUrlIndex]) }}"
                                class="group flex w-full items-center px-2 py-4 text-gray-900 transition duration-75 hover:rounded-none hover:bg-primary dark:hover:bg-gray-700">
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128h95.1l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H347.1L325.8 320H384c17.7 0 32 14.3 32 32s-14.3 32-32 32H315.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7H155.1l-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l21.3-128H64c-17.7 0-32-14.3-32-32s14.3-32 32-32h68.9l11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320h95.1l21.3-128H187.1z" />
                                </svg>
                                <span class="ms-3 flex-1 whitespace-nowrap">{{ $categories->category }}</span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="w-full">
                <table class="w-full border-collapse border border-slate-500">
                    <thead>
                        <tr>
                            <th class="border border-slate-600 px-16 text-center">Produk</th>
                            <th class="border border-slate-600 px-16 text-center">Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $orders)
                            <tr>
                                <td class="border border-slate-600 px-16 text-center">{{ $orders->product_name }}</td>
                                <td class="border border-slate-600 px-16 text-center">{{ $orders->total_qty }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if (!$url)
        @else
            <div class="w-1/2">
                <canvas id="terlaris"></canvas>
            </div>
        @endif
    </div>

    @if (!$url)
    @else
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const order = @json($order);
                const labels = order.map(order => order.product_name);
                const data = order.map(order => order.total_qty);
                const color = 'rgb(54, 162, 235)';
                const maxQty = Math.max(...data);
                const stepSize = maxQty + 2.5;


                const lineChartUserPembeli = new Chart(document.getElementById('terlaris'), {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Order Quantity',
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
    @endif
@endsection()
