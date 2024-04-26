@extends('layouts.appadmin')
@section('title', 'Kelola Penjualan')
@section('content')
    <div class="flex justify-between">
        <div class="flex items-center">
            <svg class="w-6 h-6 inline-flex" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM176 256a112 112 0 1 1 224 0 112 112 0 1 1 -224 0zm76-48c0 9.7 6.9 17.7 16 19.6V276h-4c-11 0-20 9-20 20s9 20 20 20h24 24c11 0 20-9 20-20s-9-20-20-20h-4V208c0-11-9-20-20-20H272c-11 0-20 9-20 20z"/></svg>
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

    <div id="neraca_content" class="relative overflow-x-auto shadow-md sm:rounded-lg my-[1rem] min-h-[20rem]">
        <label for="" class="font-bold text-lg block text-center">Neraca</label>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        Passiva
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Activa
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

    <div id="labarugi_content" class="relative overflow-x-auto shadow-md sm:rounded-lg my-[1rem] min-h-[20rem]">
        <label for="" class="font-bold text-lg block text-center">Laba / Rugi</label>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        laba
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        rugi
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

    <div id="omzet_content" class="relative">
        <label for="" class="font-bold text-lg block text-center">Omzet</label>

        <div class="w-full rounded-lg dark:bg-gray-800 p-4 md:p-6">
            <canvas id="chartLine"></canvas>
        </div>


        <table class="w-full overflow-x-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md sm:rounded-lg my-[1rem] min-h-[20rem]">
            <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        Omzet Penjualan
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

    const line = document.getElementById('chartLine');

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
