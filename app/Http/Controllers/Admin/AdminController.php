<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Kelola_data_ksm;
use App\Models\Kelola_data_event;
use App\Models\Stokbarang;
use App\Models\category;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('pages.admin.kelolabarang');
    }

    public function kelolabarang()
    {
        $data['items'] = Stokbarang::paginate(5);
        return view('pages.admin.barang.view', $data);
    }

    public function add_item()
    {
        $data['seller'] = auth()->user('id');
        $items = Stokbarang::max('id') ?? 0;
        $data['no_item'] = $items + 1;
        $data['category'] = category::all();
        return view('pages.admin.barang.add', $data);
    }

    public function create_item(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'category_id' => 'required',
            'seller_id' => 'required',
            'picture_product' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $imagePath = $request->file('picture_product')->store('public');
        $imagePath = str_replace('public/', '', $imagePath);

        $stokbarang = new Stokbarang();
        $stokbarang->id = $request->id;
        $stokbarang->category_id = $request->category_id;
        $stokbarang->seller_id = $request->seller_id;
        $stokbarang->picture_product = 'storage/'.$imagePath;
        $stokbarang->name = $request->name;
        $stokbarang->stock = $request->stock;
        $stokbarang->price = $request->price;
        $stokbarang->description = $request->description;
        $stokbarang->save();

        return redirect('/kelola-barang');
    }

    public function edit_item($id)
    {
        $data['item'] = Stokbarang::findOrFail($id);
        $data['category'] = category::all();
        return view('pages.admin.barang.edit', $data);
    }

    public function update_item(Request $request)
    {
        $item = $request->validate([
            'category_id' => 'required',
            'seller_id' => 'required',
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $id = $request->get('id');
        $stokbarang = Stokbarang::find($id);

        // Update data Stokbarang
        $stokbarang->update($item);

        // Periksa apakah ada file gambar yang diunggah
        if ($request->hasFile('picture_product')) {
            // Jika ada, simpan path gambar baru
            $newImagePath = $request->file('picture_product')->store('public');
            $newImagePath = str_replace('public/', '', $newImagePath);

            // Hapus gambar lama jika ada perubahan gambar
            if ($stokbarang->picture_product && $stokbarang->picture_product !== 'storage/default.jpg') {
                $oldImage = str_replace('storage/', '', $stokbarang->picture_product);
                Storage::delete('public/' . $oldImage);
            }

            // Update path gambar Stokbarang dengan yang baru
            $stokbarang->picture_product = 'storage/' . $newImagePath;
            $stokbarang->save();
        }

        return redirect('/kelola-barang');
    }

    public function delete_item($id)
    {
        Stokbarang::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function kelola_ksm()
    {
        $data['ksm1'] = Kelola_data_ksm::paginate(1, ['*'], 'ksm1');
        $data['ksm2'] = Kelola_data_ksm::paginate(1, ['*'], 'ksm2');
        return view('pages.admin.ksm.view', $data);
    }

    public function edit_ksm($id)
    {
        $data['ksm'] = Kelola_data_ksm::findOrFail($id);
        $data['category'] = category::all();
        return view('pages.admin.ksm.edit', $data);
    }

    public function update_ksm(Request $request)
    {
        $data = $request->validate([
            'business_name' => 'required',
            'owner' => 'required',
            'no_whatsapp' => 'required',
            'category_id' => 'required',
            'address' => 'required',
        ]);

        $id = $request->get('id');
        $ksm = Kelola_data_ksm::findOrFail($id);
        $ksm->update($data);

        return redirect('/kelola-ksm');
    }

    public function delete_ksm($id)
    {
        Kelola_data_ksm::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function kelola_event()
    {
        $data['events'] = Kelola_data_event::paginate(2);
        return view('pages.admin.event.view', $data);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
