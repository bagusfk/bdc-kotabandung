<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\Stokbarang;
use App\Models\Cart;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Midtrans\Config;
use GuzzleHttp\Client;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function checkout(Request $request)
    {
        // dd($request);
        $req = $request->validate([
            'selected_carts.*' => 'required',
            'qty.*' => 'required|integer|min:1'
        ]);

        // dd($req);
        if ($request->selected_carts === null) {
            return redirect()->route('cart');
        }

        // if (Auth::user()->city_id == null) {
        //     return redirect()->route('profile.edit');
        // }

        $selectedCarts = $request->input('selected_carts', []);
        $quantities = $request->input('qty', []);

        $buyer_id = Auth::user()->id;
        // Membuat invoice
        $invoice = 'INV-' . uniqid() . '-' . time() . $buyer_id;
        // dd($invoice);

        $transaction = Transaction::create([
            'buyer_id' => $buyer_id,
            'invoice' => $invoice,
        ]);

        // dd($selectedCarts);

        $subTotalPrice = 0;
        $totalWeight = 0;
        // Simpan data yang diterima dari form
        foreach ($selectedCarts as $cartId) {
            // dd($cartId);
            $quantity = $quantities[$cartId];
            $items = Cart::find($cartId);

            // dd($items->product_id, $quantity, $items->stokbarang->price, $quantity * $items->stokbarang->price);
            // Lakukan sesuatu dengan $productId dan $quantity, seperti menyimpan ke dalam database
            $transaction->orders()->create([
                'product_id' => $items->product_id,
                'qty' => $quantity,
                'price' => $items->stokbarang->price,
                'total_price' => $quantity * $items->stokbarang->price,
            ]);

            // Hitung total harga dengan menambahkan total harga dari setiap produk
            $subTotalPrice += $quantity * $items->stokbarang->price;
            // Hitung total berat dengan menambahkan total berat dari setiap produk
            $totalWeight += $items->stokbarang->weight * $quantity;

            // Menghapus item cart yang sudah dibeli
            // Cart::destroy($cartId);
        }

        // dd($subTotalPrice);
        $transaction->update([
            'sub_total_price' => $subTotalPrice,
            'total_weight' => $totalWeight,
        ]);

        $order = Order::with('item', 'transaction')
            ->where('transaction_id', $transaction->id)
            ->get()
            ->groupBy(function ($item) {
                return $item->item->ksm->brand_name;
            });

        // Menghitung total harga dari produk di setiap toko
        $totalPrices = [];
        foreach ($order as $sellerName => $products) {
            // $totalPrice = $products->sum('price') * $products->sum('qty');
            $totalPrice = $products->sum(function ($products) {
                return $products->price * $products->qty;
            });
            // dd($products);
            // foreach ($products as $product) {
            //     $totalPrice = $products[0]->price * $products[0]->qty;
            // }
            $totalPrices[$sellerName] = $totalPrice;
            // dd($totalPrice);
        }
        // Menghitung total harga dan total qty dari produk di setiap toko
        $totals = [];
        foreach ($order as $sellerName => $orders) {
            $totalPrice = $orders->sum(function ($order) {
                return $order->item->price;
            });
            $totalQty = $orders->sum('qty');
            $totals[$sellerName] = ['totalPrice' => $totalPrice, 'totalQty' => $totalQty];
        }

        $transaction_id = $transaction->id;

        // Menghapus item cart yang sudah dibeli
        foreach ($selectedCarts as $cartId) {
            // dd($cartId);
            $items = Cart::find($cartId);
            if ($items) {
                $items->delete();
            }
        }

        return view('pages.pembeli.transaction.index', compact('subTotalPrice', 'order', 'totals', 'transaction_id', 'totalPrices', 'totalWeight'));
    }

    public function continueCheckout($id)
    {
        $transaction = Transaction::find($id);
        // dd($transaction);
        $subTotalPrice = $transaction->sub_total_price;

        $totalWeight = $transaction->total_weight;

        $transaction_id = $transaction->id;

        $order = Order::with('item', 'transaction')
            ->where('transaction_id', $transaction->id)
            ->get()
            ->groupBy(function ($item) {
                return $item->item->ksm->brand_name;
            });

        $totalPrices = [];
        foreach ($order as $sellerName => $products) {
            // $totalPrice = $products->sum('price') * $products->sum('qty');
            $totalPrice = $products->sum(function ($products) {
                return $products->price * $products->qty;
            });
            // dd($products);
            // foreach ($products as $product) {
            //     $totalPrice = $products[0]->price * $products[0]->qty;
            // }
            $totalPrices[$sellerName] = $totalPrice;
            // dd($totalPrice);
        }
        // Menghitung total harga dan total qty dari produk di setiap toko
        $totals = [];
        foreach ($order as $sellerName => $orders) {
            $totalPrice = $orders->sum(function ($order) {
                return $order->item->price;
            });
            $totalQty = $orders->sum('qty');
            $totals[$sellerName] = ['totalPrice' => $totalPrice, 'totalQty' => $totalQty];
        }

        return view('pages.pembeli.transaction.index', compact('subTotalPrice', 'order', 'totals', 'transaction_id', 'totalPrices', 'totalWeight'));
    }

    function getCourierServices(Request $request)
    {
        $origin = 22;
        $destination = $request->input('destination');
        $weight = $request->input('weight');
        $courier = $request->input('courier');

        // dd($origin, $destination, $weight, $courier);

        // $response = Http::withHeaders([
        //     'key' => config('services.rajaongkir.api_key'),
        //     'Content-Type' => 'application/x-www-form-urlencoded'
        // ])->post('https://api.rajaongkir.com/starter/cost', [
        //     // 'origin' => $origin,
        //     'origin' => $request->input('origin'),
        //     'destination' => $request->input('destination'),
        //     'weight' => $request->input('weight'),
        //     'courier' => $request->input('courier')
        // ]);

        $req = "origin=501&destination=114&weight=1700&courier=jne";
        $req = 'origin=' . $origin . '&destination=' . $destination . '&weight=' . $weight . '&courier=' . $courier;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $req,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key:" . config('services.rajaongkir.api_key')
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        // dd(json_decode($response,true)['rajaongkir']['results']);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true)['rajaongkir']['results'];
            return $data;
        }

        // dd($response->json());

    }

    public function payment(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'transaction_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'total_qty' => 'required',
            'expedition' => 'required',
            'expedition_type' => 'required',
            'total_price' => 'required',
            'shipping_cost' => 'required'
        ]);

        // dd($request->total_price);

        $user = Auth::user();

        //data yang belum ada di database
        $desa = 'cicukur';
        $kec = 'cikarang barat';

        $address = $request->input('address') . ', desa ' . $desa . ', kec.' . $kec . ', ' . $user->cities->type . ' ' . $user->cities->city_name . ', ' . $user->cities->province;

        // dd($address);

        $transaction = Transaction::find($request->transaction_id);
        $transaction->update([
            'address' => $address,
            'phone' => $request->phone,
            'total_qty' => $request->total_qty,
            'expedition' => $request->expedition,
            'expedition_type' => $request->expedition_type,
            'total_price' => $request->total_price,
            'shipping_cost' => $request->shipping_cost,
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $transaction->total_price,
            ]
        ];

        // dd($params['transaction_details']['order_id']);
        $transaction->update([
            'order_id' => $params['transaction_details']['order_id'],
        ]);

        $snapToken = \Midtrans\Snap::getSnapToken($params);


        $response = response()->json(['status' => 'success', 'snapToken' => $snapToken]);

        // return view('pages.pembeli.transaction.payment', compact('snapToken'));
        return $response;
    }

    public function finishPayment(Request $request)
    {
        // dd($request);
        // dd($request->query('order_id'));
        $order_id = $request->query('order_id');
        // return response($order_id);
        $transaction = Transaction::where('order_id', $order_id);

        // $client = new Client();

        // $response = $client->request('GET', "https://api.sandbox.midtrans.com/v2/{$order_id}/status", [
        //     'headers' => [
        //         'Authorization' => 'Basic '. base64_encode(config('services.midtrans.server_key').':'),
        //         'accept' => 'application/json',
        //     ],
        //   ]);
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(config('services.midtrans.server_key') . ':'),
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ])->get("https://api.sandbox.midtrans.com/v2/{$order_id}/status");

        $payment_type = $response->json();
        $va = is_array($payment_type['va_numbers'] ?? null) ? $payment_type['va_numbers'] : [];
        //   dd($payment_methode);
        $transaction->update([
            'payment_type' => $payment_type['payment_type'],
            'payment_status' => 'paid',
        ]);
        return view('pages.pembeli.transaction.finish-payment');

        // return response()->json([
        //             'payment_method' => $payment_methode['payment_type'],
        //             'va' => $va[0]['va_number'] ?? null,
        //         ]);
    }

    public function myOrder()
    {
        $buyer_id = Auth::user()->id;

        // $order = Order::with('item','transaction')
        // ->where('transaction.buyer_id', $buyer_id)
        // ->get();

        // dd($order);

        $transactions = Transaction::where('buyer_id', $buyer_id)
            // ->with('orders')
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($transactions->first()->orders);

        // $transactions = $transactions->map(function ($transaction) {
        //     $totalItems = $transaction->orders->sum('qty');
        //     $totalPrice = $transaction->orders->sum('price');

        //     $transaction->totalItems = $totalItems;
        //     $transaction->totalPrice = $totalPrice;

        //     return $transaction;
        // });
        // foreach($transactions as $transaction) {
        //     dd($transaction->orders->sum('price'));
        // }

        return view('pages.pembeli.my-order', compact('transactions'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
