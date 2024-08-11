<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <section class="py-[7rem] px-[3rem]">
        <div class="grid gap-4 max-md:grid-cols-1 lg:grid-cols-3 max-lg:grid-cols-2">
            <div class="flex items-start my-4">
                <img class="w-4" src="{{ asset('assets/location-dot-solid.svg') }}" alt="">
                <span class="ml-4"><span class="text-lg font-bold">Auditorium - Balaikota Bandung</span><br> Babakan Ciamis, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40117</span>
            </div>
            <div class="w-full my-4">
                <a href="{{route('company_profile')}}" class="w-full flex items-center pl-[3.5rem] hover:underline max-md:py-2">
                    <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z"/>
                    </svg>
                    Company</a>
                <a href="{{route('catalog')}}" class="w-full flex items-center pl-[3.5rem] hover:underline pt-2">
                    <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4"/>
                    </svg>
                    E-Catalog</a>
                <a href="{{route('event')}}" class="w-full flex items-center pl-[3.5rem] hover:underline pt-2">
                    <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                    </svg>
                    Event</a>
            </div>
            <div class="my-4">
                <div class="flex items-center h-10 lg:pl-[5rem]">
                    <img class="w-5" src="{{ asset('assets/instagram.svg') }}" alt="">
                    <a href="https://www.instagram.com/bdc.bandungjuara/" target="_blank"
                        class="ml-4 align-middle hover:underline">@bdc.bandungjuara</a>
                </div>
                <div class="flex items-center h-10 my-4 lg:pl-[5rem]">
                    <img class="w-5" src="{{ asset('assets/whatsapp.svg') }}" alt="">
                    <a href="whatsapp://send?phone=6281222541485" target="_blank"
                        class="ml-4 align-middle hover:underline">0812-2254-1485</a>
                </div>
            </div>
        </div>
    </section>
    <hr class="border-black">
    <p class="text-center pb-[1rem]">&copy; 2024 BDC Bandung</p>
</div>
