@extends('layouts.appadmin')
@section('title', 'Tambah Event')
@section('content')
    <form action="{{ route('addorupdate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-2 gap-20 pb-[5rem] min-h-[25rem]">
            <div class="">
                <input type="hidden" name="id" value="1">
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Dokumentasi 1</label>
                    <input type="file" name="document_1"
                        class="block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Dokumentasi 2</label>
                    <input type="file" name="document_2"
                        class="block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Dokumentasi 3</label>
                    <input type="file" name="document_3"
                        class="block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Dokumentasi 4</label>
                    <input type="file" name="document_4"
                        class="block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mt-[1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Dokumentasi 5</label>
                    <input type="file" name="document_5"
                        class="block w-full text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="{{ route('dokumentasi-event') }}"
                class="text-sm font-medium text-primary p-2.5 bg-white border border-primary rounded-lg mt-[1rem] mr-2">Batal</a>
            <button type="submit"
                class="text-sm font-medium text-white p-2.5 bg-primary rounded-lg mt-[1rem]">Simpan</button>
        </div>
    </form>
@endsection()
