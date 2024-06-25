@extends('layouts.appadmin')
@section('title', 'Kelola Barang')
@section('content')
    <div class="w-full text-right" id="currentMonth"></div>
    <div class="relative overflow-x-auto shadow-md my-[1rem]">
        <canvas id="report_item"></canvas>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('/report-item-json')
                .then(response => response.json())
                .then(data => {
                    const categories = [];
                    const categoryNames = [];
                    const totalSold = [];

                    // Memproses data untuk grafik
                    data.forEach(product => {
                        if (!categories.includes(product.category_id)) {
                            categories.push(product.category_id);
                            categoryNames.push(product.name);
                        }
                        totalSold.push(product.total_sold);
                    });

                    const ctx = document.getElementById('report_item').getContext('2d');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: categoryNames,
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
                .catch(error => console.error('Error fetching data:', error));
        });
    </script>
@endsection()
