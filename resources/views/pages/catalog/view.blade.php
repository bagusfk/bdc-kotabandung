<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <form class="max-w-lg">
                    <div class="flex">
                            <select name="" id="" class="text-white bg-primary border rounded-lg focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600 cursor-pointer">
                                <option value="" class="bg-white text-black">Category</option>
                                @foreach ($categories as $category)
                                    <option value="" class="bg-white text-black">{{$category->category}}</option>
                                @endforeach
                            </select>
                        <div class="relative w-full ml-[2rem]">
                            <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-e-gray-50 border-e-2 border border-gray-300 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Cari SDM" required />
                            <button type="submit" class="absolute top-0 end-[1px] p-2.5 text-sm font-medium h-full text-black rounded-e-lg border-e border-gray-300">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- get Category --}}
            @php
                $snacks = $categories->where('category', 'Makanan Ringan')->first()->items;
                $drinks = $categories->where('category', 'Minuman')->first()->items;
                $vegetables = $categories->where('category', 'Sayuran')->first()->items;
                $meats = $categories->where('category', 'Daging')->first()->items;
                $fish = $categories->where('category', 'Ikan')->first()->items;
            @endphp
            {{-- // --}}
            <section class="mt-[2rem]">
                <span class="text-2xl max-sm:px-[1rem] font-medium text-[#777]">Makanan Ringan</span>
                <div class="grid grid-cols-2 lg:grid-cols-4 sm:gap-8 gap-2 py-[1rem] max-sm:px-[1rem] px-[1rem]">
                    @foreach ($snacks as $item)
                        <div class="w-full bg-white border p-[0.5rem] sm:p-[1rem] border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-2 max-sm:text-lg text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
                            <img class="aspect-square" src="{{ asset($item->picture_product) }}" alt="" />
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 h-[4.5rem]" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $item->description }}</p>
                            <div class="sm:grid grid-cols-4 gap-1">
                                <div class="">
                                    <a href="{{ url('e-catalog/' . $item->id) }}" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                        Details
                                    </a>
                                </div>
                                @if (Route::has('login'))
                                    @auth
                                        <div class="col-span-2 text-center">
                                            <a href="#" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                                Masukan Keranjang
                                            </a>
                                        </div>
                                        <div class="">
                                            <a href="#" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                                Beli Sekarang
                                            </a>
                                        </div>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="mt-[2rem]">
                <span class="text-2xl max-sm:px-[1rem] font-medium text-[#777]">Minuman</span>
                <div class="grid grid-cols-2 lg:grid-cols-4 sm:gap-8 gap-2 py-[1rem] max-sm:px-[1rem] px-[1rem]">
                    @foreach ($drinks as $item)
                        <div class="w-full bg-white border p-[0.5rem] sm:p-[1rem] border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-2 max-sm:text-lg text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
                            <img class="aspect-square" src="{{ asset($item->picture_product) }}" alt="" />
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 h-[4.5rem]" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $item->description }}</p>
                            <div class="sm:grid grid-cols-4 gap-1">
                                <div class="">
                                    <a href="{{ url('e-catalog/' . $item->id) }}" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                        Details
                                    </a>
                                </div>
                                @if (Route::has('login'))
                                    @auth
                                        <div class="col-span-2 text-center">
                                            <a href="#" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                                Masukan Keranjang
                                            </a>
                                        </div>
                                        <div class="">
                                            <a href="#" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                                Beli Sekarang
                                            </a>
                                        </div>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="mt-[2rem]">
                <span class="text-2xl max-sm:px-[1rem] font-medium text-[#777]">Sayuran</span>
                <div class="grid grid-cols-2 lg:grid-cols-4 sm:gap-8 gap-2 py-[1rem] max-sm:px-[1rem] px-[1rem]">
                    @foreach ($vegetables as $item)
                        <div class="w-full bg-white border p-[0.5rem] sm:p-[1rem] border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-2 max-sm:text-lg text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
                            <img class="aspect-square" src="{{ asset($item->picture_product) }}" alt="" />
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 h-[4.5rem]" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $item->description }}</p>
                            <div class="sm:grid grid-cols-4 gap-1">
                                <div class="">
                                    <a href="{{ url('e-catalog/' . $item->id) }}" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                        Details
                                    </a>
                                </div>
                                @if (Route::has('login'))
                                    @auth
                                        <div class="col-span-2 text-center">
                                            <a href="#" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                                Masukan Keranjang
                                            </a>
                                        </div>
                                        <div class="">
                                            <a href="#" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                                Beli Sekarang
                                            </a>
                                        </div>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="mt-[2rem]">
                <span class="text-2xl max-sm:px-[1rem] font-medium text-[#777]">Daging</span>
                <div class="grid grid-cols-2 lg:grid-cols-4 sm:gap-8 gap-2 py-[1rem] max-sm:px-[1rem] px-[1rem]">
                    @foreach ($meats as $item)
                        <div class="w-full bg-white border p-[0.5rem] sm:p-[1rem] border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-2 max-sm:text-lg text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
                            <img class="aspect-square" src="{{ asset($item->picture_product) }}" alt="" />
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 h-[4.5rem]" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $item->description }}</p>
                            <div class="sm:grid grid-cols-4 gap-1">
                                <div class="">
                                    <a href="{{ url('e-catalog/' . $item->id) }}" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                        Details
                                    </a>
                                </div>
                                @if (Route::has('login'))
                                    @auth
                                        <div class="col-span-2 text-center">
                                            <a href="#" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                                Masukan Keranjang
                                            </a>
                                        </div>
                                        <div class="">
                                            <a href="#" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                                Beli Sekarang
                                            </a>
                                        </div>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="mt-[2rem]">
                <span class="text-2xl max-sm:px-[1rem] font-medium text-[#777]">Ikan</span>
                <div class="grid grid-cols-2 lg:grid-cols-4 sm:gap-8 gap-2 py-[1rem] max-sm:px-[1rem] px-[1rem]">
                    @foreach ($fish as $item)
                        <div class="w-full bg-white border p-[0.5rem] sm:p-[1rem] border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-2 max-sm:text-lg text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->name }}</h5>
                            <img class="aspect-square" src="{{ asset($item->picture_product) }}" alt="" />
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 h-[4.5rem]" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $item->description }}</p>
                            <div class="sm:grid grid-cols-4 gap-1">
                                <div class="">
                                    <a href="{{ url('e-catalog/' . $item->id) }}" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                        Details
                                    </a>
                                </div>
                                @if (Route::has('login'))
                                    @auth
                                        <div class="col-span-2 text-center">
                                            <a href="#" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                                Masukan Keranjang
                                            </a>
                                        </div>
                                        <div class="">
                                            <a href="#" class="inline-flex justify-center items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border rounded-lg w-full">
                                                Beli Sekarang
                                            </a>
                                        </div>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
