<x-ksm.app>
    {{-- @if(session('success'))
        <x-modal-message-handle id="successModal" title="asd" />
    @endif --}}

    <!-- resources/views/components/modal.blade.php -->
    @if (session('success'))
        <div x-data="{ isOpen: true }" x-show="isOpen" x-cloak
            x-init="$watch('isOpen', value => {
                if (value) {
                    document.body.classList.add('overflow-hidden');
                } else {
                    document.body.classList.remove('overflow-hidden');
                }
            })" style="display: none">
            <div class="fixed inset-0 z-50 flex items-center justify-center px-4">
                <div class="p-2 bg-white rounded-xl w-[550px] flex flex-col gap-8">
                    <div class="flex items-center justify-end w-full modal-header">
                        {{-- <h5 class="text-lg font-bold">asdasd</h5> --}}
                        <button @click="isOpen = false" class="px-2 text-3xl text-gray-500 hover:text-gray-700">&times;</button>
                    </div>
                    <div class="flex flex-col gap-2 px-8 font-sans text-center modal-body">
                        <div class="flex items-center justify-center h-44">
                            <img src="{{ asset('assets\landing\illustrations\success.svg') }}" alt="" class="h-72">
                        </div>
                        <div class="text-3xl font-bold">Selamat</div>
                        <div class="text-xl">Kamu berhasil terdaftar sebagai anggota KSM, sekarang ayo kita tambahkan produk kamu!</div>
                    </div>
                    <div class="flex justify-center pt-2 pb-4 modal-footer">
                        <button @click="isOpen = false" class="px-8 py-2 text-white bg-blue-500 rounded-xl">Oke</button>
                    </div>
                </div>
            </div>
            <div class="fixed inset-0 z-40 bg-black opacity-50" @click="isOpen = false"></div>
        </div>
    @endif


    <nav class="sticky top-0 z-50 h-16 bg-white shadow-sm">
        <div class="flex justify-between h-full px-4 mx-auto max-w-7xl">
            <div class="flex h-full gap-3 w-fit">
                <a href="" class="flex items-center justify-center pr-1 my-auto border border-black rounded-full w-9 h-9">
                    <svg class="w-6 h-6 text-gray-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                    </svg>
                </a>
                <div class="flex items-center h-12 my-auto text-3xl font-bold text-gray-700">Dashboard KSM</div>
            </div>
            <div class="flex items-center h-full">
                <button id="dropdownDelayButton" data-dropdown-toggle="dropdownDelay" data-dropdown-offset-distance="-150" data-dropdown-offset-skidding="150" data-dropdown-placement="left" data-dropdown-delay="400" data-dropdown-trigger="hover" class="flex items-center text-sm font-medium text-gray-900 rounded-full pe-1 hover:bg-gray-100 md:me-0 " type="button">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full me-2" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                    Bonnie Green
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownDelay" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow min-w-44 dark:bg-gray-700">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div>Bonnie Green</div>
                        <div class="font-medium truncate">name@flowbite.com</div>
                      </div>
                      <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li>
                      </ul>
                      <div class="py-2">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                      </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="grid grid-cols-1 px-4 py-6 mx-auto md:gap-1 lg:gap-2 md:grid-cols-4 max-w-7xl lg:px-4">
        <div class="md:px-4">
            <div class="sticky flex flex-col gap-4 px-2 pb-2 pt-6 bg-white md:top-[88px] rounded-2xl">
                <div class="flex flex-col items-center gap-2 ">
                    <div class="overflow-hidden bg-blue-300 rounded-full w-28 h-28">
                        {{-- replace to image --}}
                        <div class="w-full h-full bg-red-300"></div>
                    </div>
                    <div class="px-2 text-lg font-bold leading-none text-gray-800">Nama Lengkap User</div>
                    <div class="px-2 text-xs font-semibold text-red-500 border border-red-500 rounded-full bg-red-50">belum punya produk!</div>
                    <div class="px-2 text-xs font-semibold text-red-500 border border-red-500 rounded-full bg-red-50">belum terverifikasi!</div>
                    <div class="px-2 text-xs font-semibold text-red-500 border border-red-500 rounded-full bg-red-50">belum punya brand!</div>
                    {{-- <div class="h-6 bg-blue-300 w-44"></div> --}}
                </div>
                {{-- <div class="px-2 text-sm font-bold leading-none text-gray-500">Kategori</div> --}}
                <div class="h-full px-3 py-4 overflow-y-auto bg-gray-200 rounded-xl">
                    <ul class="space-y-1 text-xs">
                        <li>
                            <a href="" class="flex items-center p-2 font-bold text-white border rounded-lg bg-primary group">
                            <span class="">Dashboard</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group">
                                <span class="">list disini</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group">
                                <span class="">ist disini</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group">
                                <span class="">ist disini</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group">
                                <span class="">ist disini</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex flex-col col-span-3 gap-4">
            <div class="px-4 py-4 text-lg font-bold leading-none text-gray-800 bg-white rounded-xl">Daftar Brand Anda</div>
            <div class="grid w-full grid-cols-2 gap-4">
                <div class="w-full bg-white rounded-xl h-44"></div>
                <div class="w-full bg-white rounded-xl h-44"></div>
                <div class="w-full bg-white rounded-xl h-44"></div>
                <div class="w-full bg-white rounded-xl h-44"></div>
                <a href="" class="flex items-center justify-center w-full border-2 border-gray-500 border-dashed rounded-xl h-44 hover:bg-white">
                    <svg class="w-[30px] h-[30px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 12h14m-7 7V5"/>
                    </svg>
                    Tambah Brand
                </a>
            </div>
        </div>
    </div>

    {{-- @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @if(session('success'))
                    setTimeout(() => {
                        document.querySelector('#successModal').__x.$data.isOpen = true;
                    }, 100);
                @endif
            });
        </script>
    @endpush --}}
</x-ksm.app>
