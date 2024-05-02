<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\Stokbarang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'selected_products.*' => 'required|exists:stokbarangs,id',
            'qty.*' => 'required|integer|min:1'
        ]);

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

        // dd($transaction);
        $totalPrice = 0;
        // Simpan data yang diterima dari form
        foreach ($selectedProducts as $index => $productId) {
            // dd($productId);
            $quantity = $quantities[$productId];
            $items = Stokbarang::find($productId);

            // Lakukan sesuatu dengan $productId dan $quantity, seperti menyimpan ke dalam database
            $transaction->orders()->create([
                'product_id' => $productId,
                'qty' => $quantity,
                'price' => $items->price,
                'total_price' => $quantity * $items->price,
            ]);

            // Hitung total harga dengan menambahkan total harga dari setiap produk
            $totalPrice += $quantity * $items->price;
        }

        // dd($transaction, $totalPrice);

        $order = Order::with('transaction')
        ->where('transaction_id', $transaction->id)
        ->get()
        ->groupBy(function($items) {
            return $items->item->user->ksm->business_name.'_'.$items->transaction->id;
        });

        return view('pages.pembeli.transaction.index' , compact('totalPrice', 'order'));
    }

    public function myOrder()
    {
        return view('pages.pembeli.my-order');
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
