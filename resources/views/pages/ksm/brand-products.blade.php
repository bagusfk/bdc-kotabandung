<x-ksm.app>
    <div class="rounded-xl bg-white px-4 py-4 text-lg font-bold leading-none text-gray-800">
        <div class="grid gap-4 sm:grid-cols-2">
            <div class="w-full">
                <label class="block text-sm font-medium text-gray-900 dark:text-white" for="owner_picture">Foto Pemilik
                    Usaha</label>
                {{-- <div class="overflow-hidden text-ellipsis">{{ $brand->owner_picture }}</div> --}}
                <img src="{{ asset($brand->owner_picture) }}" alt="" srcset="" class="w-20">
            </div>
            <div class="w-full">
                <label class="block text-sm font-medium text-gray-900 dark:text-white" for="logo_image">Gambar Logo
                    Brand</label>
                @isset($brand->logo_image)
                    <img src="{{ asset($brand->logo_image) }}" alt="" srcset="" class="w-20">
                @else
                    <div
                        class="mt-2 w-fit rounded-full border border-gray-400 bg-gray-100 px-2 text-sm font-normal text-gray-600">
                        tidak ada</div>
                @endisset
            </div>
            <div class="w-full">
                <label for="owner" class="block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap
                    Pemilik Usaha</label>
                <div>{{ $brand->owner }}</div>
            </div>
            <div class="w-full">
                <label for="brand_name" class="block text-sm font-medium text-gray-900 dark:text-white">Nama Brand
                    Usaha</label>
                <div>{{ $brand->brand_name }}</div>
            </div>
            <div class="w-full">
                <label for="category" class="block text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <div>{{ $brand->category->category }}</div>
            </div>
            <div class="w-full">
                <label for="no_wa" class="block text-sm font-medium text-gray-900 dark:text-white">No
                    WhatsApp</label>
                <div>{{ $brand->no_wa }}</div>
            </div>
            <div class="w-full">
                <label for="link_ig" class="block text-sm font-medium text-gray-900 dark:text-white">Link Instagram
                    Usaha</label>
                <div>{!! $brand->link_ig ??
                    '<div class="px-2 mt-2 text-sm font-normal text-gray-600 bg-gray-100 border border-gray-400 rounded-full w-fit ">tidak ada</div>' !!}</div>
            </div>
            <div class="w-full">
                <label for="business_entity" class="block text-sm font-medium text-gray-900 dark:text-white">Bentuk
                    Badan Usaha</label>
                <div>{{ $brand->business_entity }}</div>
            </div>
            <div class="sm:col-span-2">
                <label for="nib" class="block text-sm font-medium text-gray-900 dark:text-white">Nomor Induk
                    Berusaha</label>
                <div>{!! $brand->nib ??
                    '<div class="px-2 mt-2 text-sm font-normal text-gray-600 bg-gray-100 border border-gray-400 rounded-full w-fit ">tidak ada</div>' !!}</div>
            </div>
            <div class="w-full">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="nib_document">Dokumen
                    NIB</label>
                @isset($brand->nib_document)
                    <a href="{{ route('view_pdf', encrypt($brand->nib_document)) }}" target="_blank"
                        class="rounded-lg bg-primary px-2 py-1 text-sm font-medium text-white">Open PDF NIB</a>
                @else
                    <div
                        class="mt-2 w-fit rounded-full border border-gray-400 bg-gray-100 px-2 text-sm font-normal text-gray-600">
                        tidak ada</div>
                @endisset
            </div>
            <div class="w-full">
                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                    for="permission_letter">Sertifikasi Halal</label>
                @isset($brand->permission_letter)
                    <a href="{{ route('view_pdf', encrypt($brand->permission_letter)) }}" target="_blank"
                        class="rounded-lg bg-primary px-2 py-1 text-sm font-medium text-white">Open PDF Sertifikat Halal</a>
                @else
                    <div
                        class="mt-2 w-fit rounded-full border border-gray-400 bg-gray-100 px-2 text-sm font-normal text-gray-600">
                        tidak ada</div>
                @endisset
            </div>
            <div class="w-full">
                <label for="address" class="block text-sm font-medium text-gray-900 dark:text-white">Alamat Tempat
                    Usaha Sesuai NIB</label>
                <div>{!! $brand->address ??
                    '<div class="px-2 mt-2 text-sm font-normal text-gray-600 bg-gray-100 border border-gray-400 rounded-full w-fit ">tidak ada</div>' !!}</div>
            </div>
            <div class="w-full">
                <label for="product_sales_address"
                    class="block text-sm font-medium text-gray-900 dark:text-white">Alamat Penjualanan Produk (di Kota
                    Bandung)</label>
                <div>{{ $brand->product_sales_address }}</div>
            </div>
            <div class="sm:col-span-2">
                <label for="business_description"
                    class="block text-sm font-medium text-gray-900 dark:text-white">Deskripsi Mengenai Brand /
                    Usaha</label>
                <div>{{ $brand->business_description }}</div>
            </div>
        </div>
    </div>
    <div class="flex justify-between rounded-xl bg-white px-4 py-4 text-lg font-bold leading-none text-gray-800">
        <div>Daftar Produk</div>
        <a href="{{ route('add-item-ksm', $brand->id) }}"
            class="rounded-md border border-blue-500 px-2 py-1 text-sm font-medium text-blue-500">
            Tambah produk
        </a>
    </div>
    <div class="grid w-full grid-cols-1 gap-4 lg:grid-cols-2">
        @if ($products->count() > 0)
            @foreach ($products as $product)
                <div
                    class="flex w-full cursor-pointer flex-col rounded-xl bg-white p-2 active:scale-[0.99] active:bg-gray-50">
                    <a href="{{ route('product_detail_ksm', $product->id) }}">
                        <div class="flex flex-wrap gap-2">
                            <div class="h-16 w-16 rounded-lg bg-gray-100">
                                <img class="h-full w-full rounded-lg object-cover"
                                    src="{{ asset($product->product_pictures()->first()->product_picture ?? 'assets/default/image/default-product.jpg') }}">
                            </div>
                            <div class="flex flex-1 rounded-xl">
                                <div class="text-wrap flex-1 pr-4 text-lg font-semibold leading-none">
                                    {{ $product->name }}
                                </div>
                                <div class="flex items-center">
                                    <svg class="h-[24px] w-[24px] text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="3" d="m9 5 7 7-7 7" />
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
                            <div class="line-clamp-2 text-xs">
                                {{ $product->description }}
                                {{-- <a href="#">Edit</a> --}}
                            </div>
                        </div>
                    </a>
                    <div class="flex justify-end gap-2 bg-gray-100 px-2 py-2">
                        <div>
                            <a href="{{ route('edit-item-ksm', $product->id) }}"
                                class="rounded-md bg-green-400 px-4 py-1 text-white">Edit</a>
                        </div>
                        <form action="{{ route('delete-item-ksm', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <button type="submit" class="font-medium text-red-700 dark:text-blue-500"
                                onclick="return confirm('Are you sure you want to delete product?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-span-2 flex flex-col items-center gap-4 rounded-xl bg-white py-16">
                <div class="col-span-2 m-auto w-56 text-center text-lg font-bold leading-none">
                    <img src="{{ asset('assets/default/image/no-product.png') }}" alt="">
                    <div>Belum ada produk</div>
                </div>
                <p>hubungi admin via WhatsApp untuk menambahkan produk di brand yang kamu buat</p>
                {{-- isi no telp admin --}}
                <a href="https://wa.me/081222541485?text=Hello%20Admin" target="_blank"
                    class="rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white">Hubungi Admin</a>
            </div>
        @endif
    </div>
</x-ksm.app>
