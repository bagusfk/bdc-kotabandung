@extends('layouts.appadmin')
@section('title', 'Kelola Barang')
@section('content')
    <style>
        #image-upload-container img {
            transition: transform 0.2s ease-in-out;
        }

        #image-upload-container img:hover {
            transform: scale(1.1);
        }
    </style>
    <form class="w-full" action="{{ route('update-item') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-20 pb-[5rem]">
            <div class="">
                <input type="hidden" name="id" value="{{ $stokbarang->id }}">
                <div class="">
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="category" name="category_id"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($category as $data)
                            <option value="{{ $data->id }}"
                                {{ $data->id == $stokbarang->category_id ? 'selected' : '' }}>
                                {{ $data->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand Pemilik</label>
                    <select id="ksm_id" name="kelola_data_ksm_id"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($ksm as $ksms)
                            <option value="{{ $ksms->id }}"
                                {{ $ksms->id == $stokbarang->kelola_data_ksm_id ? 'selected' : '' }}>
                                {{ $ksms->brand_name }} - {{ $ksms->owner }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
                    <input type="text" name="name" id="name"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $stokbarang->name }}">
                    @error('name')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat/<small>gram</small></label>
                    <input type="number" name="weight" id="weight"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $stokbarang->weight }}">
                    @error('weight')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                @if ($stokbarang->category_id == 3)
                    <div class="mt-[1rem]" id="dateExpired">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Expired</label>
                        <input type="date" name="expired" id="expired"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ $stokbarang->expired }}">
                        @error('expired')
                            <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                    <input type="number" name="price" id="price"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $stokbarang->price }}">
                    @error('price')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                    <input type="number" name="stock" id="stock"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ $stokbarang->stock }}">
                    @error('stock')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                    <div id="image-upload-container" class="flex flex-wrap gap-2">
                        <!-- Existing images preview -->
                        <div id="preview-container" class="flex flex-wrap gap-2">
                            @foreach ($stokbarang->product_pictures as $pictures)
                                <div class="relative group w-24 h-24" data-id="{{ $pictures->id }}">
                                    <img class="w-full h-full object-cover rounded-md"
                                        src="{{ asset($pictures->product_picture) }}">
                                    <button type="button"
                                        class="absolute top-0 right-0 bg-white text-red-500 p-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-200"
                                        onclick="removeExistingImage(this, {{ $pictures->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 1 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <!-- Input for new images -->
                        <div class="w-24 h-24 border-2 border-dashed rounded-lg flex items-center justify-center cursor-pointer"
                            id="upload-placeholder" onclick="triggerFileInput()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-8 h-8 text-gray-400"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                            </svg>
                            <input type="file" id="picture_product" name="picture_product[]" accept="image/*" multiple
                                class="hidden" onchange="handleImageUpload(this)">
                        </div>
                    </div>
                    @error('picture_product')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>

                <!-- Hidden input to store IDs of removed images -->
                <input type="hidden" id="removed_images" name="removed_images" value="">

                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea id="description" name="description" rows="8"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $stokbarang->description }}</textarea>
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
        function triggerFileInput() {
            document.getElementById('picture_product').click();
        }

        function handleImageUpload(input) {
            const previewContainer = document.getElementById('preview-container');
            Array.from(input.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.classList.add('relative', 'group', 'w-24', 'h-24');
                    div.innerHTML = `
                <img class="w-full h-full object-cover rounded-md" src="${e.target.result}">
                <button type="button"
                    class="absolute top-0 right-0 bg-white text-red-500 p-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-200"
                    onclick="removeImage(this)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 1 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            `;
                    previewContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }

        function removeImage(button, index) {
            // Remove the image from the UI
            const container = button.closest('div');
            container.remove();

            // Remove the file from the input
            const input = document.getElementById('picture_product');
            const dataTransfer = new DataTransfer();

            // Re-add only the files that weren't removed
            Array.from(input.files).forEach((file, i) => {
                if (i !== index) {
                    dataTransfer.items.add(file);
                }
            });

            // Update the input with the new files
            input.files = dataTransfer.files;
        }


        function removeExistingImage(button, id) {
            // Remove the image from the UI
            const container = button.closest('div');
            container.remove();

            // Add the image ID to the hidden input field
            const removedImagesInput = document.getElementById('removed_images');
            let removedImages = removedImagesInput.value ? removedImagesInput.value.split(',') : [];
            removedImages.push(id);
            removedImagesInput.value = removedImages.join(',');
        }
    </script>

@endsection()
