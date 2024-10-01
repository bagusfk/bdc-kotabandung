<x-ksm.app>
    <style>
        #image-upload-container img {
            transition: transform 0.2s ease-in-out;
        }

        #image-upload-container img:hover {
            transform: scale(1.1);
        }
    </style>
    <div class="w-fit rounded-lg bg-white px-8 py-4">
        Brand:
        {{ $ksm->brand_name }}
    </div>
    <form class="w-full" action="{{ route('update-item-ksm') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-20 pb-[5rem]">
            <div class="">
                <input type="hidden" name="id" value="{{ $stokbarang->id }}">
                <input type="hidden" name="brand" value="{{ $stokbarang->ksm->id }}">
                <input type="hidden" name="kelola_data_ksm_id" value="{{ $stokbarang->kelola_data_ksm_id }}">
                <input type="hidden" name="category_id" value="{{ $category_id }}">
                <div class="mt-[1rem]">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
                    <input type="text" name="name" id="name"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-xs text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        value="{{ $stokbarang->name }}">
                    @error('name')
                        <span class="text-sm text-red-500"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Berat/<small>gram</small></label>
                    <input type="number" name="weight" id="weight"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-xs text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        value="{{ $stokbarang->weight }}">
                    @error('weight')
                        <span class="text-sm text-red-500"><br />{{ $message }}</span>
                    @enderror
                </div>
                @if ($stokbarang->category_id == 3)
                    <div class="mt-[1rem]" id="dateExpired">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Expired</label>
                        <input type="date" name="expired" id="expired"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-xs text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            value="{{ $stokbarang->expired }}">
                        @error('expired')
                            <span class="text-sm text-red-500"><br />{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                <div class="mt-[1rem]">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                    <input type="number" name="price" id="price"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-xs text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        value="{{ $stokbarang->price }}">
                    @error('price')
                        <span class="text-sm text-red-500"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                    <input type="number" name="stock" id="stock"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 text-xs text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        value="{{ $stokbarang->stock }}">
                    @error('stock')
                        <span class="text-sm text-red-500"><br />{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-[1rem]">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                    <div id="image-upload-container" class="flex flex-wrap gap-2">
                        <!-- Existing images preview -->
                        <div id="preview-container" class="flex flex-wrap gap-2">
                            @foreach ($stokbarang->product_pictures as $pictures)
                                <div class="group relative h-24 w-24" data-id="{{ $pictures->id }}">
                                    <img class="h-full w-full rounded-md object-cover"
                                        src="{{ asset($pictures->product_picture) }}">
                                    <button type="button"
                                        class="absolute right-0 top-0 rounded-full bg-white p-1 text-red-500 opacity-0 transition-opacity duration-200 group-hover:opacity-100"
                                        onclick="removeExistingImage(this, {{ $pictures->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 1 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <!-- Input for new images -->
                        <div class="flex h-24 w-24 cursor-pointer items-center justify-center rounded-lg border-2 border-dashed"
                            id="upload-placeholder" onclick="triggerFileInput()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-8 w-8 text-gray-400"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                            </svg>
                            <input type="file" id="picture_product" name="picture_product[]" accept="image/*"
                                multiple class="hidden" onchange="handleImageUpload(this)">
                        </div>
                    </div>
                    @error('picture_product')
                        <span class="text-sm text-red-500"><br />{{ $message }}</span>
                    @enderror
                </div>

                <!-- Hidden input to store IDs of removed images -->
                <input type="hidden" id="removed_images" name="removed_images" value="">

                <div class="mt-[1rem]">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea id="description" name="description" rows="8"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">{{ $stokbarang->description }}</textarea>
                    @error('description')
                        <span class="text-sm text-red-500"><br />{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ redirect()->back() }}"
                class="mr-2 mt-[1rem] rounded-lg border border-primary bg-white p-2.5 text-sm font-medium text-primary">Batal</a>
            <button type="submit"
                class="mt-[1rem] rounded-lg bg-primary p-2.5 text-sm font-medium text-white">Simpan</button>
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
</x-ksm.app>
