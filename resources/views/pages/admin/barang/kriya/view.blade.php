@extends('layouts.appadmin')
@section('title', 'Kriya')
@section('content')
    <style>
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
    </style>
    <h3 class="text-sm">Produk Kriya Terjual</h3>
    <div class="flex">
        <div class="w-full">
            <table>
                <thead>
                    <th>Produk</th>
                    <th>Terjual</th>
                </thead>
                <tbody>
                    @foreach ($order as $orders)
                        <tr>
                            <td>{{ $orders->product_name }}</td>
                            <td>{{ $orders->total_qty }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full">
            <canvas id="terlaris"></canvas>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const order = @json($order);
            const labels = order.map(order => order.product_name);
            const data = order.map(order => order.total_qty);
            const color = 'rgb(54, 162, 235)';
            const maxQty = Math.max(...data);
            const stepSize = maxQty * 2.5;


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
@endsection()
