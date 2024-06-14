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
                <div class="grid sm:grid-cols-2 gap-8 py-[1rem] px-[1rem]">
                    <img class="w-full aspect-square" src="{{ asset($item->picture_product) }}" alt="" />
                    <div class="w-full p-[1rem] sm:p-[2rem]">
                        <h5 class="mb-[2rem] text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
                        <div class="mb-[2rem] max-sm:text-right">
                            <span class="text-2xl font-semibold text-primary">{{'Rp ' . number_format($item->price,'0',',','.')}}</span>
                        </div>
                        <div class="flex items-center mb-[2rem]">
                            <img class="w-[4rem] h-[4rem] rounded-full bg-slate-500" src="{{ asset($item->picture_product) }}" alt="">
                            <span class="ml-[2rem]">{{$seller->name}}</span>
                        </div>
                        <div class="">
                            <p>{{$seller->address}}</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="my-[1rem] px-[1rem] sm:pl-[2rem] lg:pl-[4rem] py-[1rem] bg-white">
                <h5 class="font-bold text-2xl text-gray-900 mb-[1rem]">Deskripsi</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->description }}</p>
            </section>
            <section class="my-[1rem] px-[1rem] lg:px-[4rem] md:px-[2rem] py-[1rem] bg-white">
                <h5 class="text-2xl font-bold text-gray-900">Produk</h5>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($items as $data)
                            <div class="swiper-slide">
                                <div class="w-full p-[1rem] text-left shadow-2xl">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 max-sm:text-lg dark:text-white" style="-webkit-line-clamp: 1; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $data->name }}</h5>
                                    <div class="aspect-square">
                                        <img src="{{ asset($data->picture_product) }}" alt="" />
                                    </div>
                                    <p class="mt-[1rem] mb-3 font-normal text-gray-700 dark:text-gray-400 h-[5rem]" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $data->description }}</p>
                                    <div class="grid-cols-4 gap-1 lg:grid">
                                        <div class="">
                                            <a href="{{ url('e-catalog/' . $data->id) }}" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                                Details
                                            </a>
                                        </div>
                                        @if (Route::has('login'))
                                            @auth
                                                <div class="col-span-2 text-center">
                                                    <a href="#" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                                        Masukan Keranjang
                                                    </a>
                                                </div>
                                                <div class="">
                                                    <a href="#" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                                        Beli
                                                    </a>
                                                </div>
                                            @endauth
                                        @endif
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
