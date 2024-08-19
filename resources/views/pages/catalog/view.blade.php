<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        </h2>
    </x-slot>

    <!-- Alert -->
    @if(session('success'))
        <div class="absolute z-10 flex justify-end w-full mx-auto top-24 max-w-7xl sm:px-6 lg:px-8">
            <div id="alert-3"  class="relative top-0 right-0 flex px-4 py-3 text-green-900 bg-green-200 border-l-4 border-green-600 rounded w-fit" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                  </svg>
                  <span class="sr-only">Sukses!</span>
                  <div class="text-sm font-medium ms-3"><span class="block sm:inline">{{ session('success') }}</span></div>
                  <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                  </button>
            </div>
        </div>
    @endif
    <div class="grid grid-cols-1 pt-12 mx-auto md:gap-4 md:grid-cols-4 max-w-7xl sm:px-6 lg:px-8">
        <div class="px-6 md:px-1">
            <div class="sticky flex flex-col gap-4 top-20">
                <form method="GET" action="{{ route('search.barang') }}"  class="relative w-full">
                    <input type="search" name="search" value="{{ request()->input('search')}}" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-e-gray-50 border-e-2 border border-gray-300 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Cari Produk" required />
                    <button type="submit" class="absolute top-0 end-[1px] p-2.5 text-sm font-medium h-full text-black rounded-e-lg border-e bg-gray-300 ">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
                {{-- <form method="GET" action="{{ route('search.category') }}" >
                    <select name="category_id" onchange="this.form.submit()" id="" class="text-white border rounded-lg cursor-pointer bg-primary focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                        <option value="" class="text-black bg-white">Category</option>
                        <option value="" class="text-black bg-white">semua kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request()->input('category_id') == $category->id ? 'selected' : '' }} class="text-black bg-white">{{$category->category}}</option>
                        @endforeach
                    </select>
                </form> --}}
                <div class="px-2 mt-4 font-bold leading-none text-gray-500">kategori</div>
                <div class="h-full px-3 py-4 overflow-y-auto rounded-xl bg-gray-50 dark:bg-gray-800">
                    <ul class="space-y-1 font-sm">
                        <li>
                            <a href="{{ route('catalog', ['search' => request()->input('search')]) }}" class="{{ is_null(request()->input('category_id')) ? 'font-bold border bg-primary text-white' : 'text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700' }} flex items-center rounded-lg p-2  group">
                            {{-- <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                            </svg> --}}
                            <span class="ms-3">Semua Category</span>
                            </a>
                        </li>
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('search.category',['search' => request()->input('search'),'category_id' => $category->id]) }}" class="{{ request()->input('category_id') == $category->id ? 'font-bold border bg-primary text-white' : 'text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700' }} flex items-center rounded-lg p-2  group">
                                    <span class="ms-3">{{$category->category}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-span-3">
            {{-- get Category --}}
            {{-- @php
                $snacks = $categories->where('category', 'Makanan Ringan')->first()->items;
                $drinks = $categories->where('category', 'Minuman')->first()->items;
                $vegetables = $categories->where('category', 'Sayuran')->first()->items;
                $meats = $categories->where('category', 'Daging')->first()->items;
                $fish = $categories->where('category', 'Ikan')->first()->items;

            @endphp --}}

            <section class="">
                @if ( $items->isNotEmpty() )
                    <div class="text-2xl max-sm:px-[1rem] font-medium text-[#666]">{!! request()->input('search') ? '<span class="text-lg max-sm:px-[1rem] font-medium text-[#8b8b8b]">Hasil pencarian dari</span> ' . e(request()->input('search')) : 'Semua Produk' !!}</div>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-4 gap-2 py-[1rem] max-sm:px-[1rem] px-[1rem]">
                        @foreach ($items as $item)
                            <div class="w-full bg-white border p-[0.5rem] sm:p-[1rem] border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                                <div class="w-40 h-40 overflow-clip">
                                    <img class="object-cover w-full h-full" src="{{ asset($item->picture_product) }}" alt="" />
                                </div>
                                <h5 class="text-lg font-bold tracking-tight text-gray-900 max-sm:text-lg dark:text-white">{{ $item->name }}</h5>
                                <h5 class="text-lg font-bold tracking-tight text-primary max-sm:text-lg dark:text-white">Rp {{ number_format($item->price, 0, ',', '.') }}</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" style="-webkit-line-clamp: 1; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $item->description }}</p>
                                <div class="flex flex-col">
                                    <div class="">
                                        <a href="{{ route('detail_catalog', $item->id) }}" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                            Details
                                        </a>
                                    </div>
                                    @auth
                                        @if (Route::has('login') && Auth::user()->id != $item->ksm->user_id)
                                                <div class="text-center">
                                                    <form action="{{ route('cart.add', $item) }}" method="post">
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
                        @endforeach
                    </div>
                @else
                    <div class="flex items-center justify-center h-screen">
                        <div>Produk tidak ditemukan</div>
                    </div>
                @endif
            </section>


            {{-- <section class="mt-[2rem]">
                <span class="text-2xl max-sm:px-[1rem] font-medium text-[#777]">Makanan Ringan</span>
                <div class="grid grid-cols-2 lg:grid-cols-4 sm:gap-8 gap-2 py-[1rem] max-sm:px-[1rem] px-[1rem]">
                    @foreach ($snacks as $item)
                        <div class="w-full bg-white border p-[0.5rem] sm:p-[1rem] border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 max-sm:text-lg dark:text-white">{{ $item->name }}</h5>
                            <img class="aspect-square" src="{{ asset($item->picture_product) }}" alt="" />
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 h-[4.5rem]" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $item->description }}</p>
                            <div class="flex flex-col">
                                <div class="">
                                    <a href="{{ url('e-catalog/' . $item->id) }}" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                        Details
                                    </a>
                                </div>
                                @if (Route::has('login'))
                                    @auth
                                        <div class="text-center">
                                            <form action="{{ route('cart.add', $item) }}" method="post">
                                                @csrf
                                                <input type="number" value="1" name="qty" hidden>
                                                <button type="submit" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                                    <svg class="w-6 h-6 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="">
                                            <a href="#" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
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
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 max-sm:text-lg dark:text-white">{{ $item->name }}</h5>
                            <img class="aspect-square" src="{{ asset($item->picture_product) }}" alt="" />
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 h-[4.5rem]" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $item->description }}</p>
                            <div class="flex flex-col">
                                <div class="">
                                    <a href="{{ url('e-catalog/' . $item->id) }}" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                        Details
                                    </a>
                                </div>
                                @if (Route::has('login'))
                                    @auth
                                        <div class="text-center">
                                            <form action="{{ route('cart.add', $item) }}" method="post">
                                                @csrf
                                                <input type="number" value="1" name="qty" hidden>
                                                <button type="submit" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                                    <svg class="w-6 h-6 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="">
                                            <a href="#" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
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
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 max-sm:text-lg dark:text-white">{{ $item->name }}</h5>
                            <img class="aspect-square" src="{{ asset($item->picture_product) }}" alt="" />
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 h-[4.5rem]" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $item->description }}</p>
                            <div class="flex flex-col">
                                <div class="">
                                    <a href="{{ url('e-catalog/' . $item->id) }}" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                        Details
                                    </a>
                                </div>
                                @if (Route::has('login'))
                                    @auth
                                        <div class="text-center">
                                            <form action="{{ route('cart.add', $item) }}" method="post">
                                                @csrf
                                                <input type="number" value="1" name="qty" hidden>
                                                <button type="submit" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                                    <svg class="w-6 h-6 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="">
                                            <a href="#" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
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
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 max-sm:text-lg dark:text-white">{{ $item->name }}</h5>
                            <img class="aspect-square" src="{{ asset($item->picture_product) }}" alt="" />
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 h-[4.5rem]" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $item->description }}</p>
                            <div class="flex flex-col">
                                <div class="">
                                    <a href="{{ url('e-catalog/' . $item->id) }}" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                        Details
                                    </a>
                                </div>
                                @if (Route::has('login'))
                                    @auth
                                        <div class="text-center">
                                            <form action="{{ route('cart.add', $item) }}" method="post">
                                                @csrf
                                                <input type="number" value="1" name="qty" hidden>
                                                <button type="submit" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                                    <svg class="w-6 h-6 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="">
                                            <a href="#" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
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
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 max-sm:text-lg dark:text-white">{{ $item->name }}</h5>
                            <img class="aspect-square" src="{{ asset($item->picture_product) }}" alt="" />
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 h-[4.5rem]" style="-webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden">{{ $item->description }}</p>
                            <div class="flex flex-col">
                                <div class="">
                                    <a href="{{ url('e-catalog/' . $item->id) }}" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                        Details
                                    </a>
                                </div>
                                @if (Route::has('login'))
                                    @auth
                                        <div class="text-center">
                                            <form action="{{ route('cart.add', $item) }}" method="post">
                                                @csrf
                                                <input type="number" value="1" name="qty" hidden>
                                                <button type="submit" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                                    <svg class="w-6 h-6 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="">
                                            <a href="#" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-white border rounded-lg dark:text-gray-400 dark:hover:text-white bg-primary hover:bg-transparent hover:border-primary hover:text-primary hover:border">
                                                Beli Sekarang
                                            </a>
                                        </div>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </section> --}}
        </div>
    </div>
</x-app-layout>
