@extends('layouts.appadmin')
@section('title', 'Kelola Barang')
@section('content')
    <form class="w-full" action="{{ route('update-item') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-20 pb-[5rem]">
            <div class="">
                <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="">
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="category" name="category_id"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($category as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $item->category_id ? 'selected' : '' }}>
                                {{ $data->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand Pemilik</label>
                    <select id="ksm_id" name="ksm_id"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($ksm as $ksms)
                            <option value="{{ $ksms->id }}" {{ $ksms->id == $item->ksm_id ? 'selected' : '' }}>
                                {{ $ksms->brand_name }} - {{ $ksms->owner }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
                    <input type="text" name="name" id="name"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $item->name }}">
                    @error('name')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                    <input type="number" name="price" id="price"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $item->price }}">
                    @error('price')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                    <input type="number" name="stock" id="stock"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $item->stock }}">
                    @error('stock')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                    <div class="flex items-center justify-center">
                        <label for="picture_product"
                            class="relative w-64 h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer flex flex-col items-center justify-center">
                            <input class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" type="file"
                                id="picture_product" name="picture_product" onchange="previewImage()">
                            <img class="absolute inset-0 w-full h-full object-contain hidden" id="uploaded-image"
                                src="" alt="Uploaded Image">
                            <span
                                class="absolute top-0 right-0 w-8 h-8 mt-1 mr-1 p-1.5 rounded-full bg-white opacity-80 hover:opacity-100">
                                <svg class=" text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <img class="absolute inset-0 w-full h-full object-contain" id="image-old"
                                src="{{ asset($item->picture_product) }}">
                        </label>
                    </div>
                    @error('picture_product')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea id="description" name="description" rows="8"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $item->description }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('manage-items') }}"
                class="text-sm font-medium text-primary p-2.5 bg-white border border-primary rounded-lg mt-[1rem] mr-2">Batal</a>
            <button type="submit"
                class="text-sm font-medium text-white p-2.5 bg-primary rounded-lg mt-[1rem]">Simpan</button>
        </div>
    </form>

    <script>
        function previewImage() {
            var fileInput = document.getElementById('picture_product');
            var previewImage = document.getElementById('uploaded-image');
            var imageOld = document.getElementById('image-old');

            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onload = function() {
                previewImage.src = reader.result;
                previewImage.classList.remove('hidden'); // Tampilkan gambar yang diunggah
                imageOld.classList.add('hidden');
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection()
