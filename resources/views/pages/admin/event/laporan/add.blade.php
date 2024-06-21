@extends('layouts.appadmin')
@section('title', 'Kelola Event')
@section('content')
    <form class="w-full" action="{{ route('create-laporan-event') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-20 pb-[5rem]">
            <div class="">
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event</label>
                    <select class="rounded-lg" name="event_name" id="event_name">
                        <option value="">Pilih</option>
                        @foreach ($events as $event)
                            <option value="{{ $event->id }}">{{ $event->event_name }} - {{ $event->event_organizer }}
                            </option>
                        @endforeach
                    </select>
                    @error('event_name')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peserta Event</label>
                    <select class="rounded-lg" name="owner" id="owner">
                        <!-- Peserta options will be populated dynamically -->
                    </select>
                    @error('owner')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hasil Penjualan</label>
                    <input type="text" name="sales_result" id="sales_result"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
        document.addEventListener('DOMContentLoaded', function() {
            const eventSelect = document.getElementById('event_name');
            const participantSelect = document.getElementById('owner');
            const resultDiv = document.getElementById('regist_id');

            // Decode JSON data passed from the server
            const participantsByEvent = @json($participantsByEvent);

            // Function to check and display ID based on specific conditions
            function checkAndDisplayID() {
                const selectedEventId = eventSelect.value;
                const selectedOwnerId = participantSelect.value;

                // Initialize variable to hold the ID
                let idToDisplay = '';

                // Find the participant object based on selected event and owner ID
                if (selectedEventId && selectedOwnerId) {
                    const eventParticipants = participantsByEvent[selectedEventId];
                    if (eventParticipants) {
                        const selectedParticipant = eventParticipants.find(participant => participant.ksm.id ==
                            selectedOwnerId);
                        if (selectedParticipant) {
                            idToDisplay = selectedParticipant.id;
                        }
                    }
                }

                // Display the ID or '' if condition is not met
                if (idToDisplay) {
                    resultDiv.innerHTML =
                        `<input type="number" name="regist_id" value="${idToDisplay}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">`;
                } else {
                    resultDiv.innerHTML = ''; // Clear the div if no ID is to be displayed
                }
            }

            // Event listener for event select change
            eventSelect.addEventListener('change', function() {
                const selectedEventId = this.value;

                // Clear existing participants
                participantSelect.innerHTML = '<option value=""></option>';

                // Populate participants based on the selected event
                if (selectedEventId && participantsByEvent[selectedEventId]) {
                    participantsByEvent[selectedEventId].forEach(function(participant) {
                        const option = document.createElement('option');
                        option.value = participant.ksm.id;
                        option.text = `${participant.ksm.owner} - ${participant.ksm.brand_name}`;
                        participantSelect.appendChild(option);
                    });
                }

                // Check and display ID after populating participants
                checkAndDisplayID();
            });

            // Event listener for participant select change
            participantSelect.addEventListener('change', checkAndDisplayID);
        });
    </script>


@endsection
