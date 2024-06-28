<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Stokbarang;
use Illuminate\Http\Request;

use function Symfony\Component\HttpKernel\Profiler\get;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cart::with('stokbarang','ksm')
        ->where('buyer_id', auth()->user()->id)
        ->get()
        ->groupBy('ksm.brand_name')
        ;

        // $carts = Cart::all();

        // dd($data);

        return view('pages.pembeli.cart', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function addToCart(Request $request, $item)
    {
        $request->validate([
            'qty' => 'required|numeric|min:1',
        ]);

        $buyer = auth()->user();
        $items = Stokbarang::find($item);
        // dd($request->qty, $buyer->id, $items->ksm);

        $cart = Cart::where('product_id', $items->id)
        ->where('buyer_id', $buyer->id)
        ->first();

        // dd($cart, $buyer->id, $items);

        if ($cart) {
            $cart->qty += $request->qty;
            $cart->total_price += $items->price * $request->qty;
            $cart->save();
        } else {
            // dd($items->id, $buyer->id, $request->qty, $items->price, $items->price * $request->qty);
            Cart::create([
                'kelola_data_ksm_id' => $items->ksm->id,
                'product_id' => $items->id,
                'buyer_id' => $buyer->id,
                'qty' => $request->qty,
                'total_price' => $items->price * $request->qty,
            ]);
        }

        return redirect()->route('catalog')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
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
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
