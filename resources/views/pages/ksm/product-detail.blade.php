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
            <div class="w-16 h-16 bg-red-300 rounded-lg"></div>
            <div class="flex flex-1 rounded-xl">
                <div class="flex-1 pr-4 text-lg font-semibold leading-none bg-green-300 text-wrap">{{ $product->name }} asd asda sdasdasd asdasdasd asdasd </div>
            </div>
        </div>
    </div>
</x-ksm.app>
