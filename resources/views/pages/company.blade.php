<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4 bg-zinc-200">
                <div class="pl-[2rem] pt-[2rem]">
                    <h2 class="text-[2rem] font-medium">Profile Perusahaan</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi quae quaerat nulla, ducimus dolorem sapiente recusandae quos, repellat animi officiis perspiciatis rerum saepe quis tempore, quidem ratione! Doloremque, magni ipsum.Eligendi, amet. Exercitationem rerum optio quod tempore omnis quasi alias amet repudiandae! Maiores dolorem veritatis deserunt eaque facere dolores distinctio vel fuga? Ullam, sapiente. Consectetur cumque sed ea adipisci blanditiis.</p>
                </div>
                <div>
                    <img class="w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                </div>
            </div>

            <section class="py-[2.5rem]">
                <div class="flex w-full justify-center py-3">
                    <div class="w-1/2">
                        <h2 class="text-[2rem] font-medium text-center">VISI</h2>
                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt esse provident repellendus explicabo, eveniet in maiores quod ratione voluptas, iure quaerat et blanditiis ipsam iste laudantium dignissimos consectetur sit molestiae?Minus ratione excepturi eaque hic at atque dolor, suscipit iusto quidem odio eos exercitationem doloribus tempora laboriosam earum, aliquid ut beatae incidunt quam deserunt maiores ipsum velit. Accusantium, laboriosam dolorem.</p>
                    </div>
                </div>
                <div class="flex w-full justify-center">
                    <div class="w-1/2">
                        <h2 class="text-[2rem] font-medium text-center">MISI</h2>
                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt esse provident repellendus explicabo, eveniet in maiores quod ratione voluptas, iure quaerat et blanditiis ipsam iste laudantium dignissimos consectetur sit molestiae?Minus ratione excepturi eaque hic at atque dolor, suscipit iusto quidem odio eos exercitationem doloribus tempora laboriosam earum, aliquid ut beatae incidunt quam deserunt maiores ipsum velit. Accusantium, laboriosam dolorem.</p>
                    </div>
                </div>
            </section>
            <section class="py-[2.5rem]">
                <div class="grid grid-cols-3 shadow-lg rounded-lg">
                    <div class="">
                        <img class="w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                    </div>
                    <div class="">
                        <img class="w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                    </div>
                    <div class="">
                        <img class="w-full" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                    </div>
                </div>
            </section>
            <section class="py-[2.5rem] pb-[16rem]">
                <h2 class="text-[2rem] font-medium">Perkembangan dan Fungsi BDC</h2>
                <br>
                <div class="grid grid-cols-2 gap-4">
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
            <section class="pb-[10rem] pl-[3rem] bg-zinc-200">
                <div class="grid grid-cols-3">
                    <div class="my-4 items-start flex">
                        <img class="w-10" src="{{ asset('assets/location-dot-solid.svg') }}" alt="">
                        <span class="ml-[2rem]">Jl. Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nesciunt, magni eligendi eum enim, dicta totam, vero dolorem illo unde fugit mollitia reiciendis quaerat culpa. Quae illum nisi nihil aut.</span>
                    </div>
                    <div>
                        <ul class="my-4 pl-[8rem]">
                            <li>Company</li>
                            <li>E-Catalog</li>
                            <li>Event</li>
                        </ul>
                    </div>
                    <div>
                        <div class="flex items-center h-10 my-4 pl-[5rem]">
                            <img class="w-10" src="{{ asset('assets/instagram.svg') }}" alt="">
                            <span class="align-middle ml-4">@bdjbandungjuara</span>
                        </div>
                        <div class="flex items-center h-10 pl-[5rem]">
                            <img class="w-10" src="{{ asset('assets/whatsapp.svg') }}" alt="">
                            <span class="align-middle ml-4">0812-2254-1485</span>
                        </div>
                    </div>
                </div>
            </section>
            <hr class="border-black">
            <p class="text-center pb-[1rem]">Copy right @ BDC Bandung</p>
        </div>
    </div>

    {{-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --}}
</x-app-layout>
