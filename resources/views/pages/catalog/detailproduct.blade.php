<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a href="{{route('catalog')}}"  class="flex items-center justify-between gap-2 px-2 py-2 bg-white border rounded-full w-fit border-primary">
                <svg class="w-6 h-6 text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                </svg>

                <div class="text-primary">
                    Kembali
                </div>
            </a>
            <section class="bg-white">
                <div class="flex flex-wrap justify-center gap-4 py-[1rem]">
                    <div class="w-[450px] h-[450px] flex items-center rounded-xl border-2">
                        <img class="w-full my-auto" src="{{ asset($item->picture_product) }}" alt="" />
                    </div>
                    <div class="flex flex-col flex-1 gap-4 px-8 py-8">
                        <h5 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
                        <div class="max-sm:text-right w-fit">
                            <span class="text-2xl font-semibold text-primary">{{'Rp ' . number_format($item->price,'0',',','.')}}</span>
                        </div>
                        @auth
                            @if (Route::has('login') && Auth::user()->id != $item->ksm->user_id)
                                <div class="text-center w-fit">
                                    <form action="{{ route('cart.add', $item) }}" method="post">
                                        @csrf
                                        <input type="number" value="1" name="qty" hidden>
                                        <button type="submit" class="inline-flex items-center justify-center w-full gap-2 px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                            <svg class="w-6 h-6 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                                            </svg>
                                            tambah ke keranjang
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                        <div class="flex px-4 py-2 border-2 w-fit rounded-xl">
                            <img class="w-[4rem] h-[4rem] rounded-full border-2 bg-gray-200" src="{{ asset( $item->ksm->logo_image ?? 'assets/default/image/default-picture.jpg' ) }}" alt="">
                            <div class="flex flex-col ml-4">
                                <span class="text-lg font-bold">{{strtoupper($item->ksm->brand_name)}}</span>
                                <span class="text-md">{{$item->ksm->business_entity}}</span>
                            </div>
                        </div>
                        <div class="">
                            <h5 class="text-xl font-bold text-gray-900">Alamat</h5>
                            <p>{{ $item->ksm->address ??  $item->ksm->product_sales_address}}</p>
                        </div>
                        <div class="min-w-[350px]">
                            <h5 class="font-bold text-2xl text-gray-900 mb-[1rem]">Deskripsi</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="my-[1rem] py-[1rem] bg-white">
                <h5 class="text-2xl font-bold text-gray-900">Produk lain di toko ini</h5>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($seller->item as $data)
                            <div class="swiper-slide">
                                <div class="w-full bg-white border p-[0.5rem] flex items-start flex-col sm:p-[1rem] border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                                    <img class="aspect-square" src="{{ asset($data->picture_product) }}" alt="" />
                                    <h5 class="text-lg font-bold tracking-tight text-gray-900 max-sm:text-lg dark:text-white">{{ $data->name }}</h5>
                                    <h5 class="text-lg font-bold tracking-tight text-primary max-sm:text-lg dark:text-white">Rp {{ number_format($data->price, 0, ',', '.') }}</h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" style="-webkit-line-clamp: 1; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $data->description }}</p>
                                    <div class="flex flex-col w-full">
                                        <div class="">
                                            <a href="{{ route('detail_catalog', $data->id) }}" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                                Details
                                            </a>
                                        </div>
                                        @auth
                                            @if (Route::has('login') && Auth::user()->id != $data->ksm->user_id)
                                                <div class="text-center">
                                                    <form action="{{ route('cart.add', $data) }}" method="post">
                                                        @csrf
                                                        <input type="number" value="1" name="qty" hidden>
                                                        <button type="submit" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                                            <svg class="w-6 h-6 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                                {{-- <div class="">
                                                    <a href="#" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                                        Beli Sekarang
                                                    </a>
                                                </div> --}}
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-scrollbar"></div>
                </div>
            </section>
            <section class="my-[1rem] px-[1rem] sm:px-[2rem] lg:px-[4rem] py-[1rem] bg-white">
                <h5 class="font-bold text-2xl text-gray-900 mb-[1rem]">Ulasan</h5>
                <div class="flex items-center my-[2rem]">
                    <img class="w-[4rem] h-[4rem] rounded-full bg-slate-500" src="{{ asset($item->picture_product) }}" alt="">
                    <p class="ml-[2rem]">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque saepe omnis nulla officiis non nisi officia, iste earum ut, impedit voluptates velit quis. Veniam vero ab dignissimos incidunt impedit beatae!</p>
                </div>
                <hr>

                <div class="flex items-center my-[2rem]">
                    <img class="w-[4rem] h-[4rem] rounded-full bg-slate-500" src="{{ asset($item->picture_product) }}" alt="">
                    <p class="ml-[2rem]">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque saepe omnis nulla officiis non nisi officia, iste earum ut, impedit voluptates velit quis. Veniam vero ab dignissimos incidunt impedit beatae!</p>
                </div>
                <hr>

                <div class="flex items-center my-[2rem]">
                    <img class="w-[4rem] h-[4rem] rounded-full bg-slate-500" src="{{ asset($item->picture_product) }}" alt="">
                    <p class="ml-[2rem]">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque saepe omnis nulla officiis non nisi officia, iste earum ut, impedit voluptates velit quis. Veniam vero ab dignissimos incidunt impedit beatae!</p>
                </div>
                <hr>
            </section>
        </div>
    </div>
</x-app-layout>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    freeMode: true,
    scrollbar: {
    el: ".swiper-scrollbar",
    clickable: true,
    },
});

// Mendeteksi perubahan ukuran layar
window.addEventListener('resize', function () {
    // Jika lebar layar <= 768px, set slidesPerView menjadi 2
    if (window.innerWidth <= 768) {
        swiper.params.slidesPerView = 2;
        swiper.update(); // Perbarui swiper
    } else {
        // Jika lebar layar > 768px, set slidesPerView kembali menjadi 3
        swiper.params.slidesPerView = 3;
        swiper.update(); // Perbarui swiper
    }
});
</script>
