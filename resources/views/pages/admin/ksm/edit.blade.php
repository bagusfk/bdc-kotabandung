@extends('layouts.appadmin')
@section('title', 'Kelola Barang')
@section('content')

    <section class="col-span-12 bg-white dark:bg-gray-900 md:col-span-7 ">
        <div class="max-w-2xl px-4 pb-8 mx-auto lg:pb-16">
            <i class="text-red-500 text-xs">* Wajib diisi</i>
            <form action="{{ route('update-ksm') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" class="hidden" name="ksm_id" value="{{ $ksm->id }}">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="owner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Lengkap
                            Pemilik Usaha <span class="text-red-500">*</span></label>
                        <input type="text" name="owner" id="owner"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $ksm->owner }}">
                        @error('owner')
                            <span class="text-red-500 text-sm">Nama lengkap pemilik usaha harus diisi</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="brand_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Brand</label>
                        <input type="text" name="brand_name" id="brand_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $ksm->brand_name }}">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                        <select id="category" name="category_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            @foreach ($category as $data)
                                <option value="{{ $data->id }}" {{ $data->id == $ksm->category_id ? 'selected' : '' }}>
                                    {{ $data->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="no_wa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                            WhatsApp <span class="text-red-500">*</span></label>
                        <input type="text" name="no_wa" id="no_wa"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $ksm->no_wa }}">
                        @error('no_wa')
                            <span class="text-red-500 text-sm">No whatsapp harus diisi</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="link_ig" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
                            Instagram
                            Usaha <span class="text-red-500">*</span></label>
                        <input type="text" name="link_ig" id="link_ig"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $ksm->link_ig }}">
                        @error('link_ig')
                            <span class="text-red-500 text-sm">Link ig harus diisi</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="nib" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Induk
                            Berusaha</label>
                        <input type="text" name="nib" id="nib"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $ksm->nib }}">
                    </div>
                    <div>
                        <label for="business_entity"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bentuk Badan
                            Usaha</label>
                        <select id="business_entity"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                            <option value="{{ $ksm->business_entity }}" selected>
                                {{ $ksm->business_entity }}
                            </option>
                            <option value="CV" {{ $ksm->business_entity == 'CV' ? 'selected' : '' }}>CV</option>
                            <option value="PT" {{ $ksm->business_entity == 'PT' ? 'selected' : '' }}>PT</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                            Tempat Usaha
                            Sesuai NIB</label>
                        <input type="text" name="address" id="address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $ksm->address }}">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="product_sales_address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Penjualanan
                            Produk (di Kota Bandung)</label>
                        <input type="text" name="product_sales_address" id="product_sales_address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $ksm->product_sales_address }}">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="business_description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penjelasan
                            Mengenai Usaha <span class="text-red-500">*</span></label>
                        <textarea id="business_description" name="business_description" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">{{ $ksm->business_description }}</textarea>
                        @error('business_description')
                            <span class="text-red-500 text-sm">Penjelasan mengenai usaha harus diisi.</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="owner_picture">Foto
                            Pemilik Usaha <span class="text-red-500">*</span></label>
                        <input name="owner_picture"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="owner_picture" type="file">
                        @if ($ksm->owner_picture)
                            <img src="{{ asset($ksm->owner_picture) }}" alt="Foto Pemilik Usaha"
                                class="mt-2 max-w-full h-auto">
                        @endif
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF
                            (MAX. 800x400px).</p>
                        @error('owner_picture')
                            <span class="text-red-500 text-sm">Foto pemilik usaha harus diisi</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Gambar Logo Brand</label>
                        <input name="logo_image"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file">
                        @if ($ksm->logo_image)
                            <img src="{{ asset($ksm->logo_image) }}" alt="Gambar Logo Brand"
                                class="mt-2 max-w-full h-auto">
                        @endif
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF
                            (MAX. 800x400px).</p>
                    </div>
                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Dokumen NIB</label>
                        <input name="nib_document"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file">
                        @if ($ksm->nib_document)
                            <a href="{{ asset($ksm->nib_document) }}" class="mt-2 text-primary">Lihat Dokumen NIB</a>
                        @endif
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">*(Upload dokumen NIB
                            yang dikeluarkan oleh <a class="text-primary" href="https://oss.go.id/">oss.go.id)</a> </p>
                    </div>
                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Sertifikasi Halal</label>
                        <input name="permission_letter"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file">
                        @if ($ksm->permission_letter)
                            <img src="{{ asset($ksm->permission_letter) }}" alt="Sertifikasi Halal"
                                class="mt-2 max-w-full h-auto">
                        @endif
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF
                            (MAX. 800x400px).</p>
                    </div>

                </div>
                <div class="flex">
                    <button type="submit"
                        class="text-sm font-medium text-white p-2.5 bg-primary rounded-lg mt-[1rem] mr-2">Simpan</button>
                    <a href="{{ route('manage-ksm') }}"
                        class="text-sm font-medium text-primary p-2.5 bg-white border border-primary rounded-lg mt-[1rem] mr-2">Batal</a>
                </div>
            </form>
        </div>
    </section>

@endsection()
