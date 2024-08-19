<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        </h2>
    </x-slot>
    <h1 class="w-48 pt-10 mb-5 ml-8 text-3xl">Keranjang</h1>
    <form method="POST" action="{{ route('checkout') }}">
        @csrf
        <div class="grid grid-cols-3 gap-6 mx-auto mb-4 max-w-7xl">
            <div class="flex-col w-full col-span-2">
                @foreach ($data as $seller => $carts)
                <div class="p-2 mt-2 bg-white border select_with_store border-slate-300">
                    <div class="flex items-center gap-3 py-2 border-b-2">
                        <label for="store_name" class="font-bold">{{ $seller}}</label>
                    </div>
                    @foreach ($carts as $cart)
                        <div class="flex justify-between px-4 py-4 my-2 bg-gray-100 rounded-lg">
                            <div class="flex items-start gap-3">
                                <input type="checkbox" name="selected_carts[]" class="rounded cart-checkbox" value="{{ $cart->id }}" data-price="{{ $cart->stokbarang->price }}">
                                <img src="{{asset($cart->stokbarang->picture_product)}}" alt="" class="w-16 h-16">
                                <label for="item_name" class="">{{ $cart->stokbarang->name }}</label>
                            </div>
                            <div class="">
                                <span class="price">Rp{{ $cart->stokbarang->price }}</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-8">
                            <a href="#" class="font-medium text-red-500">Hapus</a>
                            <div class="flex items-center quantity">
                                <div class="font-medium">Jumlah : </div>
                                <input id="qty-{{ $cart->id }}" type="number" name="qty[{{ $cart->id }}]" value="{{$cart->qty}}" min="1" max="{{$cart->stokbarang->stock}}" class="cart-qty">
                            </div>
                        </div>
                    @endforeach
                </div>
                @endforeach
            </div>
            <div class="flex-col w-full col-span-1">
                <div class="container p-2 bg-white border rounded-lg border-slate-300">
                    <h1 class="mb-3 font-extrabold">Ringkasan Belanja</h1>
                    <div class="flex justify-between mb-3">
                        <span>Total Belanja</span>
                        <span id="totalPrice">Rp0</span>
                    </div>
                    <button class="w-full p-2 px-5 text-white rounded bg-primary">
                        Pesan Sekarang
                    </button>
                </div>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.cart-checkbox');
            const totalPriceElement = document.getElementById('totalPrice');
            const quantities = document.querySelectorAll('.cart-qty');

            function calculateTotalPrice() {
                let total = 0;
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        const quantity = parseInt(document.getElementById('qty-' + checkbox.value).value);
                        const price = parseInt(checkbox.getAttribute('data-price'));
                        total += price * quantity;
                    }
                });
                totalPriceElement.innerText = `Rp${total}`;
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', calculateTotalPrice);
            });

            quantities.forEach(quantity => {
                quantity.addEventListener('input', calculateTotalPrice);
            });

            // Panggil fungsi pertama kali untuk kalkulasi awal
            calculateTotalPrice();
        });
    </script>
</x-app-layout>
