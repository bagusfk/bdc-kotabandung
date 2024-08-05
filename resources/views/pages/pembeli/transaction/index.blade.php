<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key')}}"></script>
</head>
<body class="overflow-y-auto scroll">
    {{-- navbar --}}
    <div class="sticky top-0 z-50 bg-white shadow-md">
        <div class="py-4 mx-auto max-w-7xl">
            <div class="text-2xl font-bold ">
                Bussiness Development Center
            </div>
        </div>
    </div>

    {{-- content --}}
    <div class="bg-gray-50">
        <div class="py-12 mx-auto max-w-7xl">
            <div class="mb-4 text-3xl font-semibold">Pembayaran</div>
            <div class="grid grid-cols-1 md:gap-4 md:grid-cols-3">
                <div class="flex flex-col col-span-2 gap-4 mb-4">
                    <div class="px-4 py-3 bg-white border-2 border-gray-100 rounded-lg">
                        <div class="mb-2 font-bold text-gray-500 text-md">Alamat Pengiriman</div>
                        @if (Auth::user()->city_id == null)
                            <div class="flex items-center gap-2 px-4 py-2 bg-yellow-100 rounded-2xl">
                                <div class="flex-1">Mohon isi alamat terlebih dahulu di menu profile sebelum melakukan transaksi, Terimakasih!</div>
                                <a href="{{ route('profile.edit') }}" class="px-2 py-1 text-sm text-white bg-blue-500 rounded-lg h-fit">Lenkapi Alamat</a>
                            </div>
                        @else
                            <div class="my-2 text-sm font-bold text-gray-700">Penerima : {{ Auth::user()->name }}</div>
                            <p class="mb-4 text-sm text-gray-700">
                                {{ Auth::user()->address }}, {{ Auth::user()->cities->city_name}}, {{ Auth::user()->cities->province}}
                            </p>
                        @endif
                    </div>
                @foreach ($order as $sellerName => $products)
                    <div class="px-3 py-2 bg-white border-2 border-gray-100 rounded-lg">
                        <div class="flex items-center justify-between gap-3 py-2 border-b">
                            <div class="flex flex-wrap items-center gap-3">
                                <div class="font-bold">
                                    {{ $sellerName }}
                                </div>
                            </div>
                        </div>

                    @foreach ($products as $product)
                        <div class="flex justify-between py-4">
                            <div class="flex items-start flex-1 gap-3 p-2 bg-gray-100 rounded-lg max-w-96">
                                <img src="{{asset( $product->item->picture_product )}}" alt="" class="w-16 h-16">
                                <div>
                                    <div class="font-bold">{{ $product->item->name }}</div>
                                    <div class="text-sm text-gray-600">{{ $product->qty }} x Rp {{ $product->item->price }}</div>
                                </div>
                            </div>
                            <div class="flex-none ps-8">
                                <div class="font-medium text-gray-500">Rp{{ $product->qty * $product->item->price }}</div>
                            </div>
                        </div>
                    @endforeach
                        <div class="py-2 font-medium text-gray-500 border-t text-end">Total Pesanan ({{$totals[$sellerName]['totalQty']}}) <span class="font-semibold text-primary"> Rp{{$totalPrices[$sellerName]}}</span></div>
                    </div>
                @endforeach
                </div>
                <div class="w-full">
                    <div class="flex flex-col w-full px-4 py-3 mb-4 bg-white border-2 border-gray-200 rounded-xl">
                        <form class="max-w-sm">
                            <label for="courier" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ekspedisi <span class="text-xs text-gray-500 bg-gray-300 rounded-full px-2 py-1">{{ Auth::user()->city_id == null ? 'isi alamat terlebih dahulu' : '' }}</span></label>
                            <select id="courier" name="courier" {{ Auth::user()->city_id == null ? 'disabled' : '' }} class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">-- Pilih Ekspedisi --</option>
                                <option value="jne">JNE</option>
                                <option value="pos">POS</option>
                                <option value="tiki">Tiki</option>
                            </select>
                        </form>
                        <form class="max-w-sm mt-2">
                            <label for="service" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Pengiriman</label>
                            <select id="service" name="service" {{ Auth::user()->city_id == null ? 'disabled' : '' }} class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </select>
                        </form>
                        <div class="flex items-center justify-between px-2 pt-3">
                            <div class="font-bold text-gray-500">Ongkos Kirim</div>
                            <div class="font-medium">Rp <span id="cost-details" class="ongkir">0</span></div>
                        </div>
                    </div>

                    <form id="form-payment" class="container p-2 bg-white border-2 border-gray-100 rounded-lg">
                        {{-- @csrf --}}
                        <h1 class="mb-3 font-extrabold text-gray-600">Ringkasan Belanja</h1>
                        <div>
                            <div class="flex justify-between">
                                <div class="font-medium text-gray-500">Subtotal Produk</div>
                                <div class="font-medium text-gray-500">Rp {{ $subTotalPrice }}</div>
                            </div>
                            <div class="flex justify-between">
                                <div class="font-medium text-gray-500">Ongkos Kirim</div>
                                <div class="font-medium text-gray-500" id="ongkir">0</div>
                            </div>
                            <div class="flex justify-between pt-2 mt-2 border-t border-gray-400">
                                <div class="font-semibold text-gray-500">Total Bayar</div>
                                <div class="text-2xl font-semibold text-primary">Rp<span id="totalPrice">{{ $subTotalPrice }}</span></div>
                            </div>
                        </div>
                        <input type="hidden" value="{{ $transaction_id }}" name="transaction_id" id="transaction_id">
                        <input type="hidden" value="{{ Auth::user()->address }}" name="address" id="address">
                        <input type="hidden" value="{{ Auth::user()->no_wa }}" name="phone" id="phone">
                        <input type="hidden" value="{{ $totals[$sellerName]['totalQty'] }}" name="total_qty" id="total_qty">
                        {{-- total price + ongkir --}}
                        {{-- <input type="hidden" id="totalPrice" value="{{ $subTotalPrice }}" name="total_price"> --}}
                        {{-- Belum ada data kurir --}}
                        {{-- <input type="hidden" value="JNE" name="expedition"> --}}
                        {{-- <input type="hidden" value="OKE" name="expedition_type"> --}}
                        {{-- <input type="hidden" value="9000" name="shipping_cost"> --}}
                        {{-- <input type="hidden" value="bank" name="payment_method"> --}}
                        {{-- <input type="hidden" value="pending" name="payment_status"> --}}
                        {{-- <input type="hidden" value="payment" name="order_status"> --}}
                        <button type="submit" id="pay-button" class="w-full p-2 px-5 mt-2 text-white rounded {{ Auth::user()->city_id == null ? 'bg-gray-500' : 'bg-primary' }}" {{ Auth::user()->city_id == null ? 'disabled' : '' }}>
                            Pilih Pembayaran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- footer --}}
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <section class="py-[7rem] px-[3rem]">
            <div class="grid gap-4 max-md:grid-cols-1 lg:grid-cols-3 max-lg:grid-cols-2">
                <div class="flex items-start my-4">
                    <img class="w-10" src="{{ asset('assets/location-dot-solid.svg') }}" alt="">
                    <span class="ml-4">Jl. Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nesciunt, magni
                        eligendi eum enim, dicta totam, vero dolorem illo unde fugit mollitia reiciendis quaerat culpa. Quae
                        illum nisi nihil aut.</span>
                </div>
                <div class="w-full my-4">
                </div>
                <div class="my-4">
                    <div class="flex items-center h-10 lg:pl-[5rem]">
                        <img class="w-10" src="{{ asset('assets/instagram.svg') }}" alt="">
                        <a href="https://www.instagram.com/bdc.bandungjuara/" target="_blank"
                            class="ml-4 align-middle hover:underline">@bdjbandungjuara</a>
                    </div>
                    <div class="flex items-center h-10 my-4 lg:pl-[5rem]">
                        <img class="w-10" src="{{ asset('assets/whatsapp.svg') }}" alt="">
                        <a href="whatsapp://send?phone=6281222541485" target="_blank"
                            class="ml-4 align-middle hover:underline">0812-2254-1485</a>
                    </div>
                </div>
            </div>
        </section>
        <hr class="border-black">
        <p class="text-center pb-[1rem]">&copy; 2024 BDC Bandung</p>
    </div>

    <div id="confirmModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
            <h2 class="mb-4 text-lg font-semibold">Confirm Navigation</h2>
            <p class="mb-4">Are you sure you want to leave this page? Your order is not completed yet.</p>
            <div class="flex justify-end">
                <button id="stayButton" class="px-4 py-2 mr-2 text-white bg-blue-500 rounded">Stay</button>
                <button id="leaveButton" class="px-4 py-2 text-white bg-red-500 rounded">Leave</button>
            </div>
        </div>
    </div>

    <script>
        let isModalVisible = false;

        window.addEventListener('beforeunload', function (e) {
            if (!isModalVisible) {
                e.preventDefault();
                e.returnValue = '';
            }
        });

        window.addEventListener('popstate', function (e) {
            showModal();
        });

        function showModal() {
            isModalVisible = true;
            document.getElementById('confirmModal').classList.remove('hidden');
        }

        document.getElementById('stayButton').addEventListener('click', function () {
            isModalVisible = false;
            history.pushState(null, '', location.href);
            document.getElementById('confirmModal').classList.add('hidden');
        });

        document.getElementById('leaveButton').addEventListener('click', function () {
            isModalVisible = false;
            window.history.back();
        });

        // Push state to make sure we can handle back button
        history.pushState(null, '', location.href);
    </script>

    <script>
        // $(document).ready(function() {});

        function getCourierServices() {
            var courier = $('#courier').val();
            var origin = 22;
            var destination = {{ Auth::user()->city_id }};

            /////////////////////////////////////////////////////
            //belum ada di database
            var weight = 700; // replace with actual weight in grams
            //////////////////////////////////////////////////////

            if (!courier) {
                return;
            }
            console.log(courier, origin, destination, weight);

            $.ajax({
                url: '{{ route('getCourierServices') }}',
                method: 'post',
                data: {
                    // "_token": "{{ csrf_token() }}",
                    "origin": origin,
                    "destination": destination,
                    "weight": weight,
                    "courier": courier,
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                },

                success: function(response) {
                    $('#service').empty();
                    $('#cost-details').empty();

                    $.each(response, function(index, courier) {

                        console.log(courier.code);
                        $('#form-payment').append(`<input type="hidden" value="${courier.code}" name="expedition" id="expedition">`)

                        $.each(courier.costs, function(index, cost) {
                            $('#service').append(`<option value="${cost.service}" data-cost="${cost.cost[0].value}" data-etd="${cost.cost[0].etd}">${cost.service} - ${cost.cost[0].value} IDR ( ${cost.cost[0].etd} hari)</option>`);
                        });
                    });

                    // Update cost details for the first service
                    updateCostDetails();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        function updateCostDetails() {
            var selectedService = $('#service option:selected');
            var cost = selectedService.data('cost');
            var etd = selectedService.data('etd');
            var service = selectedService.val();

            $('#cost-details').html(`${cost}`);
            $('#ongkir').html(cost);
            $('#totalPrice').html(parseInt(cost) + parseInt({{ $subTotalPrice }}));

            console.log(service);
            $('#form-payment').append(`<input type="hidden" value="${service}" name="expedition_type" id="expedition_type">`);
            console.log(cost);
            $('#form-payment').append(`<input type="hidden" value="${cost}" name="shipping_cost" id="shipping_cost">`);
            console.log(parseInt(cost) + parseInt({{ $subTotalPrice }}));
            $('#form-payment').append(`<input type="hidden" id="total_price" value="${parseInt(cost) + parseInt({{ $subTotalPrice }})}" name="total_price">`);
        }

        $('#courier').on('change', function() {
            getCourierServices();
        });

        $('#service').on('change', updateCostDetails);

        // Trigger change to populate services for the initial courier
        $('#courier').trigger('change');
    </script>

    <script>
        // const paymentButton = document.getElementById('pay-button');
        // let formData = new FormData();
        // const paymentForm = document.getElementById('payment-form');

        // paymentButton.addEventListener('click', function(event) {
        //     formData.append('payment_form', JSON.stringify(paymentForm));
        //     console.log(json_decode(formData.get('payment_form')));
        // });

        $(document).ready(function() {
            // Mengatur token CSRF untuk semua permintaan AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form-payment').on('submit', function(e) {
                e.preventDefault(); // Mencegah submit form secara default

                let inputData = {
                    transaction_id: $('#transaction_id').val(),
                    address: $('#address').val(),
                    phone: $('#phone').val(),
                    total_qty :$('#total_qty').val(),
                    expedition: $('#expedition').val(),
                    expedition_type: $('#expedition_type').val(),
                    total_price: $('#total_price').val(),
                    shipping_cost: $('#shipping_cost').val()
                };

                console.log(inputData);

                $.ajax({
                    url: '/payment', // URL endpoint controller Anda
                    type: 'POST',
                    data: inputData,
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#responseMessage').text('Snap Token: ' + response.snapToken);
                            snap.pay(response.snapToken);
                        } else {
                            $('#responseMessage').text('Failed to fetch snap token.');
                        }
                    },
                    error: function(xhr) {
                        $('#responseMessage').text('Error: ' + xhr.status + ' ' + xhr.statusText);
                    }
                });
            });
        });

    </script>

    {{-- @if (session('success')) {
        <script>
            function (response) {
                if (response.snapToken) {
                    window.snap.pay(response.snapToken);

                    $.ajax({
                        url: '{{ route('payment') }}',
                        method: 'post',
                        data: {
                            "token": response.snapToken,
                        },
                        success: function (serverResponse) {
                            // console.log(serverResponse);
                    window.snap.pay(response.snapToken);

                        },
                    });
                }
            }
        </script>
    }
    @endif --}}
</body>
</html>

{{--
address
phone
total_qty
total_price
shipping_cost
payment_method
payment_status(update)
order_status(update) --}}
