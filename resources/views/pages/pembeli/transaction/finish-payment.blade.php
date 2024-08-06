<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key')}}"></script>
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script type='text/javascript' >
        // window.history.back(); function noBack(){}
        window.history.forward(); function noBack(){}
        // window.history.go(); function noBack(){}
        window.onload = function() {
            // Function to push a new state to history
            function disableBack() {
                history.pushState(null, null, location.href);
            }

            // Push the initial state
            disableBack();

            // Add an event listener for popstate event
            window.onpopstate = function(event) {
                disableBack();
            };

            // Add an event listener for beforeunload event
            window.onbeforeunload = function() {
                return "Are you sure you want to leave this page?";
            };
        };
    </script>
</head>
<body class="overflow-y-auto scroll">
    {{-- navbar --}}
    {{-- <div class="sticky top-0 z-50 bg-white shadow-md">
        <div class="py-4 mx-auto max-w-7xl">
            <div class="text-2xl font-bold ">
                Bussiness Development Center
            </div>
        </div>
    </div> --}}

    {{-- content --}}
    <div class="bg-gray-50">
        <div class="py-12 mx-auto max-w-7xl">
            <div class="mb-4 text-3xl font-semibold">
                <div class="flex flex-col items-center max-w-lg gap-8 px-4 py-4 mx-auto bg-white shadow-xl rounded-xl">
                    <div class="w-[240px] h-[240px] mt-4">
                        {{-- <svg class="w-full h-full text-lime-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                        </svg> --}}
                        {{-- <svg class="w-full h-full text-lime-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"/>
                        </svg> --}}
                        <svg class="w-full h-full text-lime-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                          </svg>

                    </div>
                    <div class="font-bold text-center text-gray-700">Pembayaran Berhasil!</div>
                    <div class="text-sm font-normal text-center text-gray-600">Terimakasih telah melakukan transaksi di BDC kota bandung, Sekarang anda bisa melihat riwayat pesanan di menu Pesanan Saya. <br>Terimakasih!</div>
                    <a href="/" class="w-full px-4 py-2 text-lg text-center text-white rounded-lg bg-lime-500">Selesai</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
