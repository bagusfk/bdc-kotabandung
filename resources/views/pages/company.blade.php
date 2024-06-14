<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        </h2>
    </x-slot>

    <div class="pt-12 bg-pattern">
        <div class="mx-auto max-w-7xl">
            <div class="grid md:grid-cols-2 gap-4 max-sm:px-[1rem] ">
                <div class="sm:px-[2rem] sm:py-[4rem] bg-white rounded-lg shadow-lg flex flex-col justify-between">
                    <h2 class="font-bold text-7xl">Profile Perusahaan</h2>
                    <p class="text-justify">Business Development Center (BDC) adalah sebuah lembaga yang berdedikasi untuk mendukung dan mengembangkan potensi bisnis di berbagai sektor. Kami berdiri dengan tujuan untuk menjadi mitra terpercaya bagi pengusaha dan perusahaan kecil serta menengah, membantu mereka menghadapi tantangan bisnis dan mencapai pertumbuhan yang berkelanjutan. Dengan pendekatan yang komprehensif dan inovatif, BDC berkomitmen untuk menyediakan layanan berkualitas tinggi yang mencakup konsultasi bisnis, pelatihan, pendampingan, dan akses ke berbagai sumber daya.</p>
                </div>
                <div>
                    <img class="w-full h-full rounded-lg shadow-lg" src="{{ asset('assets/landing/compro/header.jpeg')}}" alt="">
                </div>
            </div>

            <section class="mt-[2.5rem] py-[2.5rem] bg-white">
                <div class="flex justify-center w-full py-3">
                    <div class="lg:w-1/2 max-lg:px-[2rem]">
                        <h2 class="text-[2rem] font-medium text-center">VISI</h2>
                        <p class="text-center">Menjadi pusat unggulan dalam pengembangan bisnis yang inovatif dan berkelanjutan, memberdayakan pengusaha dan perusahaan untuk mencapai kesuksesan global.</p>
                    </div>
                </div>
                <div class="flex justify-center w-full">
                    <div class="lg:w-1/2 max-lg:px-[2rem] flex flex-col items-center">
                        <h2 class="text-[2rem] font-medium text-center">MISI</h2>
                        <ul class="list-decimal">
                            <li>Memberikan Dukungan Komprehensif</li>
                            <li>Menyediakan Akses ke Sumber Daya</li>
                            <li>Memfasilitasi Inovasi dan Kolaborasi</li>
                            <li>Mengembangkan Keterampilan dan Pengetahuan</li>
                            <li>Mendukung Keberlanjutan dan Tanggung Jawab Sosial</li>
                            <li>Meningkatkan Visibilitas dan Daya Saing</li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="py-[2.5rem] max-sm:px-[1rem]">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="flex items-center swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="h-full" src="{{ asset('assets/landing/compro/diskusi.jpeg')}}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="h-full" src="{{ asset('assets/landing/compro/pelatihan.jpeg')}}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="h-full" src="{{ asset('assets/landing/compro/event.jpeg')}}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="h-full" src="{{ asset('assets/landing/compro/event2.jpeg')}}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="h-full" src="{{ asset('assets/landing/compro/event3.jpeg')}}" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-[2.5rem] px-4 max-sm:px-[1rem] bg-white">
                <h2 class="text-[2rem] font-medium">Perkembangan dan Fungsi BDC</h2>
                <br>
                <div class="grid gap-8 md:grid-cols-2">
                    <div class="text-justify">
                        <p class="indent-8">Business Development Center (BDC) atau Pusat Pengembangan Bisnis telah mengalami perkembangan yang signifikan sejak didirikan. Awalnya, BDC didirikan untuk memberikan dukungan kepada pengusaha dan usaha kecil yang memerlukan bimbingan dan sumber daya untuk memulai dan mengembangkan bisnis mereka.</p>

                        <p class="indent-8">Seiring berjalannya waktu, layanan BDC berkembang dari sekadar konsultasi bisnis dasar menjadi program yang lebih komprehensif, mencakup pelatihan, pendampingan, dan akses ke pendanaan. Dengan kemajuan teknologi, BDC mulai memanfaatkan alat digital untuk memberikan layanan, termasuk platform online untuk pelatihan, konsultasi virtual, dan aplikasi manajemen bisnis.</p>

                        <p class="indent-8">
                        Selain itu, BDC juga menjalin kemitraan dengan berbagai institusi, termasuk pemerintah, universitas, dan sektor swasta, untuk memperluas jangkauan dan meningkatkan kualitas layanan. Fokus pada inovasi dan start-up juga menjadi perhatian utama, dengan menyediakan inkubator dan akselerator bagi bisnis baru yang berpotensi tinggi.</p>
                    </div>
                    <div class="text-justify">
                        <p class="indent-8">Fungsi BDC sangat beragam dan penting untuk mendukung pertumbuhan bisnis. Salah satu fungsi utamanya adalah memberikan konsultasi dan bimbingan kepada pengusaha mengenai berbagai aspek bisnis, seperti manajemen, pemasaran, keuangan, dan operasional. Selain itu, BDC menyelenggarakan berbagai program pelatihan dan workshop untuk meningkatkan keterampilan dan pengetahuan pengusaha dalam mengelola bisnis. BDC juga membantu bisnis mendapatkan akses ke sumber pendanaan, baik melalui bantuan perbankan, investor, maupun program hibah pemerintah.</p>

                        <p class="indent-8">Riset pasar dan analisis yang dilakukan BDC sangat berguna untuk membantu bisnis memahami tren pasar dan mengidentifikasi peluang pertumbuhan. BDC juga membangun jaringan yang kuat dengan berbagai pemangku kepentingan, termasuk pengusaha lain, investor, dan institusi pendukung, untuk menciptakan peluang kolaborasi.</p>

                        <p class="indent-8">
                            Selain itu, BDC menyediakan program inkubasi untuk start-up dan akselerator untuk bisnis yang ingin berkembang lebih cepat, termasuk akses ke mentor, ruang kerja, dan sumber daya lainnya. Dukungan teknis dalam hal teknologi informasi, produksi, dan operasional juga ditawarkan untuk membantu bisnis meningkatkan efisiensi dan kualitas produk atau layanan mereka. Terakhir, BDC membantu bisnis dalam strategi promosi dan pemasaran untuk meningkatkan visibilitas dan daya saing di pasar.</p>
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
