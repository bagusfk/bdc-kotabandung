<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Kelola_data_ksm;
use App\Models\Stokbarang;
use App\Models\Register_event;
use App\Models\Event;
use App\Models\Laporan_kegiatan_event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Product_pictures;

class KelolaDataKsmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        // dd($user_id);
        $ksm = Kelola_data_ksm::where('user_id', $user_id)->with('item')->get();
        // $ksm = Transaction::where('buyer_id', $buyer_id)->with('orders')->get();
        $category = category::all();

        // dd($ksm);

        // $product = Stokbarang::with('ksm')->get();

        // dd($product);
        return view('pages.ksm.dashboard', compact('ksm', 'category'));
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
    public function show($id)
    {
        // dd($id);
        $data['brand'] = Kelola_data_ksm::findOrFail($id);
        // dd($data['brand']);
        $data['products'] = Stokbarang::where('kelola_data_ksm_id', $id)->get();
        // dd($data['products']);
        $data['brand_id'] = $id;

        $data['events'] = $data['brand']->register_event()->get();
        // dd($data['events']);

        return view('pages.ksm.brand-products', $data);
    }

    public function viewPdf($path)
    {
        $path = decrypt($path);
        // dd($path);
        // $filePath = $path;

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . basename($path) . '"'
        ]);
    }

    public function showDetail(Stokbarang $id)
    {
        // dd($id);
        $product = $id;
        // dd($product);
        return view('pages.ksm.product-detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelola_data_ksm $kelola_data_ksm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelola_data_ksm $kelola_data_ksm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelola_data_ksm $kelola_data_ksm)
    {
        //
    }

    public function add_item($id)
    {
        $brand = Kelola_data_ksm::findOrFail($id);
        // dd($brand);
        return view('pages.ksm.add-product', compact('brand'));
    }

    public function create_item(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'category_id' => 'required',
            // 'ksm_id' => 'required',
            'picture_product.*' => 'required | image | mimes:jpeg,png,jpg | max:2048', // Validasi banyak gambar
            'name' => 'required',
            'weight' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        // dd($req);

        $stokbarang = new Stokbarang();
        // $stokbarang->id = $request->id;
        $stokbarang->category_id = $request->category_id;
        $stokbarang->kelola_data_ksm_id = $request->id;
        $stokbarang->name = $request->name;
        $stokbarang->weight = $request->weight;
        $stokbarang->stock = $request->stock;
        if ($request->category_id == 3) {
            $request->validate([
                'expired' => 'required'
            ]);
            $expired = $request->expired;

            $stokbarang->expired = $expired;
        }
        $stokbarang->price = $request->price;
        $stokbarang->description = $request->description;
        $stokbarang->save();

        if ($request->hasFile('picture_product')) {
            foreach ($request->file('picture_product') as $image) {
                $imagePath = $image->store('public/items');
                $imagePath = str_replace('public/', '', $imagePath);

                $productPicture = new Product_pictures();
                $productPicture->product_id = $stokbarang->id;
                $productPicture->product_picture = 'storage/' . $imagePath;
                $productPicture->save();
            }
        }

        $ksm = Kelola_data_ksm::findOrFail($request->id);
        if ($ksm->business_entity == 'reseller') {
            $ksm->cluster = 'D';
        } else {
            $ksm->cluster = 'C';
            if ($ksm->logo_image != null && $ksm->nib_document != null && $ksm->address != null && $ksm->nib != null) {
                $ksm->cluster = 'B';
                if ($ksm->permission_letter != null) {
                    $ksm->cluster = 'A';
                }
            }
        }
        $ksm->save();

        return redirect('/dashboard-ksm/brand-products/' . $request->id);
    }

    public function edit_item($id)
    {
        $data['stokbarang'] = Stokbarang::findOrFail($id);
        $data['ksm'] = $data['stokbarang']->ksm;
        $data['category_id'] = $data['stokbarang']->category_id;
        // dd($data);
        return view('pages.ksm.edit-product', $data);
    }

    public function update_item(Request $request)
    {
        // dd($request);
        $id = $request->get('id');
        $stokbarang = Stokbarang::find($id);

        // Validate the request data
        $item = $request->validate([
            'category_id' => 'required',
            'kelola_data_ksm_id' => 'required',
            'name' => 'required',
            'stock' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        if ($request->category_id == 3) {
            $request->validate([
                'expired' => 'required'
            ]);
            $expired = $request->expired;
        } else {
            $expired = "-";
        }

        // Update data Stokbarang
        $stokbarang->update($item);
        $stokbarang->update([
            'expired' => $expired
        ]);

        $removedImages = explode(',', $request->input('removed_images'));
        if (!empty($removedImages)) {
            foreach ($removedImages as $imageId) {
                $productPicture = Product_pictures::find($imageId);
                if ($productPicture) {
                    // Hapus gambar dari storage
                    $oldImage = str_replace('storage/', 'public/', $productPicture->product_picture);
                    Storage::delete($oldImage);

                    // Hapus dari database
                    $productPicture->delete();
                }
            }
        }

        // Handle new uploaded images
        if ($request->hasFile('picture_product')) {
            foreach ($request->file('picture_product') as $file) {
                $imagePath = $file->store('public/items');
                $imagePath = str_replace('public/', 'storage/', $imagePath);
                Product_pictures::create([
                    'product_id' => $id,
                    'product_picture' => $imagePath,
                ]);
            }
        }

        return redirect('/dashboard-ksm/brand-products/' . $request->brand);;
    }

    public function delete_item($id)
    {
        Stokbarang::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function laporan_event(Request $request, Register_event $id)
    {
        $request->validate([
            'salesResult' => 'required',
            'stock_sold' => 'required',
            'starting_price' => 'required',
            'price_at_event' => 'required'
        ]);
        // dd($request->request, $id);
        if ($request->laporanId != null) {
            $laporan = Laporan_kegiatan_event::findOrFail($request->laporanId);
            $laporan->update([
                'sales_result' => $request->salesResult,
                'stock_sold' => $request->stock_sold,
                'starting_price' => $request->starting_price,
                'price_at_event' => $request->price_at_event,
            ]);
            return redirect()->back()->with('berhasil', 'Laporan berhasil diubah');
        } else {
            Laporan_kegiatan_event::create([
                'regist_id' => $id->id,
                'sales_result' => $request->salesResult,
                'stock_sold' => $request->stock_sold,
                'starting_price' => $request->starting_price,
                'price_at_event' => $request->price_at_event,
            ]);
            $id->report = 'yes';
            $id->save();
            return redirect()->back()->with('berhasil', 'Laporan berhasil dibuat');
        }
    }
}
