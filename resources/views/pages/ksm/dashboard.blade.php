<x-ksm.app>
    <div class="px-4 py-4 text-lg font-bold leading-none text-gray-800 bg-white rounded-xl">Daftar Brand Anda</div>
    <div x-data={registerKsm:false} class="grid w-full grid-cols-1 gap-4 lg:grid-cols-2">
        @foreach($ksm as $brand)
            <a href="{{ route('product_ksm', $brand->id) }}" class="flex w-full gap-2 p-6 bg-white cursor-pointer rounded-xl active:bg-gray-50 active:scale-[0.99]">
                <div class="flex items-center justify-center w-32 h-32 bg-gray-100 border rounded-xl overflow-clip">
                    @isset($brand->logo_image)
                        <img src="{{ asset($brand->logo_image) }}" alt="">
                    @else
                        <div class="px-2 text-sm font-normal text-gray-600 bg-gray-100 border border-gray-400 rounded-full w-fit ">tidak ada logo</div>
                    @endisset
                </div>
                <div class="flex-1 w-32 h-32 text-xs">
                    <div class="text-2xl font-semibold text-wrap">{{ $brand->brand_name }} <span class="px-2 py-0 text-base bg-green-200 border border-green-500 rounded-full">{{ $brand->business_entity }}</span></div>
                    <div>Pemilik: {{ $brand->owner }}</div>
                    <div>Kategory produk: {{ $brand->category->category }}</div>
                    <div>Jumlah produk: {{ $brand->item->count() }}</div>
                    {!! $brand->item->count()>0 ? '':'<div class="px-2 mt-2 text-sm font-normal text-red-600 bg-red-100 border border-red-400 rounded-full w-fit ">Belum ada produk</div>' !!}
                </div>
                <div class="flex items-center">
                    <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m9 5 7 7-7 7"/>
                    </svg>
                </div>
            </a>
        @endforeach
        <div @click="registerKsm = true" class="flex items-center justify-center w-full border-2 border-gray-500 border-dashed rounded-xl h-44 hover:bg-white">
            <svg class="w-[30px] h-[30px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14m-7 7V5"/>
            </svg>
            Tambah Brand
        </div>

        {{-- moda register ksm --}}
        <div x-show="registerKsm" x-cloak style="display: none" class="absolute top-0 z-40 flex items-center justify-center px-4">
            <div class="z-40 flex items-center justify-center px-4">
                <div class="p-2 bg-white rounded-xl w-[550px] flex flex-col gap-8">
                    <div class="flex items-center justify-end w-full modal-header">
                        {{-- <h5 class="text-lg font-bold">asdasd</h5> --}}
                        <button @click="registerKsm = false" class="px-2 text-3xl text-gray-500 hover:text-gray-700">&times;</button>
                    </div>
                    <form method="POST" action="{{ route('store-ksm') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <input type="text" class="hidden" name="ksm_id" value="{{ Auth::id() }}"> --}}
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="owner"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap
                                    Pemilik Usaha <span class="text-red-500">*</span></label>
                                <input type="text" name="owner" id="owner"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    placeholder="Ketik nama lengkap pemilik usaha">
                                @error('owner')
                                    <span class="text-sm text-red-500">Nama lengkap pemilik usaha harus diisi</span>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="brand_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Brand Usaha <span class="text-red-500">*</span></label>
                                <input type="text" name="brand_name" id="brand_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    placeholder="Ketik nama brand">
                                @error('brand_name')
                                    <span class="text-sm text-red-500">Nama Brand Usaha harus diisi</span>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori <span
                                        class="text-red-500">*</span></label>
                                <select id="category" name="category_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                                    <option>-- Pilih --</option>
                                    @foreach ($category as $data)
                                        <option value="{{ $data->id }}">{{ $data->category }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-sm text-red-500">Kategori harus dipilih</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="no_wa"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No WhatsApp <span
                                        class="text-red-500">*</span></label>
                                <input type="text" name="no_wa" id="no_wa"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    placeholder="Masukan Nomor WhatsApp">
                                @error('no_wa')
                                    <span class="text-sm text-red-500">No whatsapp harus diisi</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="link_ig"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Instagram Usaha</label>
                                <input type="text" name="link_ig" id="link_ig"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    placeholder="Masukan Link Instagram (jika ada)">
                            </div>
                            <div>
                                <label for="business_entity"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bentuk Badan Usaha <span class="text-red-500">*</span></label>
                                <select id="business_entity" name="business_entity"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary">
                                    <option >-- Pilih --</option>
                                    <option value="reseller">Reseller</option>
                                    <option value="br">Bisnis Rumahan</option>
                                    <option value="toko">Toko/Warung</option>
                                    <option value="po">Perusahaan Perseorangan</option>
                                    <option value="koperasi">Koperasi</option>
                                    <option value="persero">Perusahaan Perseroan (Persero)</option>
                                    <option value="fa">Firma (Fa)</option>
                                    <option value="cv">Commanditaire Vennootschap (CV)</option>
                                    <option value="pt">Perseroan Terbatas (PT)</option>
                                </select>
                                @error('business_entity')
                                    <span class="text-sm text-red-500">Bentuk Badan Usaha harus dipilih</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="nib"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Induk Berusaha</label>
                                <input type="text" name="nib" id="nib"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    placeholder="Masukan NIB (jika ada)">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Tempat Usaha Sesuai NIB</label>
                                <input type="text" name="address" id="address"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    placeholder="Ketik alamat lengkap sesuai NIB (jika ada)">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="product_sales_address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Penjualanan Produk (di Kota Bandung) <span class="text-red-500">*</span></label>
                                <input type="text" name="product_sales_address" id="product_sales_address"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    placeholder="Ketik alamat lengkap">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="business_description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Mengenai Brand / Usaha <span class="text-red-500">*</span></label>
                                <textarea id="business_description" name="business_description" rows="8"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                                    placeholder="Your description here"></textarea>
                                @error('business_description')
                                    <span class="text-sm text-red-500">Deskripsi harus diisi.</span>
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
                                    <span class="text-sm text-red-500">Foto pemilik usaha harus diisi</span>
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
                    {{-- <div class="flex flex-col gap-2 px-8 font-sans text-center modal-body">
                        <div class="flex items-center justify-center h-44">
                            <img src="{{ asset('assets\landing\illustrations\success.svg') }}" alt="" class="h-72">
                        </div>
                        <div class="text-3xl font-bold">Selamat</div>
                        <div class="text-xl">Kamu berhasil terdaftar sebagai anggota KSM, sekarang ayo kita tambahkan produk kamu!</div>
                    </div>
                    <div class="flex justify-center pt-2 pb-4 modal-footer">
                        <button @click="registerKsm = false" class="px-8 py-2 text-white bg-blue-500 rounded-xl">Oke</button>
                    </div> --}}
                </div>
            </div>
            <div class="fixed inset-0 z-30 bg-black opacity-50"></div>
        </div>
    </div>
    {{-- @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @if(session('success'))
                    setTimeout(() => {
                        document.querySelector('#successModal').__x.$data.registerKsm = true;
                    }, 100);
                @endif
            });
        </script>
    @endpush --}}
</x-ksm.app>
