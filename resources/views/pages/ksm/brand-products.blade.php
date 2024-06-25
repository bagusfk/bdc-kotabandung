<x-ksm.app>
    <div class="px-4 py-4 text-lg font-bold leading-none text-gray-800 bg-white rounded-xl">
        <div class="grid gap-4 sm:grid-cols-2">
            <div class="w-full">
                <label class="block text-sm font-medium text-gray-900 dark:text-white" for="owner_picture">Foto Pemilik Usaha</label>
                {{-- <div class="overflow-hidden text-ellipsis">{{ $brand->owner_picture }}</div> --}}
                <img src="{{ asset($brand->owner_picture)}}" alt="" srcset="" class="w-20">
            </div>
            <div class="w-full">
                <label class="block text-sm font-medium text-gray-900 dark:text-white" for="logo_image">Gambar Logo Brand</label>
                @isset($brand->logo_image)
                    <img src="{{ asset($brand->logo_image)}}" alt="" srcset="" class="w-20">
                @else
                    <div class="px-2 mt-2 text-sm font-normal text-gray-600 bg-gray-100 border border-gray-400 rounded-full w-fit ">tidak ada</div>
                @endisset
            </div>
            <div class="w-full">
                <label for="owner" class="block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap Pemilik Usaha</label>
                <div>{{ $brand->owner }}</div>
            </div>
            <div class="w-full">
                <label for="brand_name" class="block text-sm font-medium text-gray-900 dark:text-white">Nama Brand Usaha</label>
                <div>{{ $brand->brand_name }}</div>
            </div>
            <div class="w-full">
                <label for="category" class="block text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <div>{{ $brand->category->category }}</div>
            </div>
            <div class="w-full">
                <label for="no_wa" class="block text-sm font-medium text-gray-900 dark:text-white">No WhatsApp</label>
                <div>{{ $brand->no_wa }}</div>
            </div>
            <div class="w-full">
                <label for="link_ig" class="block text-sm font-medium text-gray-900 dark:text-white">Link Instagram Usaha</label>
                <div>{!! $brand->link_ig ?? '<div class="px-2 mt-2 text-sm font-normal text-gray-600 bg-gray-100 border border-gray-400 rounded-full w-fit ">tidak ada</div>' !!}</div>
            </div>
            <div class="w-full">
                <label for="business_entity" class="block text-sm font-medium text-gray-900 dark:text-white">Bentuk Badan Usaha</label>
                <div>{{ $brand->business_entity }}</div>
            </div>
            <div class="sm:col-span-2">
                <label for="nib" class="block text-sm font-medium text-gray-900 dark:text-white">Nomor Induk Berusaha</label>
                <div>{!! $brand->nib ?? '<div class="px-2 mt-2 text-sm font-normal text-gray-600 bg-gray-100 border border-gray-400 rounded-full w-fit ">tidak ada</div>' !!}</div>
            </div>
            <div class="w-full">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nib_document">Dokumen NIB</label>
                @isset($brand->nib_document)
                    <a href="{{ route('view_pdf', encrypt($brand->nib_document) ) }}" target="_blank" class="px-2 py-1 text-sm font-medium text-white rounded-lg bg-primary">Open PDF NIB</a>
                @else
                    <div class="px-2 mt-2 text-sm font-normal text-gray-600 bg-gray-100 border border-gray-400 rounded-full w-fit ">tidak ada</div>
                @endisset
            </div>
            <div class="w-full">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="permission_letter">Sertifikasi Halal</label>
                @isset($brand->permission_letter)
                    <a href="{{ route('view_pdf', encrypt($brand->permission_letter) ) }}" target="_blank" class="px-2 py-1 text-sm font-medium text-white rounded-lg bg-primary">Open PDF Sertifikat Halal</a>
                @else
                    <div class="px-2 mt-2 text-sm font-normal text-gray-600 bg-gray-100 border border-gray-400 rounded-full w-fit ">tidak ada</div>
                @endisset
            </div>
            <div class="w-full">
                <label for="address" class="block text-sm font-medium text-gray-900 dark:text-white">Alamat Tempat Usaha Sesuai NIB</label>
                <div>{!! $brand->address ?? '<div class="px-2 mt-2 text-sm font-normal text-gray-600 bg-gray-100 border border-gray-400 rounded-full w-fit ">tidak ada</div>' !!}</div>
            </div>
            <div class="w-full">
                <label for="product_sales_address" class="block text-sm font-medium text-gray-900 dark:text-white">Alamat Penjualanan Produk (di Kota Bandung)</label>
                <div>{{ $brand->product_sales_address }}</div>
            </div>
            <div class="sm:col-span-2">
                <label for="business_description" class="block text-sm font-medium text-gray-900 dark:text-white">Deskripsi Mengenai Brand / Usaha</label>
                <div>{{ $brand->business_description }}</div>
            </div>
        </div>
    </div>
    <div class="px-4 py-4 text-lg font-bold leading-none text-gray-800 bg-white rounded-xl">Daftar Produk</div>
    <div class="grid w-full grid-cols-1 gap-4 lg:grid-cols-2">
        @foreach($products as $product)
            <a href="{{ route('product_detail_ksm', $product->id) }}" class="flex flex-col w-full p-2 bg-white cursor-pointer rounded-xl active:bg-gray-50 active:scale-[0.99]">
                <div class="flex flex-wrap gap-2">
                    <div class="w-16 h-16 bg-red-300 rounded-lg"></div>
                    <div class="flex flex-1 rounded-xl">
                        <div class="flex-1 pr-4 text-lg font-semibold leading-none text-wrap">{{ $product->name }}</div>
                        <div class="flex items-center">
                            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m9 5 7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between gap-2 px-4 py-2 text-xs">
                    <div>Harga: {{ $product->price }}</div>
                    <div>Weight: {{ $product->weight }}</div>
                    <div>Stok: {{ $product->stock }}</div>
                </div>
                <div class="p-2">
                    <div class="text-xs font-medium">Deskripsi:</div>
                    <div class="text-xs line-clamp-2">{{ $product->description }}</div>
                </div>
            </a>
        @endforeach
    </div>
</x-ksm.app>
