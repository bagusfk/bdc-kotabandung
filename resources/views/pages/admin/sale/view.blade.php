@extends('layouts.appadmin')
@section('title', 'Kelola Penjualan')
@section('content')

<div class="grid grid-cols-2 gap-4 dark:bg-gray-800 bg-yellow-500 p-4 md:p-6">
    <div class="bg-black">
        <canvas id="chartBar"></canvas>
    </div>
    <div class="bg-black">
        <canvas id="chartLine"></canvas>
    </div>
</div>


    <div class="flex justify-between">
        <div class="flex items-center">
            <svg class="w-6 h-6 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M111.4 295.9c-3.5 19.2-17.4 108.7-21.5 134-.3 1.8-1 2.5-3 2.5H12.3c-7.6 0-13.1-6.6-12.1-13.9L58.8 46.6c1.5-9.6 10.1-16.9 20-16.9 152.3 0 165.1-3.7 204 11.4 60.1 23.3 65.6 79.5 44 140.3-21.5 62.6-72.5 89.5-140.1 90.3-43.4 .7-69.5-7-75.3 24.2zM357.1 152c-1.8-1.3-2.5-1.8-3 1.3-2 11.4-5.1 22.5-8.8 33.6-39.9 113.8-150.5 103.9-204.5 103.9-6.1 0-10.1 3.3-10.9 9.4-22.6 140.4-27.1 169.7-27.1 169.7-1 7.1 3.5 12.9 10.6 12.9h63.5c8.6 0 15.7-6.3 17.4-14.9 .7-5.4-1.1 6.1 14.4-91.3 4.6-22 14.3-19.7 29.3-19.7 71 0 126.4-28.8 142.9-112.3 6.5-34.8 4.6-71.4-23.8-92.6z"/></svg>
            <span class="text-2xl font-semibold ml-[1rem]">Kelola Penjualan</span>
        </div>
        <div class="lg:w-[500px]">
            <form class="w-full flex items-center mx-auto">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Event" required />
                </div>
                <button type="submit" class="w-1/4 p-2.5 ms-2 text-sm font-medium text-white bg-primary rounded-lg border border-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">Cari
                    {{-- <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg> --}}
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
    </div>

    <div class="w-fit mt-[1rem]">
        <h2 class="text-lg font-semibold border-b-2 border-black">Data Pesanan Masuk</h2>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-[1rem] min-h-[20rem]">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pembeli
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email Pembeli
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah Pesanan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Produk KSM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cluster KSM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Konfirmasi Pesanan
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                {{-- @foreach ($events as $data)
                    <tr>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $no++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->event_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->event_organizer }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->description }}
                        </td>
                        <td class="px-6 py-4 flex">
                            <a href="{{ url('/edit-item/' . $data->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Edit</a>
                            <form method="POST" action="{{ url('/delete-item/'.$data->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="font-medium text-red-700 dark:text-blue-500 hover:underline" onclick="return confirm('Are you sure you want to search Google?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
{{--
    {{ $events->links() }} --}}

    <div class="w-full mt-[1rem] flex justify-end">
        <a href="#" class="w-fit p-2.5 ms-2 text-sm font-medium text-primary border border-primary focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800">
            <svg class="w-4 h-4 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#04a7ff" d="M64 464l48 0 0 48-48 0c-35.3 0-64-28.7-64-64L0 64C0 28.7 28.7 0 64 0L229.5 0c17 0 33.3 6.7 45.3 18.7l90.5 90.5c12 12 18.7 28.3 18.7 45.3L384 304l-48 0 0-144-80 0c-17.7 0-32-14.3-32-32l0-80L64 48c-8.8 0-16 7.2-16 16l0 384c0 8.8 7.2 16 16 16zM176 352l32 0c30.9 0 56 25.1 56 56s-25.1 56-56 56l-16 0 0 32c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-48 0-80c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24l-16 0 0 48 16 0zm96-80l32 0c26.5 0 48 21.5 48 48l0 64c0 26.5-21.5 48-48 48l-32 0c-8.8 0-16-7.2-16-16l0-128c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16l0-64c0-8.8-7.2-16-16-16l-16 0 0 96 16 0zm80-112c0-8.8 7.2-16 16-16l48 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 32 32 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-32 0 0 48c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-64 0-64z"/></svg>
            Cetak Data Pesanan Masuk
        </a>
    </div>
<script>
    const ctx = document.getElementById('chartBar');
    const line = document.getElementById('chartLine');

    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
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
    new Chart(line, {
        type:'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'My First Dataset',
                data: [65, 59, 80, 81, 56, 55],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
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
    </script>
@endsection()
