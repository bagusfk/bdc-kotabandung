@extends('layouts.appadmin')
@section('title', 'Tambah Event')
@section('content')
<form class="w-full" action="{{ route('create-event') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-2 gap-20 pb-[5rem]">
        <div class="">
            <div class="mt-[1rem]">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Event</label>
                <input type="text" name="event_name" id="event_name" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('event_name')
                    <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-[1rem]">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penyelenggara Event</label>
                <input type="text" name="event_organizer" id="event_organizer" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('event_organizer')
                    <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-[1rem]">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Event</label>
                <div date-rangepicker datepicker-format="dd/mm/yyyy" class="flex items-center">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input name="event_date_start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                    </div>
                        <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input name="event_date_end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                    </div>
                </div>
            </div>

            <div class="mt-[1rem]">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poster Event</label>
                <input type="file" name="event_poster" id="event_poster" class="block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('event_poster')
                    <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-[1rem]">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Event</label>
                <textarea id="description" name="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Isi dengan deskripsi yang menarik ..."></textarea>
                @error('description')
                    <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="flex justify-end">
        <a href="{{ route('manage-event') }}" class="text-sm font-medium text-primary p-2.5 bg-white border border-primary rounded-lg mt-[1rem] mr-2">Batal</a>
        <button type="submit" class="text-sm font-medium text-white p-2.5 bg-primary rounded-lg mt-[1rem]">Simpan</button>
    </div>
</form>
<script>
    function previewImage() {
      var fileInput = document.getElementById('picture_product');
      var previewImage = document.getElementById('uploaded-image');
  var logo = document.getElementById('logo');

      var file = fileInput.files[0];
      var reader = new FileReader();

      reader.onload = function() {
        previewImage.src = reader.result;
        previewImage.classList.remove('hidden'); // Tampilkan gambar yang diunggah
    logo.classList.remove('hidden'); // Tampilkan logo
      }

      if (file) {
        reader.readAsDataURL(file);
      }
    }
</script>

@endsection()
