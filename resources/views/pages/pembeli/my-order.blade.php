<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        </h2>
    </x-slot>
    <h1 class="mb-5 ml-8 w-48 pt-10 text-3xl">Pesanan Saya</h1>
    <div x-data="{ detail: false }" class="mx-auto mb-4 grid max-w-7xl grid-cols-3 gap-6">
        @if ($transactions->count() == 0)
            <div class="col-span-3 flex w-full flex-col items-center">
                <img src="{{ asset('assets/default/image/empty-history.svg') }}" alt="" class="w-96">
                <div class="text-xl font-bold">Anda belum punya riwayat pesanan</div>
            </div>
        @else
            @foreach ($transactions as $transaction)
                <div class="bag1 col-span-2 w-full flex-col">
                    <div class="select_with_store mt-2 rounded-lg border border-slate-300 bg-white px-3 py-2">
                        <div class="flex items-center justify-between gap-3 border-b-2 py-2">
                            <div class="flex flex-wrap items-center gap-3">
                                <div class="font-bold">
                                    @foreach ($transaction->orders as $item)
                                        {{ $item->item->ksm->brand_name }},
                                    @endforeach
                                </div>
                                <div class="text-sm">{{ $transaction->invoice }}</div>
                                @if ($transaction->payment_status == 'unpaid')
                                    <div class="rounded-md border border-red-500 px-2 py-1 text-sm text-red-500">Belum
                                        dibayar</div>
                                @elseif ($transaction->payment_status == 'paid' && $transaction->order_status == 'proses')
                                    <div class="rounded-md bg-blue-500 px-2 py-1 text-sm text-white">Menunggu Konfirmasi
                                    </div>
                                @elseif ($transaction->payment_status == 'paid' && $transaction->order_status == 'dikemas')
                                    <div class="rounded-md bg-blue-500 px-2 py-1 text-sm text-white">Dikemas</div>
                                @elseif ($transaction->payment_status == 'paid' && $transaction->order_status == 'dikirim')
                                    <div class="rounded-md bg-yellow-300 px-2 py-1 text-sm text-white">Shipping</div>
                                @elseif ($transaction->payment_status == 'paid' && $transaction->order_status == 'selesai')
                                    <div class="rounded-md bg-green-500 px-2 py-1 text-sm text-white">Selesai</div>
                                @elseif ($transaction->order_status == 'cancel')
                                    <div class="rounded-md bg-red-500 px-2 py-1 text-sm text-white">Cancle</div>
                                @endif
                            </div>
                            {{-- <a href="" class="text-primary">Lacak Pesanan></a> --}}
                        </div>
                        <div class="flex justify-between py-4">
                            <div class="flex items-start gap-3">
                                <img src="{{ asset($transaction->orders->first()->item->product_pictures()->first()->product_picture) }}"
                                    alt="" class="h-16 w-16">
                                <div>
                                    <div class="font-bold">{{ $transaction->orders->first()->item->name }}</div>
                                    <div class="text-sm text-gray-600">{{ $transaction->orders->first()->qty }} x Rp
                                        {{ $transaction->orders->first()->item->price }}</div>
                                </div>
                            </div>
                        </div>

                        @if ($transaction->orders->count() > 1)
                            <button @click=" detail = '{{ $transaction->id }}' "
                                class="flex w-full items-center justify-center gap-3 border-b-2 border-t-2 py-2 hover:bg-slate-50"
                                type="button">
                                Tampilkan barang lainnya
                            </button>
                        @endif
                        <div class="flex items-center justify-between gap-8 py-3">
                            <div class="flex items-center gap-2">
                                <div class="font-bold">Total Belanja:</div>
                                @if ($transaction->total_price)
                                    <span class="price">Rp{{ $transaction->total_price }}</span>
                                @else
                                    <span class="price">Rp{{ $transaction->orders->sum('price') }}</span>
                                @endif
                            </div>
                            <!-- Modal toggle -->
                            @if ($transaction->payment_status == 'unpaid')
                                <a href="{{ route('continueCheckout', $transaction->id) }}"
                                    class="block rounded-lg bg-lime-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-lime-600 focus:outline-none focus:ring-4 focus:ring-lime-300">Lanjut
                                    Pembayaran</a>
                            @else
                                <button @click=" detail = '{{ $transaction->id }}' "
                                    class="block rounded-lg bg-primary px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-sky-500 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-primary dark:focus:ring-blue-800"
                                    type="button">
                                    Lihat Detail Transaksi
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Main modal -->
                <div x-show="detail === '{{ $transaction->id }}'" x-cloak style="display: none !important;"
                    class="fixed left-0 right-0 top-0 z-50 max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden bg-black bg-opacity-25 md:inset-0">
                    <div class="mx-auto max-h-full w-full max-w-2xl p-4" @click.outside=" detail = false">
                        <!-- Modal content -->
                        <div class="mx-auto rounded-lg bg-white shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Detail Transaksi
                                </h3>
                                <button @click=" detail = false " type="button"
                                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="default-modal">
                                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <div class="border-b py-2">
                                    <div class="flex items-center gap-2">
                                        @if ($transaction->payment_status == 'unpaid')
                                            <div
                                                class="rounded-md border border-red-500 px-2 py-1 text-sm text-red-500">
                                                Belum dibayar</div>
                                        @elseif ($transaction->payment_status == 'paid' && $transaction->order_status == 'proses')
                                            <div class="rounded-md bg-blue-500 px-2 py-1 text-sm text-white">Menunggu
                                                Konfirmasi</div>
                                        @elseif ($transaction->payment_status == 'paid' && $transaction->order_status == 'dikemas')
                                            <div class="rounded-md bg-blue-500 px-2 py-1 text-sm text-white">Dikemas
                                            </div>
                                        @elseif ($transaction->payment_status == 'paid' && $transaction->order_status == 'dikirim')
                                            <div class="rounded-md bg-yellow-300 px-2 py-1 text-sm text-white">Shipping
                                            </div>
                                        @elseif ($transaction->payment_status == 'paid' && $transaction->order_status == 'selesai')
                                            <div class="rounded-md bg-green-500 px-2 py-1 text-sm text-white">Selesai
                                            </div>
                                        @elseif ($transaction->order_status == 'cancel')
                                            <div class="rounded-md bg-red-500 px-2 py-1 text-sm text-white">Cancle</div>
                                        @endif
                                    </div>
                                    <div class="mt-4 flex items-center justify-between">
                                        <div class="font-bold">No Invoice</div>
                                        <a href="#" class="text-sm text-primary">{{ $transaction->invoice }}</a>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="font-bold">Tanggal Pembelian</div>
                                        <div class="text-sm">{{ $transaction->created_at }}</div>
                                    </div>
                                </div>
                                <div class="border-b py-2">
                                    <div class="flex items-center justify-between py-2">
                                        <div class="font-bold">Detail Produk</div>
                                    </div>
                                    {{-- list barang yang dibeli --}}
                                    @foreach ($transaction->orders as $item)
                                        <div
                                            class="mb-2 flex justify-between rounded-lg border border-slate-300 px-2 py-2">
                                            <div class="flex items-start gap-3">
                                                <img src="{{ asset($item->item->product_pictures()->first()->product_picture) }}"
                                                    alt="" class="h-16 w-16">
                                                <div>
                                                    <div class="font-bold">{{ $item->item->name }}<span
                                                            class="text-sm font-normal"> -
                                                            ({{ $item->item->ksm->brand_name }})
                                                        </span></div>
                                                    <div class="">{{ $item->qty }}x Barang
                                                        Rp{{ $item->item->price }}</div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <span class="price"><span
                                                        class="price">Rp{{ $item->qty * $item->item->price }}</span></span>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{-- End list barang yang dibeli --}}
                                    <div class="mb-2 flex justify-between rounded-lg border border-slate-300 px-2 py-2">
                                        <div class="flex items-start gap-3">
                                            <div class="font-bold">Total Harga</div>
                                        </div>
                                        <div class="">
                                            <span
                                                class="price font-bold text-primary">Rp{{ $transaction->orders->sum('price') }}</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Info Pengiriman --}}
                                <div class="border-b py-2">
                                    <div class="flex items-center justify-between py-2">
                                        <div class="text-lg font-bold">Info Pengiriman</div>
                                    </div>
                                    <div class="mb-2 flex justify-between">
                                        <div class="flex items-start gap-3">
                                            <div class="font-bold">Kurir</div>
                                        </div>
                                        <div class="">
                                            <span class="price">{{ $transaction->expedition }} -
                                                {{ $transaction->expedition_type }} -
                                                Rp{{ $transaction->shipping_cost }}</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 flex justify-between">
                                        <div class="flex items-start gap-3">
                                            <div class="font-bold">No Resi</div>
                                        </div>
                                        <div class="">
                                            <span class="resi">{!! $transaction->no_resi ?? '<span class="text-sm text-gray-500">Tunggu konfirmasi admin</span>' !!}</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 flex justify-between">
                                        <div class="flex items-start gap-3">
                                            <div class="font-bold">Aamat</div>
                                        </div>
                                        <div class="flex flex-col items-end">
                                            <div class="price font-bold">{{ Auth::user()->name }}</div>
                                            <div class="price font-semibold">{{ Auth::user()->no_wa }}</div>
                                            @if (Auth::user()->city_id)
                                                <div class="price">{{ Auth::user()->address }},
                                                    {{ Auth::user()->cities->city_name }},
                                                    {{ Auth::user()->cities->province }}</div>
                                            @else
                                                <div>belum ada alamat</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                {{-- End Info Pengiriman --}}

                                {{-- Info Pembayaran --}}
                                <div class="py-2">
                                    <div class="flex items-center justify-between py-2">
                                        <div class="text-lg font-bold">Rincian Pembayaran</div>
                                    </div>
                                    <div class="mb-2 flex justify-between">
                                        <div class="flex items-start gap-3">
                                            <div class="font-bold">Metode Pembayaran</div>
                                        </div>
                                        <div class="">
                                            <span class="price">{{ $transaction->payment_method }}</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 flex justify-between">
                                        <div class="flex items-start gap-3">
                                            <div class="font-bold">Total Harga ({{ $transaction->orders->sum('qty') }}
                                                Barang)</div>
                                        </div>
                                        <div class="">
                                            <span class="price">Rp{{ $transaction->orders->sum('price') }}</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 flex justify-between">
                                        <div class="flex items-start gap-3">
                                            <div class="font-bold">Total Ongkos</div>
                                        </div>
                                        <div class="">
                                            <span class="price">Rp{{ $transaction->shipping_cost }}</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 mt-2 flex justify-between border-t">
                                        <div class="flex items-start gap-3">
                                            <div class="text-xl font-bold">Total Belanja</div>
                                        </div>
                                        <div class="">
                                            <div class="price text-xl font-bold text-primary">
                                                Rp{{ $transaction->total_price }}</div>
                                        </div>
                                    </div>
                                </div>
                                {{-- End Info Pembayaran --}}
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center rounded-b border-t border-gray-200 p-4 dark:border-gray-600 md:p-5">
                                <a href="https://wa.me/081222541485?text=Hello%20Admin" target="_blank"
                                    data-modal-hide="default-modal" type="button"
                                    class="w-full rounded-lg bg-primary px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-500">Tanya
                                    Admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
