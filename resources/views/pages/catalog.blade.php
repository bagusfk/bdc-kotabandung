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
                        <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">All categories
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                            </li>
                            </ul>
                        </div>
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-e-gray-50 border-e-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates..." required />
                            <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-black rounded-e-lg border focus:ring-4 focus:outline-none focus:ring-blue-300">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <section class="mt-[2rem]">
                <span class="text-2xl font-medium text-[#777]">Makanan Ringan</span>
                <div class="grid grid-cols-2 gap-8 py-[1rem] px-[2rem]">
                    <div class="w-full bg-white border p-[2rem] border-gray-200 rounded-3xl shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        <img class="rounded-t-lg w-full h-[19rem]" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="" />
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta obcaecati ducimus cum sit. Excepturi numquam a expedita facere repellendus officia quis aperiam commodi dolorem, voluptas quia magnam amet autem optio.Voluptatum necessitatibus architecto maiores fugiat dolore neque delectus earum doloremque, ab ea eveniet dolorem blanditiis repellenduk.</p>
                        <div class="grid grid-cols-4 gap-4">
                            <div class="">
                                <a href="#" class="inline-flex items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-[#04a7ff] hover:bg-transparent hover:border-[#04a7ff] hover:text-[#04a7ff] hover:border rounded-lg">
                                    Details
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="hidden"></div>
                            <div class="hidden"></div>
                            <div class="hidden"></div>
                        </div>
                    </div>
                    <div class="w-full bg-white border p-[2rem] border-gray-200 rounded-3xl shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        <img class="rounded-t-lg w-full h-[19rem]" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="" />
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta obcaecati ducimus cum sit. Excepturi numquam a expedita facere repellendus officia quis aperiam commodi dolorem, voluptas quia magnam amet autem optio.Voluptatum necessitatibus architecto maiores fugiat dolore neque delectus earum doloremque, ab ea eveniet dolorem blanditiis repellenduk.</p>
                        <div class="grid grid-cols-4 gap-4">
                            <div class="">
                                <a href="#" class="inline-flex items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-[#04a7ff] hover:bg-transparent hover:border-[#04a7ff] hover:text-[#04a7ff] hover:border rounded-lg">
                                    Details
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="hidden"></div>
                            <div class="hidden"></div>
                            <div class="hidden"></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mt-[2rem]">
                <span class="text-2xl font-medium text-[#777]">Makanan Ringan</span>
                <div class="grid grid-cols-2 gap-8 py-[1rem] px-[2rem]">
                    <div class="w-full bg-white border p-[2rem] border-gray-200 rounded-3xl shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        <img class="rounded-t-lg w-full h-[19rem]" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="" />
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta obcaecati ducimus cum sit. Excepturi numquam a expedita facere repellendus officia quis aperiam commodi dolorem, voluptas quia magnam amet autem optio.Voluptatum necessitatibus architecto maiores fugiat dolore neque delectus earum doloremque, ab ea eveniet dolorem blanditiis repellenduk.</p>
                        <div class="grid grid-cols-4 gap-4">
                            <div class="">
                                <a href="#" class="inline-flex items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-[#04a7ff] hover:bg-transparent hover:border-[#04a7ff] hover:text-[#04a7ff] hover:border rounded-lg">
                                    Details
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="hidden"></div>
                            <div class="hidden"></div>
                            <div class="hidden"></div>
                        </div>
                    </div>
                    <div class="w-full bg-white border p-[2rem] border-gray-200 rounded-3xl shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        <img class="rounded-t-lg w-full h-[19rem]" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="" />
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta obcaecati ducimus cum sit. Excepturi numquam a expedita facere repellendus officia quis aperiam commodi dolorem, voluptas quia magnam amet autem optio.Voluptatum necessitatibus architecto maiores fugiat dolore neque delectus earum doloremque, ab ea eveniet dolorem blanditiis repellenduk.</p>
                        <div class="grid grid-cols-4 gap-4">
                            <div class="">
                                <a href="#" class="inline-flex items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-[#04a7ff] hover:bg-transparent hover:border-[#04a7ff] hover:text-[#04a7ff] hover:border rounded-lg">
                                    Details
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="hidden"></div>
                            <div class="hidden"></div>
                            <div class="hidden"></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mt-[2rem]">
                <span class="text-2xl font-medium text-[#777]">Makanan Ringan</span>
                <div class="grid grid-cols-2 gap-8 py-[1rem] px-[2rem]">
                    <div class="w-full bg-white border p-[2rem] border-gray-200 rounded-3xl shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        <img class="rounded-t-lg w-full h-[19rem]" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="" />
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta obcaecati ducimus cum sit. Excepturi numquam a expedita facere repellendus officia quis aperiam commodi dolorem, voluptas quia magnam amet autem optio.Voluptatum necessitatibus architecto maiores fugiat dolore neque delectus earum doloremque, ab ea eveniet dolorem blanditiis repellenduk.</p>
                        <div class="grid grid-cols-4 gap-4">
                            <div class="">
                                <a href="#" class="inline-flex items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-[#04a7ff] hover:bg-transparent hover:border-[#04a7ff] hover:text-[#04a7ff] hover:border rounded-lg">
                                    Details
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="hidden"></div>
                            <div class="hidden"></div>
                            <div class="hidden"></div>
                        </div>
                    </div>
                    <div class="w-full bg-white border p-[2rem] border-gray-200 rounded-3xl shadow dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        <img class="rounded-t-lg w-full h-[19rem]" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="" />
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta obcaecati ducimus cum sit. Excepturi numquam a expedita facere repellendus officia quis aperiam commodi dolorem, voluptas quia magnam amet autem optio.Voluptatum necessitatibus architecto maiores fugiat dolore neque delectus earum doloremque, ab ea eveniet dolorem blanditiis repellenduk.</p>
                        <div class="grid grid-cols-4 gap-4">
                            <div class="">
                                <a href="#" class="inline-flex items-center px-3 py-2 border text-sm font-medium text-center text-white dark:text-gray-400 dark:hover:text-white bg-[#04a7ff] hover:bg-transparent hover:border-[#04a7ff] hover:text-[#04a7ff] hover:border rounded-lg">
                                    Details
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="hidden"></div>
                            <div class="hidden"></div>
                            <div class="hidden"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
