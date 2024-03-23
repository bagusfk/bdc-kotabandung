<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}

            <div class="grid md:grid-cols-2 gap-4 bg-zinc-200 max-sm:px-[1rem]">
                <div class="sm:px-[2rem] sm:py-[2rem]">
                    <h2 class="text-[2rem] font-medium">Berkembang Bersama BDC</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi quae quaerat nulla, ducimus dolorem sapiente recusandae quos, repellat animi officiis perspiciatis rerum saepe quis tempore, quidem ratione! Doloremque, magni ipsum.Eligendi, amet. Exercitationem rerum optio quod tempore omnis quasi alias amet repudiandae! Maiores dolorem veritatis deserunt eaque facere dolores distinctio vel fuga? Ullam, sapiente. Consectetur cumque sed ea adipisci blanditiis.</p>

                    <div class="mt-5">
                        <a type="button" class="bg-[#04a7ff] py-1 px-4 rounded-md font-medium text-white hover:bg-[#0a54ff]" href="#">Bergabung Menjadi Mitra BDC</a>
                    </div>
                </div>
                <div>
                    <img class="w-full h-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                </div>
            </div>

            <section class="py-[2.5rem] mt-[6rem] max-sm:px-[1rem]">
                <h2 class="mb-[2rem] text-[2rem] font-medium">Mitra KSM BDC</h2>
                <!-- Swiper -->
                <div class="swiper mySwiper mb-[2rem]">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="swiper mySwiper2">
                    <div class="swiper-wrapper md:pl-[6rem] lg:pl-[11rem]">
                        <div class="swiper-slide">
                            <img class="w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <section class="mt-[6rem] max-sm:px-[1rem]">
                <h2 class="mb-[2rem] text-[2rem] font-medium">Kontak BDC</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.9506796705073!2d108.5400036992966!3d-6.653035652151949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee3575ed4d223%3A0xaf2c763949d55b50!2sMaspur%20Studio!5e0!3m2!1sid!2sid!4v1711202110747!5m2!1sid!2sid" width="100%" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </section>
        </div>
    </div>
</x-app-layout>
<script>
    // Fungsi untuk menangani perubahan media query
    function handleMediaQuery(mediaQuery) {
      if (mediaQuery.matches) {
        // Jika lebar maksimum layar adalah 768px atau kurang
        swiper.params.slidesPerView = 2; // Ubah jumlah slide yang ditampilkan menjadi 2
        swiper.params.spaceBetween = 10; // Sesuaikan ruang antara slide
        swiper2.params.slidesPerView = 2; // Ubah jumlah slide yang ditampilkan menjadi 2
        swiper2.params.spaceBetween = 10; // Sesuaikan ruang antara slide
      } else {
        // Jika lebar layar lebih dari 768px
        swiper.params.slidesPerView = 4; // Kembalikan jumlah slide yang ditampilkan menjadi 4
        swiper.params.spaceBetween = 100; // Kembalikan ruang antara slide seperti semula
        swiper2.params.slidesPerView = 4; // Kembalikan jumlah slide yang ditampilkan menjadi 4
        swiper2.params.spaceBetween = 100; // Kembalikan ruang antara slide seperti semula
        // swiper.params.centeredSlides = true;
    }
      swiper.update(); // Update swiper instance setelah melakukan perubahan
      swiper2.update(); // Update swiper instance setelah melakukan perubahan
    }

    // Inisialisasi Swiper
    var swiper = new Swiper(".mySwiper", {
      direction: "horizontal",
      slidesPerView: 4,
      spaceBetween: 180,
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      // Tambahkan transisi untuk efek yang mulus
      effect: "slide",
      speed: 500,
    });

    var swiper2 = new Swiper(".mySwiper2", {
      slidesPerView: 4,
      spaceBetween: 180,
      loop: true,
      autoplay: {
        delay: 2500,
        reverseDirection: true,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      // Tambahkan transisi untuk efek yang mulus
      effect: "slide",
      speed: 500,
    });

    // Cek media query pada inisialisasi dan ketika layar berubah
    var mediaQuery = window.matchMedia("(max-width: 768px)");
    handleMediaQuery(mediaQuery); // Panggil fungsi handleMediaQuery saat inisialisasi
    mediaQuery.addListener(handleMediaQuery); // Tambahkan listener untuk memantau perubahan pada media query
</script>
