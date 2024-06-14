<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\Stokbarang;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Midtrans\Config;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function checkout(Request $request)
    {
        $req = $request->validate([
                    'selected_products.*' => 'required|exists:stokbarangs,id',
                    'qty.*' => 'required|integer|min:1'
                ]);

        if (!$req) {
            return redirect()->route('my-order');
        }
        // dd($request->all());

        $selectedProducts = $request->input('selected_products', []);
        $quantities = $request->input('qty', []);

        $buyer_id = Auth::user()->id;
        // Membuat invoice
        $invoice = 'INV-'.uniqid().'-'.time().$buyer_id;
        // dd($invoice);

        $transaction = Transaction::create([
            'buyer_id' => $buyer_id,
            'invoice' => $invoice,
        ]);

        // dd($selectedProducts);

        $subTotalPrice = 0;
        // Simpan data yang diterima dari form
        foreach ($selectedProducts as $productId) {
            // dd($productId);
            $quantity = $quantities[$productId];
            $items = Stokbarang::find($productId);

            // dd($items);
            // Lakukan sesuatu dengan $productId dan $quantity, seperti menyimpan ke dalam database
            $transaction->orders()->create([
                'product_id' => $items->id,
                'qty' => $quantity,
                'price' => $items->price,
                'total_price' => $quantity * $items->price,
            ]);

            // Hitung total harga dengan menambahkan total harga dari setiap produk
            $subTotalPrice += $quantity * $items->price;
        }

        // dd($transaction, $totalPrice);

        $order = Order::with('item','transaction')
        ->where('transaction_id', $transaction->id)
        ->get()
        ->groupBy(function($item) {
            return $item->item->user->ksm->business_name;
        });

        // Menghitung total harga dari produk di setiap toko
        // $totalPrices = [];
        // foreach ($order as $sellerName => $products) {
        //     $totalPrice = $products->sum('price');
        //     $totalPrices[$sellerName] = $totalPrice;
        // }
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

        return view('pages.pembeli.transaction.index' , compact('subTotalPrice', 'order', 'totals', 'transaction_id'));
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
        $req = 'origin='.$origin.'&destination='.$destination.'&weight='.$weight.'&courier=' . $courier;

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
                "key:".config('services.rajaongkir.api_key')
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        // dd(json_decode($response,true)['rajaongkir']['results']);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response,true)['rajaongkir']['results'];
            return $data;
        }

        // dd($response->json());

    }

    public function payment(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'transaction_id' =>'required',
            'address' =>'required',
            'phone' =>'required',
            'total_qty' =>'required',
            'expedition' => 'required',
            'expedition_type' => 'required',
            'total_price' =>'required',
            'shipping_cost' =>'required'
        ]);

        $user = Auth::user();

        //data yang belum ada di database
        $desa = 'cicukur';
        $kec = 'cikarang barat';

        $address = $request->input('address').', desa '.$desa.', kec.'.$kec.', '.$user->cities->type.' '.$user->cities->city_name.', '.$user->cities->province;

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

        $params =[
            'transaction_details'=>[
                'order_id' => uniqid(),
                'gross_amount' => $transaction->total_price,
            ]
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $response = response()->json([ 'status' => 'success', 'snapToken' => $snapToken ]);

        // return view('pages.pembeli.transaction.payment', compact('snapToken'));
        return $response;
    }

    public function finishPayment()
    {
        return view('pages.pembeli.transaction.finish-payment');
    }

    public function myOrder()
    {
        $buyer_id = Auth::user()->id;

        $transactions = Transaction::where('buyer_id', $buyer_id)->with('orders')->get();
        // dd($transaction);
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
