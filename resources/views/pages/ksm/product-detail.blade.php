<x-ksm.app>
    <div class="flex items-center gap-4 rounded-xl bg-white px-4 py-4 text-lg font-bold leading-none text-gray-800">
        <a href="javascript:history.back()">
            <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                    d="m15 19-7-7 7-7" />
            </svg>
        </a>
        Detail Produk
    </div>
    <div class="gap-4 rounded-xl bg-white px-4 py-4 text-lg font-bold leading-none text-gray-800">
        <div class="flex flex-wrap gap-2">
            <div class="h-72 w-72 rounded-lg bg-gray-100">
                <img class="h-full w-full rounded-lg object-cover"
                    src="{{ asset($product->product_pictures()->first()->product_picture ?? 'assets/default/image/default-product.jpg') }}">
            </div>
            <div class="flex flex-1 flex-col rounded-xl">
                <div class="text-wrap pr-4 text-3xl font-semibold leading-none">{{ $product->name }}</div>
                <div class="text-wrap flex-1 py-6 pr-4 text-xl font-semibold">
                    <div class="text-3xl text-primary">Rp{{ $product->price }}</div>
                    <div>Weight: {{ $product->weight }}</div>
                    <div>Stok: {{ $product->stock }}</div>
                </div>
            </div>
            <div class="p-2">
                <div class="text-lg font-medium">Deskripsi:</div>
                <div class="text-lg font-normal">{{ $product->description }}</div>
            </div>
        </div>

    </div>
</x-ksm.app>
