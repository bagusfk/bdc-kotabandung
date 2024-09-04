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
use App\Models\Omzet;
use App\Models\Register_event;
use App\Models\Stokbarang;
use App\Models\Product_pictures;
use App\Models\category;
use App\Models\Kelola_data_keuangan;
use App\Models\Kelola_data_penjualan;
use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;

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
            'picture_product.*' => 'required | image | mimes:jpeg,png,jpg | max:2048', // Validasi banyak gambar
            'name' => 'required',
            'weight' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $stokbarang = new Stokbarang();
        $stokbarang->id = $request->id;
        $stokbarang->category_id = $request->category_id;
        $stokbarang->kelola_data_ksm_id = $request->ksm_id;
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

        $ksm = Kelola_data_ksm::findOrFail($request->ksm_id);
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

        return redirect('/kelola-barang');
    }


    public function edit_item($id)
    {
        $data['stokbarang'] = Stokbarang::findOrFail($id);
        $data['ksm'] = Kelola_data_ksm::all();
        $data['category'] = category::all();
        return view('pages.admin.barang.edit', $data);
    }

    public function update_item(Request $request)
    {
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

        return redirect('/kelola-barang');
    }

    public function delete_item($id)
    {
        Stokbarang::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function terlaris()
    {
        $category = category::select('category as category_name', 'url as category_url', DB::raw('SUM(orders.qty) as total_qty'))
            ->join('stokbarangs', 'stokbarangs.category_id', '=', 'categories.id')
            ->join('orders', 'stokbarangs.id', '=', 'orders.product_id')
            ->whereNotNull('transaction_id')
            ->groupBy('category_name', 'category_url')
            ->orderBy('total_qty', 'desc')
            ->get();
        return view('pages.admin.barang.fashion.view', compact('category'));
    }

    public function terlaris_id($id)
    {

        $category = category::select('category as category_name', 'url as category_url', DB::raw('SUM(orders.qty) as total_qty'))
            ->join('stokbarangs', 'stokbarangs.category_id', '=', 'categories.id')
            ->join('orders', 'stokbarangs.id', '=', 'orders.product_id')
            ->whereNotNull('transaction_id')
            ->groupBy('category_name', 'category_url')
            ->orderBy('total_qty', 'desc')
            ->get();

        $order = Order::select('stokbarangs.name as product_name', DB::raw('SUM(orders.qty) as total_qty'))
            ->join('stokbarangs', 'stokbarangs.id', '=', 'orders.product_id')
            ->join('categories', 'categories.id', '=', 'stokbarangs.category_id')
            ->where('categories.id', $id)
            ->whereNotNull('transaction_id')
            ->groupBy('stokbarangs.name')
            ->get();

        return view('pages.admin.barang.fashion.view', compact('order', 'category'));
    }

    public function laris_id($id)
    {

        $category = category::select('category as category_name', 'url as category_url', DB::raw('SUM(orders.qty) as total_qty'))
            ->join('stokbarangs', 'stokbarangs.category_id', '=', 'categories.id')
            ->join('orders', 'stokbarangs.id', '=', 'orders.product_id')
            ->whereNotNull('transaction_id')
            ->groupBy('category_name', 'category_url')
            ->orderBy('total_qty', 'desc')
            ->get();

        $order = Order::select('stokbarangs.name as product_name', DB::raw('SUM(orders.qty) as total_qty'))
            ->join('stokbarangs', 'stokbarangs.id', '=', 'orders.product_id')
            ->join('categories', 'categories.id', '=', 'stokbarangs.category_id')
            ->where('categories.id', $id)
            ->whereNotNull('transaction_id')
            ->groupBy('stokbarangs.name')
            ->get();

        return view('pages.admin.barang.fashion.view', compact('order', 'category'));
    }

    public function kurang_laris_id($id)
    {

        $category = category::select('category as category_name', 'url as category_url', DB::raw('SUM(orders.qty) as total_qty'))
            ->join('stokbarangs', 'stokbarangs.category_id', '=', 'categories.id')
            ->join('orders', 'stokbarangs.id', '=', 'orders.product_id')
            ->whereNotNull('transaction_id')
            ->groupBy('category_name', 'category_url')
            ->orderBy('total_qty', 'desc')
            ->get();

        $order = Order::select('stokbarangs.name as product_name', DB::raw('SUM(orders.qty) as total_qty'))
            ->join('stokbarangs', 'stokbarangs.id', '=', 'orders.product_id')
            ->join('categories', 'categories.id', '=', 'stokbarangs.category_id')
            ->where('categories.id', $id)
            ->whereNotNull('transaction_id')
            ->groupBy('stokbarangs.name')
            ->get();

        return view('pages.admin.barang.fashion.view', compact('order', 'category'));
    }

    // public function kriya()
    // {
    //     return view('pages.admin.barang.kriya.view');
    // }

    // public function kuliner()
    // {
    //     return view('pages.admin.barang.kuliner.view');
    // }

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

        // Menggabungkan order, transaction, dan stokbarang untuk mendapatkan total penjualan per kategori untuk bulan ini
        $totalSales = DB::table('orders')
            ->join('transactions', 'orders.transaction_id', '=', 'transactions.id')
            ->join('stokbarangs', 'orders.product_id', '=', 'stokbarangs.id')
            ->whereMonth('transactions.created_at', $currentMonth)
            ->whereYear('transactions.created_at', $currentYear)
            ->select(
                'stokbarangs.category_id',
                DB::raw('SUM(transactions.total_qty) as total_sold')
            )
            ->groupBy('stokbarangs.category_id')
            ->orderBy('stokbarangs.category_id')
            ->get();

        // Mendapatkan nama kategori
        $categories = DB::table('categories')->pluck('category', 'id')->toArray();

        $result = $totalSales->map(function ($item) use ($categories) {
            return [
                'category_id' => $item->category_id,
                'category_name' => $categories[$item->category_id] ?? 'Unknown',
                'total_sold' => $item->total_sold,
            ];
        });

        return $result;
    }

    public function manage_ksm()
    {
        $today = Carbon::today();
        $data['ksm1'] = Kelola_data_ksm::whereDate('created_at', $today)->get();
        $data['ksm2'] = Kelola_data_ksm::all();
        $data['pembeli'] = User::whereDate('created_at', $today)->get();
        $data['pembeli2'] = User::all();
        return view('pages.admin.ksm.view', $data);
    }

    public function edit_ksm($id)
    {
        $data['ksm'] = Kelola_data_ksm::findOrFail($id);
        $data['category'] = category::all();
        return view('pages.admin.ksm.edit', $data);
    }

    public function edit_pembeli($id)
    {
        $data['pembeli'] = User::findOrFail($id);
        return view('pages.admin.pembeli.edit', $data);
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

        $id = $request->get('kelola_data_ksm_id');
        $ksm = Kelola_data_ksm::findOrFail($id);

        DB::transaction(function () use ($ksm, $data, $request) {
            $ksm->update($data);

            // Handle file uploads
            $this->handleFileUpload($request, 'owner_picture', $ksm, 'owner_picture');
            $this->handleFileUpload($request, 'logo_image', $ksm, 'logo_image');
            $this->handleFileUpload($request, 'nib_document', $ksm, 'nib_document');
            $this->handleFileUpload($request, 'permission_letter', $ksm, 'permission_letter');
        });

        $ksm->refresh();
        // dd($ksm->logo_image, $ksm->nib_document, $ksm->address, $ksm->nib);
        if ($ksm->business_entity == 'reseller') {
            $ksm->cluster = 'd';
        } else {
            $ksm->cluster = 'c';
            if ($ksm->logo_image && $ksm->nib_document && $ksm->address && $ksm->nib) {
                $ksm->cluster = 'b';
                if ($ksm->permission_letter) {
                    $ksm->cluster = 'a';
                }
            }
        }
        $ksm->save();

        return redirect('/kelola-ksm');
    }

    public function update_pembeli(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'email' => 'required|email|max:255',
            'no_wa' => 'required|string|max:15',
            'address' => 'required|string|max:255'
        ]);

        // Find the user by ID
        $id = $request->get('pembeli_id');
        $user = User::findOrFail($id);

        // If password is provided, hash it and add it to the validated data
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            // Otherwise, remove password from the validated data
            unset($validatedData['password']);
        }

        // Update the user with the validated data
        $user->update($validatedData);

        // Redirect back with success message
        return redirect('/kelola-ksm')->with('success', 'User updated successfully');
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

        // Simpan perubahan
        $user->save();

        $kelolaDataKsm = Kelola_data_ksm::where('id', $id)->first();
        if ($kelolaDataKsm) {
            $kelolaDataKsm->delete();
        }

        return redirect()->back();
    }
    public function delete_pembeli($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }

    public function list_event()
    {
        $data['register_event'] = Register_event::all();
        $data['events'] = Event::all();
        $data['ksm'] = Kelola_data_ksm::all();
        return view('pages.admin.event.list.view', $data);
    }

    public function daftar_event()
    {
        $data['register_event'] = Register_event::paginate(3, ['*'], 'register_event');

        return view('pages.admin.event.daftar.view', $data);
    }

    public function penjualan_event()
    {
        $data['laporan'] = Laporan_kegiatan_event::all();
        $data['register_event'] = Register_event::paginate(3, ['*'], 'register_event');

        return view('pages.admin.event.laporan.penjualan', $data);
    }

    public function laporan_event()
    {
        $data['laporan'] = Laporan_kegiatan_event::all();
        $data['register_event'] = Register_event::paginate(3, ['*'], 'register_event');

        return view('pages.admin.laporan.laporanevent', $data);
    }

    public function laporan_produk()
    {
        $data['items'] = Stokbarang::all();

        return view('pages.admin.laporan.laporanproduk', $data);
    }

    public function laporan_penjualan()

    {
        $data['order'] = Order::select('orders.transaction_id as transaction', 'stokbarangs.name as product_name', 'transactions.total_qty as total_qty', 'orders.price as price', 'kelola_data_ksms.brand_name as brand_name', 'users.name as user_name', 'users.address as user_address', 'transactions.expedition as expedition', 'transactions.expedition_type as expedition_type', 'transactions.no_resi as no_resi', 'transactions.total_price as total_price', 'transactions.order_status as order_status')
            ->join('stokbarangs', 'orders.product_id', '=', 'stokbarangs.id')
            ->join('kelola_data_ksms', 'kelola_data_ksms.id', '=', 'stokbarangs.kelola_data_ksm_id')
            ->join('transactions', 'orders.transaction_id', '=', 'transactions.id')
            ->join('users', 'transactions.buyer_id', '=', 'users.id')
            ->groupBy('transaction', 'product_name', 'price', 'brand_name')
            ->get();

        // dd($data['order']);

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

        return view('pages.admin.laporan.laporanpenjualan', $data, compact('productsByCategory'));
    }

    public function laporan_user()
    {
        $today = Carbon::today();
        $data['ksm1'] = Kelola_data_ksm::whereDate('created_at', $today)->get();
        $data['ksm2'] = Kelola_data_ksm::all();
        $data['pembeli'] = User::whereDate('created_at', $today)->get();
        $data['pembeli2'] = User::all();

        return view('pages.admin.laporan.laporanuser', $data);
    }

    public function dokumentasi_event()
    {
        $data['image_event'] = Picture_event::all();

        return view('pages.admin.event.dokumentasi.view', $data);
    }

    public function tambah_laporan_event()
    {

        // dd($participants);

        $events = Event::all(); // Assuming you need event data for the select options

        return view('pages.admin.event.laporan.add', compact('events'));
    }

    public function getEventDetails($id)
    {
        $reportedPesertaIds = DB::table('laporan_kegiatan_events')->pluck('regist_id');

        // Ambil event dengan peserta yang belum pernah masuk ke laporan
        $event = Event::with(['peserta' => function ($query) use ($reportedPesertaIds) {
            $query->whereNotIn('id', $reportedPesertaIds);
        }, 'peserta.ksm'])->find($id);

        return response()->json($event);
    }

    public function getOwnerKsm($id)
    {
        $ksm = Kelola_data_ksm::where('category_id', $id)->get();
        // dd($ksm);

        return response()->json($ksm);
    }


    public function create_laporan_event(Request $request)
    {
        // dd($request->all());
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


        return redirect('/penjualan-event');
    }

    public function edit_laporan_event($id)
    {
        $data = Laporan_kegiatan_event::find($id);
        $events = Event::all();
        $pesertaEvent = Register_event::where('id', $data->regist_id)->pluck('event_id');
        $peserta = Register_event::where('event_id', $pesertaEvent)->get();

        // dd($peserta);
        return view('pages.admin.event.laporan.edit', compact('data', 'events', 'peserta'));
    }

    public function update_laporan_event(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "regist_id" => 'required',
            "sales_result" => 'required',
        ]);
        $laporan = Laporan_kegiatan_event::find($request->id);
        $laporan->regist_id = $request->regist_id;
        $laporan->sales_result = $request->sales_result;
        $laporan->save();

        return redirect('/laporan-event');
    }

    public function delete_laporan_event($id)
    {
        $data = Laporan_kegiatan_event::find($id);
        $data->delete();
        return redirect()->back();
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

    public function reject($id)
    {
        $data = Register_event::find($id);
        if (!$data) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        $data->status_validation = 'disagree';
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
            'location' => 'required',
            'event_poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
        ]);

        $imagePath = $request->file('event_poster')->store('public/picture_event');
        $imagePath = str_replace('public/', '', $imagePath);

        $event = new Event();
        $event->event_name = $request->event_name;
        $event->event_organizer = $request->event_organizer;
        // Gunakan timestamp yang sudah dikonversi sebagai nilai tanggal
        $event->event_date_start = $request->event_date_start;
        $event->event_date_end = $request->event_date_end;
        $event->location = $request->location;
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
            'event_date_start' => 'required',
            'event_date_end' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);

        $id = $request->get('id');
        $event = Event::find($id);

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
        $data['order'] = Order::select('orders.transaction_id as transaction', 'stokbarangs.name as product_name', 'transactions.total_qty as total_qty', 'orders.price as price', 'kelola_data_ksms.brand_name as brand_name', 'users.name as user_name', 'users.address as user_address', 'transactions.expedition as expedition', 'transactions.expedition_type as expedition_type', 'transactions.no_resi as no_resi', 'transactions.total_price as total_price', 'transactions.order_status as order_status')
            ->join('stokbarangs', 'orders.product_id', '=', 'stokbarangs.id')
            ->join('kelola_data_ksms', 'kelola_data_ksms.id', '=', 'stokbarangs.kelola_data_ksm_id')
            ->join('transactions', 'orders.transaction_id', '=', 'transactions.id')
            ->join('users', 'transactions.buyer_id', '=', 'users.id')
            ->groupBy('transaction', 'product_name', 'price', 'brand_name')
            ->get();

        return view('pages.admin.sale.view', $data);
    }

    public function manage_finance()
    {


        $ksm = Kelola_data_ksm::all();
        $omzet = Omzet::all();
        $finance = Kelola_data_penjualan::all();
        $neraca = Neraca::all();

        // $bulanIndonesia = [
        //     '01' => 'Januari',
        //     '02' => 'Februari',
        //     '03' => 'Maret',
        //     '04' => 'April',
        //     '05' => 'Mei',
        //     '06' => 'Juni',
        //     '07' => 'Juli',
        //     '08' => 'Agustus',
        //     '09' => 'September',
        //     '10' => 'Oktober',
        //     '11' => 'November',
        //     '12' => 'Desember',
        // ];

        // $currentMonth = Carbon::now()->format('m'); // For numeric representation


        $currentMonth = Carbon::now()->format('m'); // For numeric representation
        // or
        $currentMonthName = Carbon::now()->translatedFormat('F'); // For full month name

        return view('pages.admin.finance.view', compact('neraca', 'finance', 'currentMonthName', 'ksm', 'omzet'));
    }

    public function omzet_store(Request $request)
    {
        $add = $request->validate([
            'month' => 'required',
            'omzet' => 'required',
            'total_omzet' => 'required',
            'profit' => 'required',
        ]);

        Omzet::create($add);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function omzet_destroy($id)
    {
        Omzet::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    public function labarugi_store(Request $request)
    {
        $data = $request->validate([
            'kas' => 'nullable|numeric',
            'bank_bjb' => 'nullable|numeric',
            'bank_bandung' => 'nullable|numeric',
            'sewa_bayar_dimuka' => 'nullable|numeric',
            'piutang' => 'nullable|numeric',
            'persediaan' => 'nullable|numeric',
            'inventaris' => 'nullable|numeric',
            'investasi' => 'nullable|numeric',
            'harta_tetap' => 'nullable|numeric',
            'penyusutan_harta_tetap' => 'nullable|numeric',
            'hutang' => 'nullable|numeric',
            'alokasi_bop_komite' => 'nullable|numeric',
            'alokasi_bop_pengelola' => 'nullable|numeric',
            'alokasi_gaji_pengelola' => 'nullable|numeric',
            'alokasi_gaji_tenaga_ahli' => 'nullable|numeric',
            'alokasi_pengembangan_kapasitas' => 'nullable|numeric',
            'alokasi_sewa_kantor_dan_peralatan' => 'nullable|numeric',
            'modal_bdc' => 'nullable|numeric',
            'modal_awal' => 'nullable|numeric',
            'pemupukan_modal_dari_laba' => 'nullable|numeric',
            'lr_tahun_lalu' => 'nullable|numeric',
            'lr_tahun_berjalan' => 'nullable|numeric',
        ]);

        $penjualan = Kelola_data_penjualan::find(1);

        if ($penjualan) {
            // Jika data ditemukan, lakukan update
            $penjualan->update($data);
        } else {
            // Jika data tidak ditemukan, lakukan create
            Kelola_data_penjualan::create($data);
        }

        $selectedRadio = 'labarugi';

        return redirect()->back()->with('selected_radio', $selectedRadio)->with('success', 'Data berhasil diperbarui!');
    }

    public function labarugi_destroy($id)
    {
        $transaction = Kelola_data_penjualan::findOrFail($id);
        $transaction->delete();

        return redirect()->route('manage-finance')->with('delete', 'Data Berhasil Dihapus');
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

    public function neraca_store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'penjualan' => 'required|numeric',
            'diskon' => 'nullable|numeric',
            'pendapatan_komisi' => 'nullable|numeric',
            'jasa_bank' => 'nullable|numeric',
            'pendapatan_lainnya' => 'nullable|numeric',
            'persediaan_barang_awal' => 'nullable|numeric',
            'pembelian_barang' => 'nullable|numeric',
            'biaya_pengiriman' => 'nullable|numeric',
            'biaya_lain' => 'nullable|numeric',
            'persediaan_barang_akhir' => 'nullable|numeric',
        ]);

        $neraca = Neraca::find(1);

        if ($neraca) {
            // Jika data ditemukan, lakukan update
            $neraca->update($validatedData);
        } else {
            // Jika data tidak ditemukan, lakukan create
            Neraca::create($validatedData);
        }
        return redirect()->back()->with('status', 'Data Berhasil Ditambahkan');
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

    public function order_status(Request $request, $id)
    {
        Transaction::find($id)->update(['order_status' => $request->input('status')]);

        return redirect()->back()->with('status', 'Status Order Berhasil Diubah');
    }

    public function input_resi(Request $request, $id)
    {
        Transaction::find($id)->update(['no_resi' => $request->input('no_resi')]);

        return redirect()->back()->with('status', 'Status Order Berhasil Diubah');
    }
}
