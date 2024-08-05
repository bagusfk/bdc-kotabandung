@extends('layouts.appadmin')
@section('title', 'Kelola Barang')
@section('content')

    <section class="col-span-12 bg-white dark:bg-gray-900 md:col-span-7 ">
        <div class="max-w-2xl px-4 pb-8 mx-auto lg:pb-16">
            <i class="text-red-500 text-xs">* Wajib diisi</i>
            <form action="{{ route('update-pembeli') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" class="hidden" name="pembeli_id" value="{{ $pembeli->id }}">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $pembeli->name }}">
                        @error('name')
                            <span class="text-red-500 text-sm">Nama lengkap harus diisi</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="Leave blank to keep current password">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="password_confirmation"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Confirm Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            placeholder="Leave blank to keep current password">
                        @error('password_confirmation')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                            <span class="text-red-500">*</span></label>
                        <input type="text" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $pembeli->email }}">
                        @error('email')
                            <span class="text-red-500 text-sm">Email harus diisi</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="no_wa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                            WhatsApp <span class="text-red-500">*</span></label>
                        <input type="text" name="no_wa" id="no_wa"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $pembeli->no_wa }}">
                        @error('no_wa')
                            <span class="text-red-500 text-sm">No whatsapp harus diisi</span>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <input type="text" name="address" id="address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary dark:focus:border-primary"
                            value="{{ $pembeli->address }}">
                        @error('address')
                            <span class="text-red-500 text-sm">Alamat harus diisi</span>
                        @enderror
                    </div>

                </div>
                <div class="flex">
                    <button type="submit"
                        class="text-sm font-medium text-white p-2.5 bg-primary rounded-lg mt-[1rem] mr-2">Simpan</button>
                    <a href="{{ route('manage-ksm') }}"
                        class="text-sm font-medium text-primary p-2.5 bg-white border border-primary rounded-lg mt-[1rem] mr-2">Batal</a>
                </div>
            </form>
        </div>
    </section>

@endsection()
