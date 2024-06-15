@extends('layouts.appadmin')
@section('title', 'Kelola Event')
@section('content')
    <style>
        .swiper {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 300px;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
        }
    </style>
    <div class="w-full mt-[1rem]">
        <a href="{{ route('event-document') }}"
            class="text-sm font-medium text-white p-2.5 bg-primary rounded-lg inline-flex items-center">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="white"
                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
            </svg>
            <span class="ms-3">Perbarui Dokumentasi Event</span>
        </a>
    </div>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($image_event as $img)
                <div class="swiper-slide">
                    <img src="{{ asset($img->document_1) }}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset($img->document_2) }}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset($img->document_3) }}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset($img->document_4) }}" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset($img->document_5) }}" />
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            speed: 800,
        });
    </script>
@endsection
