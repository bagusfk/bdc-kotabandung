<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key')}}"></script>
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
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
            <div class="mb-4 text-3xl font-semibold">sukses</div>
        </div>
    </div>
</body>
</html>
