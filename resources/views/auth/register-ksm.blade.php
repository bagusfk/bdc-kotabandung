<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-y-auto scroll">
    {{-- <div class="sticky top-0">
        <button class="px-4 py-2 text-white bg-blue-500 rounded-md">
            Tombol Saya
        </button>
    </div> --}}

    {{-- <div style="height: 2000px; background-color: #f0f0f0;">Konten Lain di Bawah</div> --}}
    {{-- <div class="sticky bottom-0">
        <button class="px-4 py-2 text-white bg-blue-500 rounded-md">
            Tombol Saya
        </button>
    </div> --}}
    <div class="grid grid-cols-12 gap-4 px-8 py-6 my-8">
        <div class="sticky flex flex-col col-span-12 gap-2 w-fit md:col-span-2 top-4 h-fit">
            <a href="/"
                class="flex items-center justify-between px-4 py-2 bg-white border rounded-full border-primary">
                {{-- <svg class="w-6 h-6 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                </svg> --}}
                <svg class="w-6 h-6 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m15 19-7-7 7-7" />
                </svg>

                <div class="text-primary">
                    Kembali dan Batal
                </div>
            </a>
        </div>
        {{-- <div class="h-[2000px] bg-[#f0f0f0] px-8 py-4 col-span-12 gap-2 md:col-span-7 ">
            <div class="text-[36px] font-bold text-slate-600">
                Registrasi KSM
            </div>
        </div> --}}
        <section class="col-span-12 bg-white dark:bg-gray-900 md:col-span-7 ">
            <div class="max-w-2xl px-4 pb-8 mx-auto lg:pb-16">
                <h2 class="mb-4 text-3xl font-bold text-gray-900 dark:text-white">Registrasi KSM</h2>
                <i class="text-red-500 text-xs">* Wajib diisi</i>
                <form method="POST" action="{{ route('store-ksm') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" class="hidden" name="ksm_id" value="{{ Auth::id() }}">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="owner"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap
                                Pemilik Usaha <span class="text-red-500">*</span></label>
                            <input type="text" name="owner" id="owner"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="Ketik nama lengkap pemilik usaha">
                            @error('owner')
                                <span class="text-red-500 text-sm">Nama lengkap pemilik usaha harus diisi</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="brand_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Brand</label>
                            <input type="text" name="brand_name" id="brand_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="Ketik nama brand">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori <span
                                    class="text-red-500">*</span></label>
                            <select id="category" name="category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                                <option selected="">-- Pilih --</option>
                                @foreach ($category as $data)
                                    <option value="{{ $data->id }}">
                                        {{ $data->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="no_wa"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No WhatsApp <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="no_wa" id="no_wa"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="Masukan Nomor WhatsApp">
                            @error('no_wa')
                                <span class="text-red-500 text-sm">No whatsapp harus diisi</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="link_ig"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Instagram
                                Usaha <span class="text-red-500">*</span></label>
                            <input type="text" name="link_ig" id="link_ig"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="Masukan Link Instagram">
                            @error('link_ig')
                                <span class="text-red-500 text-sm">Link ig harus diisi</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="nib"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Induk
                                Berusaha</label>
                            <input type="text" name="nib" id="nib"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="Masukan NIB">
                        </div>
                        <div>
                            <label for="business_entity"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bentuk Badan
                                Usaha</label>
                            <select id="business_entity"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                                <option selected="">-- Pilih --</option>
                                <option value="CV">CV</option>
                                <option value="PT">PT</option>
                            </select>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Tempat Usaha
                                Sesuai NIB</label>
                            <input type="text" name="address" id="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="Ketik alamat lengkap">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="product_sales_address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Penjualanan
                                Produk (di Kota Bandung)</label>
                            <input type="text" name="product_sales_address" id="product_sales_address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="Ketik alamat lengkap">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="business_description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penjelasan
                                Mengenai Usaha <span class="text-red-500">*</span></label>
                            <textarea id="business_description" name="business_description" rows="8"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                placeholder="Your description here"></textarea>
                            @error('business_description')
                                <span class="text-red-500 text-sm">Penjelasan mengenai usaha harus diisi.</span>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="owner_picture">Foto Pemilik Usaha <span class="text-red-500">*</span></label>
                            <input name="owner_picture"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="owner_picture" type="file">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG,
                                JPG or GIF (MAX. 800x400px).</p>
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
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG,
                                JPG or GIF (MAX. 800x400px).</p>
                        </div>
                        <div class="w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">Dokumen NIB</label>
                            <input name="nib_document"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">*(Upload
                                dokumen NIB yang dikeluarkan oleh <a class="text-primary"
                                    href="https://oss.go.id/">oss.go.id)</a> </p>
                        </div>
                        <div class="w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="file_input">Sertifikasi Halal</label>
                            <input name="permission_letter"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" id="file_input" type="file">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG,
                                JPG or GIF (MAX. 800x400px).</p>
                        </div>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary rounded-lg focus:ring-4 focus:ring-primary dark:focus:ring-primary hover:bg-primary">
                        Daftar
                    </button>
                </form>
            </div>
        </section>
        <div class="sticky top-4 h-[500px] flex items-center justify-center col-span-12 gap-2 md:col-span-3"></div>
    </div>
</body>

</html>
