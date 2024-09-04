@extends('layouts.appadmin')
@section('title', 'Tambah Barang')
@section('content')
    <style>
        #image-upload-container img {
            transition: transform 0.2s ease-in-out;
        }

        #image-upload-container img:hover {
            transform: scale(1.1);
        }
    </style>
    <form class="w-full" action="{{ route('create-item') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-20 pb-[5rem]">
            <div class="">
                <input type="hidden" name="id" value="{{ $no_item }}">
                <div class="">
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                    <select id="category" name="category_id"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Pilih Kategori</option>
                        @foreach ($category as $data)
                            <option value="{{ $data->id }}">{{ $data->category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
                    <input type="text" name="name" id="name"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('name')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat/<small>gram</small></label>
                    <input type="number" name="weight" id="weight"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('weight')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem] hidden" id="dateExpired">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Expired</label>
                    <input type="date" name="expired" id="expired"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('expired')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                    <input type="number" name="price" id="price"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('price')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand Pemilik</label>
                    <select id="ksm" name="ksm_id"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    </select>
                    @error('ksm_id')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                    <input type="number" name="stock" id="stock"
                        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('stock')
                        <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                    <div id="image-upload-container" class="flex flex-wrap gap-2">
                        <!-- Preview container for newly uploaded images -->
                        <div id="preview-container" class="flex flex-wrap gap-2"></div>

                        <!-- Input for new images -->
                        <div class="w-24 h-24 flex items-center justify-center cursor-pointer bg-gray-100 rounded-lg border-2 border-dashed border-gray-300 hover:bg-gray-200 transition"
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

                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea id="description" name="description" rows="8"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Isi dengan deskripsi yang menarik ..."></textarea>
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
            const files = Array.from(input.files);

            // Clear existing previews
            previewContainer.innerHTML = '';

            files.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.classList.add('relative', 'group', 'w-24', 'h-24');
                    div.dataset.index = index; // Store index to find it later
                    div.innerHTML = `
                <img class="w-full h-full object-cover rounded-md" src="${e.target.result}">
                <button type="button"
                    class="absolute top-0 right-0 bg-white text-red-500 p-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-200"
                    onclick="removeImage(this, ${index})">
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

            // Rebuild previews to maintain correct order
            handleImageUpload(input);
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

        document.getElementById('category').addEventListener('change', async function() {
            const selectedCategory = this.value;

            if (selectedCategory == 3) {
                const expired = document.getElementById('dateExpired');
                expired.classList.remove('hidden');
            } else {
                const expired = document.getElementById('dateExpired');
                expired.classList.add('hidden');
            }

            if (selectedCategory) {
                try {
                    const response = await fetch(`/get-owner-ksm/${selectedCategory}`);
                    const ksmData = await response.json();
                    // console.log(ksmData); // Debugging untuk melihat data yang diterima

                    // Kosongkan dropdown Brand Pemilik
                    const ksmSelect = document.getElementById('ksm');
                    ksmSelect.innerHTML = '<option value="">Pilih Brand</option>';

                    // Tambahkan data KSM ke dropdown
                    ksmData.forEach(ksm => {
                        const option = document.createElement('option');
                        option.value = ksm.id; // Set value ke ID KSM
                        option.textContent =
                            `${ksm.brand_name} - ${ksm.owner}`; // Tampilkan nama brand dan owner
                        ksmSelect.appendChild(option);
                    });

                } catch (error) {
                    console.error('Error fetching KSM details:', error);
                }
            } else {
                // Jika tidak ada kategori yang dipilih, reset dropdown
                const ksmSelect = document.getElementById('ksm');
                ksmSelect.innerHTML = '<option value="">Pilih Brand</option>';
            }
        });
    </script>


@endsection()
