<x-ksm.app>
    <div class="flex items-center gap-4 px-4 py-4 text-lg font-bold leading-none text-gray-800 bg-white rounded-xl">
        <a href="javascript:history.back()">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="m15 19-7-7 7-7"/>
            </svg>
        </a>
        Detail Produk
    </div>
    <div class="gap-4 px-4 py-4 text-lg font-bold leading-none text-gray-800 bg-white rounded-xl">
        <div class="flex flex-wrap gap-2 ">
            <div class="bg-red-300 rounded-lg w-72 h-72">
                <img class="w-full h-full object-cover rounded-lg" src="{{ asset($product->picture_product) }}">
            </div>
            <div class="flex flex-col flex-1 rounded-xl">
                <div class="pr-4 text-3xl font-semibold leading-none text-wrap">{{ $product->name }}</div>
                <div class="flex-1 py-6 pr-4 text-xl font-semibold text-wrap">
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
