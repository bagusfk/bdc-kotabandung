@extends('layouts.appadmin')
@section('title', 'Kelola Event')
@section('content')
    <form class="w-full" action="{{ route('update-laporan-event') }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="id" class="hidden" value="{{ $data->id }}">
        <div class="grid grid-cols-2 gap-20 pb-[5rem]">
            <div class="">
                <div class="mt-[1rem]">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Event</label>
                    <select class="block w-full rounded-lg" name="event_name" id="event_name">
                        @foreach ($events as $event)
                            <option value="{{ $event->id }}"
                                {{ $event->id == $data->register_event->event_id ? 'selected' : '' }}>
                                {{ $event->event_name }} -
                                {{ $event->event_organizer }}
                            </option>
                        @endforeach
                    </select>
                    @error('event_name')
                        <span class="text-sm text-red-500"><br />{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-[1rem]">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal Event</label>
                    <div class="flex items-center gap-4">
                        <input type="text" class="block w-full cursor-not-allowed rounded-lg bg-gray-100"
                            name="event_date_start" value="{{ $data->register_event->event->event_date_start }}"
                            id="event_date_start" disabled readonly>
                        <span>s/d</span>
                        <input type="text" class="block w-full cursor-not-allowed rounded-lg bg-gray-100"
                            name="event_date_end" value="{{ $data->register_event->event->event_date_end }}"
                            id="event_date_end" disabled readonly>
                    </div>
                </div>

                <div class="mt-[1rem]">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tempat Event</label>
                    <input type="text" value="{{ $data->register_event->event->location }}" id="location"
                        name="location" class="block w-full cursor-not-allowed rounded-lg bg-gray-100" disabled readonly>
                </div>

                <div class="mt-[1rem]">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Peserta Event</label>
                    <select class="block w-full rounded-lg" name="regist_id" id="regist_id">
                        @foreach ($peserta as $pesertas)
                            <option value="{{ $pesertas->id }}" {{ $pesertas->id == $data->regist_id ? 'selected' : '' }}>
                                {{ $pesertas->ksm->owner }}</option>
                        @endforeach
                    </select>
                    @error('regist_id')
                        <span class="text-sm text-red-500"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Stock Terjual</label>
                    <input type="number" name="stock_sold" id="stock_sold" value="{{ $data->stock_sold }}"
                        class="block w-full rounded-lg border bg-gray-50 p-2 text-lg text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    @error('stock_sold')
                        <span class="text-sm text-red-500"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Harga Awal Produk</label>
                    <input type="number" name="starting_price" id="starting_price" value="{{ $data->starting_price }}"
                        class="block w-full rounded-lg border bg-gray-50 p-2 text-lg text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    @error('starting_price')
                        <span class="text-sm text-red-500"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Harga Di Event</label>
                    <input type="number" name="price_at_event" id="price_at_event" value="{{ $data->price_at_event }}"
                        class="block w-full rounded-lg border bg-gray-50 p-2 text-lg text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    @error('price_at_event')
                        <span class="text-sm text-red-500"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Hasil Penjualan</label>
                    <input type="number" value="{{ $data->sales_result }}" name="sales_result" id="sales_result"
                        class="block w-full rounded-lg border bg-gray-50 p-2 text-lg text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    @error('sales_result')
                        <span class="text-sm text-red-500"><br />{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div id="regist_id" class="mt-[1rem] hidden text-gray-900 dark:text-white"></div>
        <div class="flex justify-end">
            <a href="{{ route('penjualan-event') }}"
                class="mr-2 mt-[1rem] rounded-lg border border-primary bg-white p-2.5 text-sm font-medium text-primary">Batal</a>
            <button type="submit"
                class="mt-[1rem] rounded-lg bg-primary p-2.5 text-sm font-medium text-white">Simpan</button>
        </div>
    </form>


    <script>
        document.getElementById('event_name').addEventListener('change', async function() {
            const eventId = this.value;

            if (eventId) {
                try {
                    const response = await fetch(`/get-event-details/${eventId}`);
                    const eventData = await response.json();

                    // Isi input fields
                    // document.getElementById('namaEvent').value = eventData.nama_event;
                    document.getElementById('event_date_start').value = formatDate(eventData.event_date_start);
                    document.getElementById('event_date_end').value = formatDate(eventData.event_date_end);
                    document.getElementById('location').value = eventData.location;
                    // document.getElementById('deskripsiEvent').value = eventData.deskripsi;

                    // Kosongkan dropdown peserta
                    const participantSelect = document.getElementById('regist_id');
                    participantSelect.innerHTML = '<option value="">Pilih Peserta</option>';

                    // Tambahkan peserta ke dalam dropdown dengan informasi dari relasi user
                    eventData.peserta.forEach(peserta => {
                        const option = document.createElement('option');
                        option.value = peserta.id;
                        option.textContent =
                            `${peserta.ksm.owner}`; // Contoh menampilkan nama user
                        participantSelect.appendChild(option);
                    });

                } catch (error) {
                    console.error('Error fetching event details:', error);
                }
            } else {
                document.getElementById('participantSelect').innerHTML =
                    '<option value="">Pilih Peserta</option>';
            }
        });

        // Fungsi untuk memformat tanggal menjadi d-m-Y
        function formatDate(dateString) {
            const date = new Date(dateString);
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
            const year = date.getFullYear();

            return `${day}-${month}-${year}`;
        }

        // Fungsi untuk mencari total penjualan di event
        function calculateTotalSales() {
            // const startingPrice = document.getElementById('starting_price').value;
            const priceAtEvent = document.getElementById('price_at_event').value;
            const stockSold = document.getElementById('stock_sold').value;

            if (priceAtEvent && stockSold) {
                const totalSales = priceAtEvent * stockSold;
                document.getElementById('sales_result').value = totalSales;
            } else {
                document.getElementById('sales_result').value = '';
            }
        }

        // Event listener untuk mencari total penjualan di event saat inputan berubah
        // document.getElementById('starting_price').addEventListener('input', calculateTotalSales);
        document.getElementById('price_at_event').addEventListener('input', calculateTotalSales);
        document.getElementById('stock_sold').addEventListener('input', calculateTotalSales);
    </script>


@endsection
