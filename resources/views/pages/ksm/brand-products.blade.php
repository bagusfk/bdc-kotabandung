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
                <p>Tambahkan produk kamu sekarang secara mandiri</p>
                {{-- isi no telp admin --}}
                <a href="{{ route('add-item-ksm', $brand->id) }}"
                    class="rounded-lg bg-primary px-4 py-2 text-sm font-medium text-white">Tambah Produk</a>
            </div>
        @endif
    </div>
    <div class="flex justify-between rounded-xl bg-white px-4 py-4 text-lg font-bold leading-none text-gray-800">
        <div>Laporan Event</div>
    </div>
    <div class="grid w-full grid-cols-1 gap-4 lg:grid-cols-2">
        {{-- @dd($events) --}}
        @forelse ($events as $event)
            <div x-data="{ show: false }"
                class="flex w-full cursor-pointer flex-col rounded-xl bg-white p-2 active:scale-[0.99] active:bg-gray-50">
                <div class="flex flex-wrap gap-2">
                    <div class="h-16 w-16 rounded-lg bg-gray-100">
                        <img class="h-full w-full rounded-lg object-cover"
                            src="{{ asset($event->event->event_poster ?? 'assets/default/image/default-product.jpg') }}">
                    </div>
                    <div class="flex flex-1 rounded-xl">
                        <div class="text-wrap flex-1 pr-4 text-lg font-semibold leading-none">
                            {{ $event->event->event_name }}
                        </div>
                        <div class="flex items-center">
                            <span
                                class="{{ $event->status_validation == 'agree' ? 'bg-green-400 text-white' : 'border-primary' }} rounded-md border px-4 py-1 text-sm">{{ $event->status_validation }}</span>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between gap-2 px-2 py-2 text-xs">
                    <div>Penyelenggara: {{ $event->event->event_organizer }}</div>
                    <div>Lokasi: {{ $event->event->location }}</div>
                    <div>Tgl: {{ $event->event->event_date_start }} / {{ $event->event->event_date_end }}</div>
                </div>
                <div class="p-2">
                    <div class="text-xs font-medium">Deskripsi:</div>
                    <div class="line-clamp-2 text-xs">
                        {{ $event->event->description }}
                    </div>
                </div>
                @if ($event->status_validation == 'agree')
                    <button @click="show = !show" class="rounded-md bg-primary px-4 py-2 text-white">
                        Lihat Laporan
                    </button>
                    <div x-show="show" class="mt-2 rounded-lg bg-gray-100 px-2 py-2">
                        <form action="{{ route('laporan-event-ksm', $event->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="mt-[1rem]">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Stock
                                    Terjual</label>
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">Rp.</span>
                                    <input type="number" name="stock_sold" id="stock_sold_{{ $event->id }}"
                                        placeholder="stok terjual" data-event-id="{{ $event->id }}"
                                        value="{{ $event->laporanEvent->isNotEmpty() ? $event->laporanEvent()->first()->stock_sold : '' }}"
                                        class="block w-full rounded-lg border bg-gray-50 p-2 text-lg text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                </div>
                                @error('stock_sold')
                                    <span class="text-sm text-red-500"><br />{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-[1rem]">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Harga Awal
                                    Produk</label>
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">Rp.</span>
                                    <input type="number" name="starting_price" id="starting_price"
                                        placeholder="harga awal produk"
                                        value="{{ $event->laporanEvent->isNotEmpty() ? $event->laporanEvent()->first()->starting_price : '' }}"
                                        class="block w-full rounded-lg border bg-gray-50 p-2 text-lg text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                </div>
                                @error('starting_price')
                                    <span class="text-sm text-red-500"><br />{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-[1rem]">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Harga Di
                                    Event</label>
                                <div class="flex items-center gap-2">
                                    <span class="text-lg">Rp.</span>
                                    <input type="number" name="price_at_event"
                                        id="price_at_event_{{ $event->id }}" placeholder="harga saat event"
                                        data-event-id="{{ $event->id }}"
                                        value="{{ $event->laporanEvent->isNotEmpty() ? $event->laporanEvent()->first()->price_at_event : '' }}"
                                        class="block w-full rounded-lg border bg-gray-50 p-2 text-lg text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                </div>
                                @error('price_at_event')
                                    <span class="text-sm text-red-500"><br />{{ $message }}</span>
                                @enderror
                            </div>
                            <label for="event-report"
                                class="my-2 block text-sm font-medium text-gray-900 dark:text-white">Penghasilan
                                Event <span class="text-sm italic text-gray-400">*otomatis terisi</span></label>
                            <input type="hidden" name="laporanId"
                                value="{{ $event->laporanEvent()->first()->id ?? '' }}">
                            <div class="flex items-center gap-2">
                                <span class="text-lg">Rp.</span>
                                <input id="event-report_{{ $event->id }}" type="number" name="salesResult"
                                    value="{{ $event->laporanEvent->isNotEmpty() ? $event->laporanEvent()->first()->sales_result : '' }}"
                                    class="w-full rounded-md border-transparent" placeholder="total penjualan"
                                    required>
                                <button type="submit"
                                    class="rounded-md border border-primary px-2 py-1 font-medium text-primary hover:bg-primary hover:text-white dark:text-blue-500">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="bg-gray-100 px-2 py-2 text-sm">
                        Tunggu sampai disetujui
                    </div>
                @endif
            </div>
        @empty
            <p>Tidak ada event yang diikuti.</p>
        @endforelse
        <script>
            document.querySelectorAll('[id^="price_at_event_"], [id^="stock_sold_"]').forEach(input => {
                input.addEventListener('input', function() {
                    const eventId = this.dataset.eventId;
                    const priceAtEvent = document.getElementById(`price_at_event_${eventId}`).value;
                    const stockSold = document.getElementById(`stock_sold_${eventId}`).value;

                    if (priceAtEvent && stockSold) {
                        const totalSales = priceAtEvent * stockSold;
                        document.getElementById(`event-report_${eventId}`).value = totalSales;
                    } else {
                        document.getElementById(`event-report_${eventId}`).value = '';
                    }
                });
            });
        </script>
    </div>
</x-ksm.app>
