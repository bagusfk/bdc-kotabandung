<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-4 bg-zinc-200 max-sm:px-[1rem]">
                <div class="sm:px-[2rem] sm:py-[2rem]">
                    <h2 class="text-[2rem] font-medium">Profile Perusahaan</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi quae quaerat nulla, ducimus dolorem sapiente recusandae quos, repellat animi officiis perspiciatis rerum saepe quis tempore, quidem ratione! Doloremque, magni ipsum.Eligendi, amet. Exercitationem rerum optio quod tempore omnis quasi alias amet repudiandae! Maiores dolorem veritatis deserunt eaque facere dolores distinctio vel fuga? Ullam, sapiente. Consectetur cumque sed ea adipisci blanditiis.</p>
                </div>
                <div>
                    <img class="w-full h-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                </div>
            </div>

            <section class="py-[2.5rem]">
                <div class="flex justify-center w-full py-3">
                    <div class="lg:w-1/2 max-lg:px-[2rem]">
                        <h2 class="text-[2rem] font-medium text-center">VISI</h2>
                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt esse provident repellendus explicabo, eveniet in maiores quod ratione voluptas, iure quaerat et blanditiis ipsam iste laudantium dignissimos consectetur sit molestiae?Minus ratione excepturi eaque hic at atque dolor, suscipit iusto quidem odio eos exercitationem doloribus tempora laboriosam earum, aliquid ut beatae incidunt quam deserunt maiores ipsum velit. Accusantium, laboriosam dolorem.</p>
                    </div>
                </div>
                <div class="flex justify-center w-full">
                    <div class="lg:w-1/2 max-lg:px-[2rem]">
                        <h2 class="text-[2rem] font-medium text-center">MISI</h2>
                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt esse provident repellendus explicabo, eveniet in maiores quod ratione voluptas, iure quaerat et blanditiis ipsam iste laudantium dignissimos consectetur sit molestiae?Minus ratione excepturi eaque hic at atque dolor, suscipit iusto quidem odio eos exercitationem doloribus tempora laboriosam earum, aliquid ut beatae incidunt quam deserunt maiores ipsum velit. Accusantium, laboriosam dolorem.</p>
                    </div>
                </div>
            </section>
            <section class="py-[2.5rem] max-sm:px-[1rem]">
                <!-- Swiper -->
                <div class="swiper mySwiper">
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
            </section>
            <section class="py-[2.5rem] pb-[16rem] max-sm:px-[1rem]">
                <h2 class="text-[2rem] font-medium">Perkembangan dan Fungsi BDC</h2>
                <br>
                <div class="grid gap-4 md:grid-cols-2">
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quos, pariatur fugiat earum quasi laudantium vero assumenda voluptatum minus! Ipsa officia quo veniam in voluptas expedita illum. Dolore, tempora et.</p>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quos, pariatur fugiat earum quasi laudantium vero assumenda voluptatum minus! Ipsa officia quo veniam in voluptas expedita illum. Dolore, tempora et.</p>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quos, pariatur fugiat earum quasi laudantium vero assumenda voluptatum minus! Ipsa officia quo veniam in voluptas expedita illum. Dolore, tempora et.</p>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem quos, pariatur fugiat earum quasi laudantium vero assumenda voluptatum minus! Ipsa officia quo veniam in voluptas expedita illum. Dolore, tempora et.</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
  <script>
    // Fungsi untuk menangani perubahan media query
    function handleMediaQuery(mediaQuery) {
      if (mediaQuery.matches) {
        // Jika lebar maksimum layar adalah 768px atau kurang
        swiper.params.slidesPerView = 1; // Ubah jumlah slide yang ditampilkan menjadi 1
        swiper.params.spaceBetween = 10; // Sesuaikan ruang antara slide
      } else {
        // Jika lebar layar lebih dari 768px
        swiper.params.slidesPerView = 3; // Kembalikan jumlah slide yang ditampilkan menjadi 3
        swiper.params.spaceBetween = 0; // Kembalikan ruang antara slide seperti semula
      }
      swiper.update(); // Update swiper instance setelah melakukan perubahan
    }

    // Inisialisasi Swiper
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 0,
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

    // Cek media query pada inisialisasi dan ketika layar berubah
    var mediaQuery = window.matchMedia("(max-width: 768px)");
    handleMediaQuery(mediaQuery); // Panggil fungsi handleMediaQuery saat inisialisasi
    mediaQuery.addListener(handleMediaQuery); // Tambahkan listener untuk memantau perubahan pada media query
  </script>
