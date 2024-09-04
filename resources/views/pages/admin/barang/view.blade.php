@extends('layouts.appadmin')
@section('title', 'Kelola Barang')
@section('content')
    <div class="flex justify-between">
        <div class="flex items-center">
            <svg class="inline-flex h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z" />
            </svg>
            <span class="ml-[1rem] text-2xl font-semibold">Kelola Barang</span>
        </div>
    </div>

    <div class="relative my-[1rem] overflow-x-auto shadow-md sm:rounded-lg">
        <table id="dataTable" class="display nowrap w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama KSM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pemilik
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stok
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Expired
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kategori Barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                </tr>
            </thead>
            <tbody id="dataList">
                @php
                    $no = 1;
                @endphp
                @foreach ($items as $data)
                    <tr>
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $no++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->ksm->brand_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->ksm->owner }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->name }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-4 overflow-x-auto">
                                @foreach ($data->product_pictures as $pictures)
                                    <img class="w-full" id="image-old" src="{{ asset($pictures->product_picture) }}">
                                @endforeach
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->stock }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->expired ? \Carbon\Carbon::parse($data->expired)->format('d-m-Y') : '-' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->category->category }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ url('/edit-item/' . $data->id) }}"
                                class="mr-2 font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                            <form method="POST" action="{{ url('/delete-item/' . $data->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <button type="submit" class="font-medium text-red-700 hover:underline dark:text-blue-500"
                                    onclick="return confirm('Are you sure you want to delete product?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $('#dataTable').DataTable({
            layout: {
                topStart: {
                    buttons: [{
                        text: 'Add',
                        action: function() {
                            window.location.href = '/tambah-barang';
                        }
                    }]
                }
            }
        });
    </script>
@endsection()
