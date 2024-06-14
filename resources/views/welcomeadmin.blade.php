@extends('layouts.appadmin')
@section('content')
    <div class="grid grid-cols-4 gap-4 mb-4">
        <div class="grid grid-cols-2 gap-4 bg-green-700 items-center rounded dark:bg-gray-800 p-[1rem]">
            <div class="">
                <label class="flex" for="">Traffic</label>
                <span>340,786</span>
            </div>
            <div class="">
                <div class="opacity-50">
                    <svg class="w-full" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 bg-green-700 items-center  rounded dark:bg-gray-800 p-[1rem]">
            <div class="">
                <label class="flex" for="">User</label>
                <span>{{ $total_users }}</span>
            </div>
            <div class="">
                <div class="opacity-50">
                    <svg class="w-full" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 bg-green-700 items-center rounded dark:bg-gray-800 p-[1rem]">
            <div class="">
                <label class="flex" for="">Penjualan</label>
                <span>340,786</span>
            </div>
            <div class="">
                <div class="opacity-50">
                    <svg class="w-full" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M374.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-320 320c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l320-320zM128 128A64 64 0 1 0 0 128a64 64 0 1 0 128 0zM384 384a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4 bg-green-700 items-center rounded dark:bg-gray-800 p-[1rem]">
            <div class="">
                <label class="flex" for="">Percents</label>
                <span>340,786</span>
            </div>
            <div class="">
                <div class="opacity-50">
                    <svg class="w-full" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M374.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-320 320c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l320-320zM128 128A64 64 0 1 0 0 128a64 64 0 1 0 128 0zM384 384a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="items-center justify-center rounded bg-gray-50 h-fit dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <label for="">Data pembeli</label>
                <select id="monthFilterUserPembeli">
                    <option>filter</option>
                    <option value="">All Months</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Augustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <canvas id="line_user_pembeli"></canvas>
        </div>
        <div class="items-center justify-center rounded bg-gray-50 h-fit dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <label for="">Data Barang</label>
                <select id="monthFilterItems">
                    <option>filter</option>
                    <option value="">All Months</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Augustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <canvas id="line_items"></canvas>
        </div>
        <div class="items-center justify-center rounded bg-gray-50 h-fit dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <label for="">Data Event</label>
                <select id="monthFilterEvents">
                    <option>filter</option>
                    <option value="">All Months</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Augustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <canvas id="line_events"></canvas>
        </div>
        <div class="items-center justify-center rounded bg-gray-50 h-fit dark:bg-gray-800">
            <div class="flex items-center justify-between">
                <label for="">Data KSM</label>
                <select id="monthFilterUserKsm">
                    <option>filter</option>
                    <option value="">All Months</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Augustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <canvas id="line_user_ksm"></canvas>
        </div>
    </div>
    <div class="items-center justify-center h-fit mb-4 rounded bg-gray-50 dark:bg-gray-800">
        <div class="flex items-center justify-between">
            <label for="">Data Pendaftar Event</label>
            <select id="monthFilterRegisterEvents">
                <option value="">All Months</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
        <canvas id="line_register_events"></canvas>
    </div>

    <script>
        // Mengambil data PHP dari Blade dan mengonversi ke dalam JavaScript
        const userData = @json($userData);
        const items = @json($items);
        const events = @json($events);
        const register_events = @json($register_events);

        const color = 'rgb(54, 162, 235)'; // Warna biru untuk peran 'pembeli'
        const itemColor = ['rgb(0, 0, 255)', 'rgb(255, 0, 0)'];

        function filterByMonth(data, month) {
            if (!month) return data;
            return data.filter(item => item.day.substring(5, 7) === month);
        }

        function updateChart(chart, data, labels, labelText) {
            chart.data.labels = labels;
            chart.data.datasets[0].data = data;
            chart.data.datasets[0].label = labelText;
            chart.update();
        }

        function setupMonthFilter(filterId, chart, data, role = null) {
            const filterElement = document.getElementById(filterId);

            filterElement.addEventListener('change', () => {
                const selectedMonth = filterElement.value;
                const filteredData = filterByMonth(data, selectedMonth);

                const chartData = role ? filteredData.filter(item => item.role === role) : filteredData;
                const labels = chartData.map(item => item.day);
                const values = chartData.map(item => item.total_users || item.total_items || item.total_events ||
                    item.total_register_events);
                const total = values.reduce((a, b) => a + b, 0);

                updateChart(chart, values, labels,
                    `Data ${(role ? role.charAt(0).toUpperCase() + role.slice(1) : '')} (Total: ${total})`);
            });
        }

        // Creating the charts
        const lineChartUserPembeli = new Chart(document.getElementById('line_user_pembeli'), {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: '',
                    data: [],
                    fill: true,
                    borderColor: color,
                    tension: 0.1
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

        const barChartItems = new Chart(document.getElementById('line_items'), {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: '',
                    data: [],
                    fill: false,
                    backgroundColor: itemColor,
                    tension: 0.1
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

        const barChartEvents = new Chart(document.getElementById('line_events'), {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: '',
                    data: [],
                    fill: false,
                    backgroundColor: itemColor,
                    tension: 0.1
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

        const barChartKsms = new Chart(document.getElementById('line_user_ksm'), {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: '',
                    data: [],
                    fill: true,
                    borderColor: color,
                    tension: 0.1
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

        const barChartRegister = new Chart(document.getElementById('line_register_events'), {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: '',
                    data: [],
                    fill: true,
                    backgroundColor: color,
                    borderColor: color,
                    tension: 0.1
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

        // Setup month filters
        setupMonthFilter('monthFilterUserPembeli', lineChartUserPembeli, userData, 'pembeli');
        setupMonthFilter('monthFilterItems', barChartItems, items);
        setupMonthFilter('monthFilterEvents', barChartEvents, events);
        setupMonthFilter('monthFilterUserKsm', barChartKsms, userData, 'ksm');
        setupMonthFilter('monthFilterRegisterEvents', barChartRegister, register_events);

        // Initial update
        function initialUpdate(chart, data, role = null) {
            const chartData = role ? data.filter(item => item.role === role) : data;
            const labels = chartData.map(item => item.day);
            const values = chartData.map(item => item.total_users || item.total_items || item.total_events || item
                .total_register_events);
            const total = values.reduce((a, b) => a + b, 0);

            updateChart(chart, values, labels,
                `Data ${(role ? role.charAt(0).toUpperCase() + role.slice(1) : '')} (Total: ${total})`);
        }

        initialUpdate(lineChartUserPembeli, userData, 'pembeli');
        initialUpdate(barChartItems, items);
        initialUpdate(barChartEvents, events);
        initialUpdate(barChartKsms, userData, 'ksm');
        initialUpdate(barChartRegister, register_events);
    </script>
@endsection()
