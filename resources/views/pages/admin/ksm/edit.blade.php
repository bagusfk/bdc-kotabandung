@extends('layouts.appadmin')
@section('title', 'Kelola Barang')
@section('content')
<form class="w-full" action="{{ route('update-ksm') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-2 gap-20 pb-[5rem]">
        <div class="">
            <input type="hidden" name="id" value="{{ $ksm->id }}">
            <div class="">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Usaha</label>
                <input type="text" name="business_name" id="business_name" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $ksm->business_name }}">
                @error('business_name')
                    <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-[1rem]">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pemilik</label>
                <input type="text" name="owner" id="owner" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $ksm->owner }}">
                @error('owner')
                    <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-[1rem]">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Whatsapp</label>
                <input type="text" name="no_whatsapp" id="no_whatsapp" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $ksm->no_whatsapp }}">
                @error('no_whatsapp')
                    <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-[1rem]">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                <select id="category" name="category_id" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($category as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $ksm->category_id ? 'selected' : '' }}>{{ $data->category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-[1rem]">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat KSM</label>
                <input type="text" name="address" id="address" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $ksm->address }}">
                @error('address')
                    <span class="text-red-500 text-sm"><br />{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="flex justify-end">
        <a href="{{ route('kelola-ksm') }}" class="text-sm font-medium text-primary p-2.5 bg-white border border-primary rounded-lg mt-[1rem] mr-2">Batal</a>
        <button type="submit" class="text-sm font-medium text-white p-2.5 bg-primary rounded-lg mt-[1rem]">Simpan</button>
    </div>
</form>

@endsection()
