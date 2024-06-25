<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Carbon\Carbon;
use DataTables;
use App\Models\Kelola_data_ksm;
use App\Models\Laporan_kegiatan_event;
use App\Models\Beli;
use App\Models\Neraca;
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
        $userCountsByRoleAndDay = User::selectRaw('role, DATE_FORMAT(created_at, "%Y-%m-%d") as day, COUNT(*) as total_users')
            ->groupBy('role', 'day')
            ->get();

        $items = Stokbarang::selectRaw('DATE_FORMAT(created_at, "%Y-%m-%d") as day, COUNT(*) as total_items')
            ->groupBy('day')
            ->get();

        $events = Event::selectRaw('event_name, COUNT(*) as total_events')
            ->groupBy('event_name')
            ->get();

        $register_events = Register_event::selectRaw('event_id, COUNT(*) as total_register_events')
            ->with('event')
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
                'event_id' => $item->event->event_name ?? 'Unknown Event',
                'total_register_events' => $item->total_register_events,
            ];
        });

        $data['total_users'] = User::count();

        // Mengirimkan data ke view
        return view('welcomeadmin', $data);
    }


    public function manage_items()
    {
        $data['items'] = Stokbarang::all();
        return view('pages.admin.barang.view', $data);
    }

    public function add_item()
    {
        $data['ksm'] = Kelola_data_ksm::all();
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
            'ksm_id' => 'required',
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
        $stokbarang->ksm_id = $request->ksm_id;
        $stokbarang->picture_product = 'storage/' . $imagePath;
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
        $data['ksm'] = Kelola_data_ksm::all();
        $data['category'] = category::all();
        return view('pages.admin.barang.edit', $data);
    }

    public function update_item(Request $request)
    {

        $id = $request->get('id');
        $stokbarang = Stokbarang::find($id);

        $item = $request->validate([
            'category_id' => 'required',
            'ksm_id' => 'required',
            'name' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

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

    public function report_item_json()
    {
        $productsByCategory = $this->getLarisProductsByCategory();
        return response()->json($productsByCategory);
    }

    public function report_item()
    {
        $productsByCategory = $this->getLarisProductsByCategory();
        return view('pages.admin.barang.laporan.view', compact('productsByCategory'));
    }

    private function getLarisProductsByCategory()
    {
        $currentMonth = now()->month;
        $currentYear = now()->year;

        // Menggabungkan order, transaction, dan stokbarang untuk mendapatkan total penjualan per produk per kategori untuk bulan ini
        $totalSales = DB::table('orders')
            ->join('transactions', 'orders.transaction_id', '=', 'transactions.id')
            ->join('stokbarangs', 'orders.product_id', '=', 'stokbarangs.id')
            ->whereMonth('transactions.created_at', $currentMonth)
            ->whereYear('transactions.created_at', $currentYear)
            ->select(
                'stokbarangs.category_id',
                'stokbarangs.name',
                DB::raw('SUM(transactions.total_qty) as total_sold')
            )
            ->groupBy('stokbarangs.category_id', 'stokbarangs.name')
            ->orderBy('stokbarangs.category_id')
            ->get();

        return $totalSales;
    }



    public function manage_ksm()
    {
        $today = Carbon::today();
        $data['ksm1'] = Kelola_data_ksm::whereDate('created_at', $today)->get();
        $data['ksm2'] = Kelola_data_ksm::all();
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
            'owner' => 'required',
            'brand_name' => 'required',
            'category_id' => 'required',
            'no_wa' => 'required',
            'link_ig' => 'nullable',
            'nib' => 'nullable',
            'business_entity' => 'nullable',
            'address' => 'required',
            'product_sales_address' => 'nullable',
            'business_description' => 'required',
        ]);

        $id = $request->get('ksm_id');
        $ksm = Kelola_data_ksm::findOrFail($id);

        DB::transaction(function () use ($ksm, $data, $request) {
            $ksm->update($data);

            // Handle file uploads
            $this->handleFileUpload($request, 'owner_picture', $ksm, 'owner_picture');
            $this->handleFileUpload($request, 'logo_image', $ksm, 'logo_image');
            $this->handleFileUpload($request, 'nib_document', $ksm, 'nib_document');
            $this->handleFileUpload($request, 'permission_letter', $ksm, 'permission_letter');
        });

        return redirect('/kelola-ksm');
    }

    private function handleFileUpload(Request $request, $fileInputName, $ksm, $dbColumnName)
    {
        if ($request->hasFile($fileInputName)) {
            $newImagePath = $request->file($fileInputName)->store("public/$fileInputName");
            $newImagePath = str_replace('public/', 'storage/', $newImagePath);

            // Remove old image if exists and not default
            if ($ksm->$dbColumnName && $ksm->$dbColumnName !== 'storage/default.jpg') {
                $oldImage = str_replace('storage/', 'public/', $ksm->$dbColumnName);
                Storage::delete($oldImage);
            }

            // Update the ksm with the new image path
            $ksm->$dbColumnName = $newImagePath;
            $ksm->save();
        }
    }

    public function delete_ksm($id)
    {
        $user = User::find($id);
        $user->role = 'pembeli';
        $user->ksm_id = null;

        // Simpan perubahan
        $user->save();

        $kelolaDataKsm = Kelola_data_ksm::where('id', $id)->first();
        if ($kelolaDataKsm) {
            $kelolaDataKsm->delete();
        }

        return redirect()->back();
    }

    public function list_event()
    {
        $data['register_event'] = Register_event::paginate(3, ['*'], 'register_event');
        $data['events'] = Event::paginate(3, ['*'], 'events');
        $data['ksm'] = Kelola_data_ksm::paginate(3, ['*'], 'ksm');
        return view('pages.admin.event.list.view', $data);
    }

    public function daftar_event()
    {
        $data['register_event'] = Register_event::paginate(3, ['*'], 'register_event');

        return view('pages.admin.event.daftar.view', $data);
    }

    public function laporan_event()
    {
        $data['laporan'] = Laporan_kegiatan_event::all();

        return view('pages.admin.event.laporan.view', $data);
    }

    public function dokumentasi_event()
    {
        $data['image_event'] = Picture_event::all();

        return view('pages.admin.event.dokumentasi.view', $data);
    }

    public function tambah_laporan_event()
    {
        $participants = Register_event::where('report', 'no')->with('ksm:id,owner,brand_name')
            ->get()
            ->groupBy('event_id')
            ->map(function ($group) {
                return $group->map(function ($participant) {
                    return [
                        'id' => $participant->id,
                        'ksm' => $participant->ksm,
                    ];
                });
            });

        // dd($participants);

        $events = Event::all(); // Assuming you need event data for the select options

        return view('pages.admin.event.laporan.add', [
            'participantsByEvent' => $participants,
            'events' => $events
        ]);
    }

    public function create_laporan_event(Request $request)
    {

        $request->validate([
            "regist_id" => 'required',
            "sales_result" => 'required',
        ]);

        $registerEvent = Register_event::findOrFail($request->regist_id);
        $registerEvent->report = 'yes';
        $registerEvent->save();


        $laporan = new Laporan_kegiatan_event();
        $laporan->regist_id = $request->regist_id;
        $laporan->sales_result = $request->sales_result;
        $laporan->save();


        return redirect('/laporan-event');
    }

    public function agree($id)
    {
        $data = Register_event::find($id);
        if (!$data) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        $data->status_validation = 'agree';
        $data->save();

        return response()->json(['message' => 'Status updated successfully'], 200);
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
        $event->event_poster = 'storage/' . $imagePath;
        $event->description = $request->description;
        $event->save();

        return redirect('/list-event');
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

        return redirect('/list-event');
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
        return redirect('/dokumentasi-event');
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
        return redirect('/dokumentasi-event');
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

        $productsByCategory = $this->getLarisProductsByCategory();
        $data['penjualan'] = Laporan_penjualan::all();
        $data['penjual'] = Stokbarang::all();
        $data['pembeli'] = Beli::all();

        // Inisialisasi array untuk labels dan data
        $labels = [];
        $qty = [];
        $ksm = [];

        $ksmCounts = [];
        $labelCount = [];
        $ksmTotalCounts = [];

        // Loop melalui data pembelian untuk mendapatkan nama produk dan kuantitas
        foreach ($data['pembeli'] as $pembeli) {
            $productName = $pembeli->product->name;
            $quantity = $pembeli->qty;
            $ksmName = $pembeli->product->user->ksm->brand_name;

            $labels[] = $productName;
            $qty[] = $quantity;
            $ksm[] = $ksmName;

            if (!isset($ksmCounts[$ksmName])) {
                $ksmCounts[$ksmName] = 0;
                $ksmTotalCounts[$ksmName] = 0;
            }

            if (!isset($labelCount[$productName])) {
                $labelCount[$productName] = 0;
            }
            $ksmCounts[$ksmName] += $quantity;
            $labelCount[$productName] += $quantity;
        }
        // Siapkan data untuk chart
        $data['chartSale'] = [
            'labels' => $labels,
            'qty' => $qty,
            'ksmCount' => array_keys($ksmCounts),
            'labelCount' => array_keys($labelCount),
            'qtyCount' => array_values($labelCount),
            'ksm' => $ksm,
            'ksmTotalCounts' => array_values($ksmCounts) // Total per KSM
        ];

        return view('pages.admin.sale.view', $data, compact('productsByCategory'));
    }

    public function manage_finance()
    {
        $data['neraca'] = Neraca::all();
        return view('pages.admin.finance.view', $data);
    }

    public function neraca()
    {
        $data['neraca'] = Neraca::all();
        return view('pages.admin.finance.neraca.add', $data);
    }

    public function getData()
    {
        $neracas = Neraca::select(['input_date', 'cash', 'receivables', 'supplies', 'equipment', 'debt', 'capital', 'information']);
        return DataTables::of($neracas)
            ->editColumn('input_date', function ($neraca) {
                return date('d-m-Y', strtotime($neraca->input_date));
            })
            ->make(true);
    }

    public function neraca_update(Request $request, $id)
    {
        // dd($id);

        $input_dates = $request->input('input_date');
        $cashes = $request->input('cash');
        $receivables = $request->input('receivables');
        $supplies = $request->input('supplies');
        $equipment = $request->input('equipment');
        $debts = $request->input('debt');
        $capitals = $request->input('capital');
        $informations = $request->input('information');

        $neraca = Neraca::findOrFail($id);
        $neraca->input_date = $input_dates;
        $neraca->cash = $cashes;
        $neraca->receivables = $receivables;
        $neraca->supplies = $supplies;
        $neraca->equipment = $equipment;
        $neraca->debt = $debts;
        $neraca->capital = $capitals;
        $neraca->information = $informations;

        $neraca->update();

        return redirect()->back()->with('status', 'Data Telah Diperbarui');
    }

    public function neraca_store(Request $request)
    {
        $input_dates = $request->input('input_date');
        $cashes = $request->input('cash');
        $receivables = $request->input('receivables');
        $supplies = $request->input('supplies');
        $equipment = $request->input('equipment');
        $debts = $request->input('debt');
        $capitals = $request->input('capital');
        $informations = $request->input('information');

        $neraca = new Neraca();
        $neraca->input_date = $input_dates;
        $neraca->cash = $cashes;
        $neraca->receivables = $receivables;
        $neraca->supplies = $supplies;
        $neraca->equipment = $equipment;
        $neraca->debt = $debts;
        $neraca->capital = $capitals;
        $neraca->information = $informations;

        if ($neraca->save()) {
            // return redirect()->route('sse'); // Redirect to SSE route on success
            return redirect()->back()->with('status', 'Data Berhasil Ditambahkan');
        }

        return redirect()->back()->with('error', 'Failed to save data');
    }

    public function neraca_destroy($id)
    {
        $transaction = Neraca::findOrFail($id);
        $transaction->delete();

        return redirect()->back()->with('delete', 'Data Berhasil Dihapus');
        // return response()->json(['success' => 'Transaction deleted successfully']);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

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
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
