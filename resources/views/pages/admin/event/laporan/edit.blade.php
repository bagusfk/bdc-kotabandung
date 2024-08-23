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
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Event</label>
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
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Event</label>
                    <div class="flex items-center gap-4">
                        <input type="text" class="block w-full rounded-lg bg-gray-100 cursor-not-allowed"
                            name="event_date_start" value="{{ $data->register_event->event->event_date_start }}"
                            id="event_date_start" disabled readonly>
                        <span>s/d</span>
                        <input type="text" class="block w-full rounded-lg bg-gray-100 cursor-not-allowed"
                            name="event_date_end" value="{{ $data->register_event->event->event_date_end }}"
                            id="event_date_end" disabled readonly>
                    </div>
                </div>

                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Event</label>
                    <input type="text" value="{{ $data->register_event->event->location }}" id="location"
                        name="location" class="block w-full rounded-lg bg-gray-100 cursor-not-allowed" disabled readonly>
                </div>

                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peserta Event</label>
                    <select class="block rounded-lg w-full" name="regist_id" id="regist_id">
                        @foreach ($peserta as $pesertas)
                            <option value="{{ $pesertas->id }}" {{ $pesertas->id == $data->regist_id ? 'selected' : '' }}>
                                {{ $pesertas->ksm->owner }}</option>
                        @endforeach
                    </select>
                    @error('regist_id')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hasil Penjualan</label>
                    <input type="number" value="{{ $data->sales_result }}" name="sales_result" id="sales_result"
                        class="block w-full p-2 text-gray-900 border rounded-lg bg-gray-50 text-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('sales_result')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div id="regist_id" class="hidden mt-[1rem] text-gray-900 dark:text-white"></div>
        <div class="flex justify-end">
            <a href="{{ route('laporan-event') }}"
                class="text-sm font-medium text-primary p-2.5 bg-white border border-primary rounded-lg mt-[1rem] mr-2">Batal</a>
            <button type="submit"
                class="text-sm font-medium text-white p-2.5 bg-primary rounded-lg mt-[1rem]">Simpan</button>
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
    </script>


@endsection
