<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>

    <div class="pt-12 bg-pattern">
        <div class="mx-auto">
            {{-- <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}

            <div class="grid md:grid-cols-2 gap-4 max-sm:px-[1rem] mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="sm:px-[2rem] sm:py-[2rem] flex flex-col justify-center">
                    <h2 class="text-[2rem] font-bold">Berkembang Bersama BDC</h2>
                    <p>Temukan peluang tak terbatas dan dukung perkembangan bisnis Anda dengan menjadi mitra BDC. Nikmati akses ke berbagai sumber daya eksklusif, jaringan profesional, dan pelatihan yang dirancang khusus untuk memaksimalkan potensi Anda. Mari bersama-sama kita ciptakan kesuksesan dan wujudkan visi besar Anda.</p>

                    <div class="mt-5">
                        <a type="button" class="bg-[#04a7ff] py-1 px-4 rounded-md font-medium text-white hover:bg-[#0a54ff]" href="{{ route('register-ksm') }}">Bergabung Menjadi Mitra BDC</a>
                    </div>
                </div>
                <div>
                    <img class="w-full h-full rounded-lg" src="{{ asset('assets/landing/workshop.jpg')}}" alt="">
                </div>
            </div>

            <section class="py-[2.5rem] mt-[6rem] max-sm:px-[1rem]  bg-white">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <h2 class="mb-[2rem] text-[2rem] font-medium">Mitra KSM BDC</h2>
                    <!-- Swiper -->
                    <div class="swiper mySwiper mb-[2rem] ">
                        <div class="flex items-center swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="w-full" src="{{ asset('assets/landing/mitra_ksm/garinie.jpg')}}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full" src="{{ asset('assets/landing/mitra_ksm/jelujur.png')}}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full" src="{{ asset('assets/landing/mitra_ksm/mamahdini.jpg')}}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full" src="{{ asset('assets/landing/mitra_ksm/mangandrew.jpg')}}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full" src="{{ asset('assets/landing/mitra_ksm/mboten.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="swiper mySwiper2">
                        <div class="swiper-wrapper md:pl-[6rem] lg:pl-[11rem] flex items-center">
                            <div class="swiper-slide">
                                <img class="w-full" src="{{ asset('assets/landing/mitra_ksm/nenglis.jpg')}}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full" src="{{ asset('assets/landing/mitra_ksm/pita.jpg')}}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full" src="{{ asset('assets/landing/mitra_ksm/purezento.jpg')}}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full" src="{{ asset('assets/landing/mitra_ksm/sahate.jpeg')}}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="w-full" src="{{ asset('assets/landing/mitra_ksm/sidaun.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mt-[6rem] max-sm:px-[1rem]">
                <h2 class="mb-[2rem] text-[2rem] font-medium mx-auto max-w-7xl sm:px-6 lg:px-8">Kontak BDC</h2>
                <iframe class="mx-auto max-w-[1400px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.830295763747!2d107.61016529999999!3d-6.910885199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7fe4ca299d5%3A0x7a57d46fa44a1e73!2sAuditorium%20-%20Balaikota%20Bandung!5e0!3m2!1sid!2sid!4v1711332034799!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
        delay: 0,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      // Tambahkan transisi untuk efek yang mulus
      effect: "slide",
      speed: 2000,
    });

    var swiper2 = new Swiper(".mySwiper2", {
      slidesPerView: 4,
      spaceBetween: 180,
      loop: true,
      autoplay: {
        delay: 0,
        reverseDirection: true,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      // Tambahkan transisi untuk efek yang mulus
      effect: "slide",
      speed: 2000,
    });

    // Cek media query pada inisialisasi dan ketika layar berubah
    var mediaQuery = window.matchMedia("(max-width: 768px)");
    handleMediaQuery(mediaQuery); // Panggil fungsi handleMediaQuery saat inisialisasi
    mediaQuery.addListener(handleMediaQuery); // Tambahkan listener untuk memantau perubahan pada media query
</script>
