<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Kelola_data_ksm;
use App\Models\Laporan_penjualan;
use App\Models\Event;
use App\Models\Picture_event;
use App\Models\Register_event;
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
        // Menghitung total pengguna berdasarkan peran "pembeli" dan hari pembuatan
        $userCountsByRoleAndDay = User::selectRaw('role, DAY(created_at) as day, COUNT(*) as total_users')
            ->groupBy('role', 'day')
            ->get();

        $items = Stokbarang::selectRaw('DAY(created_at) as day, COUNT(*) as total_items')
            ->groupBy('day')
            ->get();

        $events = Event::selectRaw('event_name, COUNT(*) as total_events')
        ->groupBy('event_name')
        ->get();

        $register_events = Register_event::selectRaw('event_id, COUNT(*) as total_register_events')
        ->groupBy('event_id')
        ->get();

        // Memformat data untuk ditampilkan di view
        $data['userData'] = $userCountsByRoleAndDay->map(function ($item) {
            return [
                'role' => $item->role,
                'day' => $item->day,
                'total_users' => $item->total_users,
            ];
        });

        $data['items'] = $items->map(function ($item) {
            return [
                'day' => $item->day,
                'total_items' => $item->total_items,
            ];
        });

        $data['events'] = $events->map(function ($item) {
            return [
                'event' => $item->event_name,
                'total_events' => $item->total_events,
            ];
        });

        $data['register_events'] = $register_events->map(function ($item) {
            return [
                'event_id' => $item->event->event_name,
                'total_register_events' => $item->total_register_events,
            ];
        });

        $data['total_users'] = User::count();

        // Mengirimkan data ke view
        return view('welcomeadmin', $data);
    }

    public function manage_items()
    {
        $data['items'] = Stokbarang::paginate(5);
        return view('pages.admin.barang.view', $data);
    }

    public function add_item()
    {
        $data['seller'] = User::whereNotNull('ksm_id')->get();
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

        $imagePath = $request->file('picture_product')->store('public/items');
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
            $newImagePath = $request->file('picture_product')->store('public/items');
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

    public function manage_ksm()
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

    public function manage_event()
    {
        $data['image_event'] = Picture_event::all();
        $data['register_event'] = Register_event::all();
        $data['events'] = Event::paginate(2);
        $data['ksm'] = Kelola_data_ksm::paginate(2);
        return view('pages.admin.event.view', $data);
    }

    public function add_event()
    {
        return view('pages.admin.event.addevent');
    }

    public function create_event(Request $request)
    {
        $request->validate([
            'event_name' => 'required',
            'event_organizer' => 'required',
            'event_date_start' => 'required',
            'event_date_end' => 'required',
            'event_poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
        ]);

        // Konversi tanggal start dan end ke timestamp terlebih dahulu
        $startTimestamp = strtotime($request->event_date_start);
        $endTimestamp = strtotime($request->event_date_end);

        $imagePath = $request->file('event_poster')->store('public/picture_event');
        $imagePath = str_replace('public/', '', $imagePath);

        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_organizer = $request->event_organizer;
        // Gunakan timestamp yang sudah dikonversi sebagai nilai tanggal
        $event->event_date_start = date('Y-d-m', $startTimestamp);
        $event->event_date_end = date('Y-d-m', $endTimestamp);
        $event->event_poster = 'storage/'.$imagePath;
        $event->description = $request->description;
        $event->save();

        return redirect('/kelola-event');
    }

    public function edit_event($id)
    {
        $data['event'] = Event::findorFail($id);
        return view('pages.admin.event.editevent', $data);
    }

    public function update_event(Request $request)
    {
        $item = $request->validate([
            'event_name' => 'required',
            'event_organizer' => 'required',
            'description' => 'required',
        ]);

        $id = $request->get('id');
        $event = Event::find($id);

        // Konversi tanggal start dan end ke timestamp terlebih dahulu
        $startTimestamp = strtotime($request->event_date_start);
        $endTimestamp = strtotime($request->event_date_end);

        // Menambahkan kolom tanggal ke dalam data yang divalidasi
        $item['event_date_start'] = date('Y-d-m', $startTimestamp);
        $item['event_date_end'] = date('Y-d-m', $endTimestamp);

        // Update data Event
        $event->update($item);

        // Periksa apakah ada file gambar yang diunggah
        if ($request->hasFile('picture_product')) {
            // Jika ada, simpan path gambar baru
            $newImagePath = $request->file('picture_product')->store('public/picture_event');
            $newImagePath = str_replace('public/', '', $newImagePath);

            // Hapus gambar lama jika ada perubahan gambar
            if ($event->picture_product && $event->picture_product !== 'storage/default.jpg') {
                $oldImage = str_replace('storage/', '', $event->event_poster);
                Storage::delete('public/' . $oldImage);
            }

            // Update path gambar event dengan yang baru
            $event->picture_product = 'storage/' . $newImagePath;
            $event->save();
        }

        return redirect('/kelola-event');
    }

    public function delete_event($id)
    {
        $event = Event::findOrFail($id);
        $oldImage = str_replace('storage/', '', $event->event_poster);
        Storage::delete('public/' . $oldImage);
        $event->delete();
        return redirect()->back();
    }

    public function event_document()
    {
        return view('pages.admin.event.editeventdoc');
    }

    public function addOrUpdate(Request $request)
    {
        $id = $request->input('id');

        // Cek apakah data dengan ID tersebut sudah ada dalam tabel
        $picture_event = Picture_event::find($id);

        // Jika data tidak ditemukan, berarti ini adalah proses tambah
        if (!$picture_event) {
            return $this->create_document($request);
        } else {
            // Jika data ditemukan, berarti ini adalah proses edit
            return $this->update_document($request, $picture_event);
        }
    }

    public function create_document(Request $request)
    {
        // Lakukan validasi input disini jika diperlukan

        // Simpan data ke dalam tabel
        $picture_event = new Picture_event();

        // Lakukan penyimpanan file untuk setiap dokumen yang diunggah
        $picture_event->id = $request->id;
        if ($request->hasFile('document_1')) {
            $imagePath = $request->file('document_1')->store('public/poster_event');
            $picture_event->document_1 = 'storage/' . str_replace('public/', '', $imagePath);
        }
        if ($request->hasFile('document_2')) {
            $imagePath = $request->file('document_2')->store('public/poster_event');
            $picture_event->document_2 = 'storage/' . str_replace('public/', '', $imagePath);
        }
        if ($request->hasFile('document_3')) {
            $imagePath = $request->file('document_3')->store('public/poster_event');
            $picture_event->document_3 = 'storage/' . str_replace('public/', '', $imagePath);
        }
        if ($request->hasFile('document_4')) {
            $imagePath = $request->file('document_4')->store('public/poster_event');
            $picture_event->document_4 = 'storage/' . str_replace('public/', '', $imagePath);
        }
        if ($request->hasFile('document_5')) {
            $imagePath = $request->file('document_5')->store('public/poster_event');
            $picture_event->document_5 = 'storage/' . str_replace('public/', '', $imagePath);
        }

        $picture_event->save();

        // Redirect atau kembalikan respon sesuai kebutuhan aplikasi Anda
        return redirect('/kelola-event');
    }

    public function update_document(Request $request, Picture_event $picture_event)
    {
        // Lakukan validasi input disini jika diperlukan

        // Hapus file lama sebelum menyimpan file yang baru
        $this->deleteOldFiles($picture_event);

        // Perbarui data yang sudah ada dalam tabel
        if ($request->hasFile('document_1')) {
            $imagePath = $request->file('document_1')->store('public/poster_event');
            $picture_event->document_1 = 'storage/' . str_replace('public/', '', $imagePath);
        }
        if ($request->hasFile('document_2')) {
            $imagePath = $request->file('document_2')->store('public/poster_event');
            $picture_event->document_2 = 'storage/' . str_replace('public/', '', $imagePath);
        }
        if ($request->hasFile('document_3')) {
            $imagePath = $request->file('document_3')->store('public/poster_event');
            $picture_event->document_3 = 'storage/' . str_replace('public/', '', $imagePath);
        }
        if ($request->hasFile('document_4')) {
            $imagePath = $request->file('document_4')->store('public/poster_event');
            $picture_event->document_4 = 'storage/' . str_replace('public/', '', $imagePath);
        }
        if ($request->hasFile('document_5')) {
            $imagePath = $request->file('document_5')->store('public/poster_event');
            $picture_event->document_5 = 'storage/' . str_replace('public/', '', $imagePath);
        }

        $picture_event->save();

        // Redirect atau kembalikan respon sesuai kebutuhan aplikasi Anda
        return redirect('/kelola-event');
    }

    private function deleteOldFiles(Picture_event $picture_event)
    {
        // Inisialisasi array untuk menyimpan path file lama yang perlu dihapus
        $filesToDelete = [];

        // Periksa setiap dokumen dan tambahkan file lama ke dalam array jika dokumen baru diunggah
        if ($picture_event->document_1 && $picture_event->document_1 !== 'storage/default.jpg' && request()->hasFile('document_1')) {
            $filesToDelete[] = 'public/' . str_replace('storage/', '', $picture_event->document_1);
        }
        if ($picture_event->document_2 && $picture_event->document_2 !== 'storage/default.jpg' && request()->hasFile('document_2')) {
            $filesToDelete[] = 'public/' . str_replace('storage/', '', $picture_event->document_2);
        }
        if ($picture_event->document_3 && $picture_event->document_3 !== 'storage/default.jpg' && request()->hasFile('document_3')) {
            $filesToDelete[] = 'public/' . str_replace('storage/', '', $picture_event->document_3);
        }
        if ($picture_event->document_4 && $picture_event->document_4 !== 'storage/default.jpg' && request()->hasFile('document_4')) {
            $filesToDelete[] = 'public/' . str_replace('storage/', '', $picture_event->document_4);
        }
        if ($picture_event->document_5 && $picture_event->document_5 !== 'storage/default.jpg' && request()->hasFile('document_5')) {
            $filesToDelete[] = 'public/' . str_replace('storage/', '', $picture_event->document_5);
        }

        // Hapus file-file yang perlu dihapus
        if (!empty($filesToDelete)) {
            Storage::delete($filesToDelete);
        }
    }



    public function manage_sales()
    {
        $data['penjualan'] = Laporan_penjualan::all();
        return view('pages.admin.sale.view', $data);
    }

    public function manage_finance()
    {
        return view('pages.admin.finance.view');
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
