<?php

namespace App\Http\Controllers\Kepalabagian;

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
use App\Models\category;
use App\Models\Kelola_data_keuangan;
use App\Models\Kelola_data_penjualan;
use App\Models\User;
use App\Models\Order;
use App\Models\Transaction;

class KepalabagianController extends Controller
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

        return view('pages.kepalabagian.dashboard', $data);
    }

    public function manage_items_kg()
    {
        $data['items'] = Stokbarang::all();
        return view('pages.kepalabagian.barang.view', $data);
    }

    public function terlaris_kg($id)
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
        return view('pages.kepalabagian.barang.terlaris', compact('category', 'order'));
    }

    public function manage_ksm()
    {
        $today = Carbon::today();
        $data['ksm1'] = Kelola_data_ksm::whereDate('created_at', $today)->get();
        $data['ksm2'] = Kelola_data_ksm::all();
        $data['pembeli'] = User::whereDate('created_at', $today)->get();
        $data['pembeli2'] = User::all();
        return view('pages.kepalabagian.ksm.view', $data);
    }

    public function daftar_event_kg()
    {
        $data['register_event'] = Register_event::paginate(3, ['*'], 'register_event');

        return view('pages.kepalabagian.event.daftar', $data);
    }

    public function list_event_kg()
    {
        $data['register_event'] = Register_event::all();
        $data['events'] = Event::all();
        $data['ksm'] = Kelola_data_ksm::all();
        return view('pages.kepalabagian.event.list', $data);
    }

    public function laporan_event_kg()
    {
        $data['laporan'] = Laporan_kegiatan_event::all();

        return view('pages.kepalabagian.event.laporan', $data);
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

    public function report_item_json2()
    {
        $productsByCategory = $this->getLarisProductsByCategory();
        return response()->json($productsByCategory);
    }

    public function manage_sales_kg()
    {
        $data['order'] = Order::select('orders.transaction_id as transaction', 'stokbarangs.name as product_name', 'transactions.total_qty as total_qty', 'orders.price as price', 'kelola_data_ksms.brand_name as brand_name', 'users.name as user_name', 'users.address as user_address', 'transactions.expedition as expedition', 'transactions.expedition_type as expedition_type', 'transactions.no_resi as no_resi', 'transactions.total_price as total_price', 'transactions.order_status as order_status')
            ->join('stokbarangs', 'orders.product_id', '=', 'stokbarangs.id')
            ->join('kelola_data_ksms', 'kelola_data_ksms.id', '=', 'stokbarangs.kelola_data_ksm_id')
            ->join('transactions', 'orders.transaction_id', '=', 'transactions.id')
            ->join('users', 'transactions.buyer_id', '=', 'users.id')
            ->groupBy('transaction', 'product_name', 'price', 'brand_name')
            ->get();

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

        return view('pages.kepalabagian.sale.view', $data, compact('productsByCategory'));
    }

    public function manage_finance_kg()
    {
        $ksm = Kelola_data_ksm::all();
        $omzet = Omzet::all();
        $finance = Kelola_data_penjualan::all();
        $neraca = Neraca::all();

        $currentMonth = Carbon::now()->format('m'); // For numeric representation
        // or
        $currentMonthName = Carbon::now()->translatedFormat('F'); // For full month name
        $debtData = Omzet::select(
            'kelola_data_ksm_id',
            'kelola_data_ksms.owner as ksm_owner', // Add the column from kelola_data_ksm table
            DB::raw('SUM(omzet) as total_omzet'),
            DB::raw('DATE_FORMAT(omzets.created_at, "%m") as month')
        )
            ->join('kelola_data_ksms', 'kelola_data_ksms.id', '=', 'omzets.kelola_data_ksm_id') // Adjust if needed
            ->whereMonth('omzets.created_at', $currentMonth)
            ->groupBy('month', 'kelola_data_ksm_id', 'ksm_owner')
            ->get();

        // Extract total_omzet values
        $debt = $debtData->pluck('total_omzet')->toArray();
        // Extract month labels and KSM names
        $labels = $debtData->map(function ($item) {
            return $item->ksm_owner; // Combine KSM name and month
        })->toArray();
        return view('pages.kepalabagian.finance.view', compact('neraca', 'finance', 'labels', 'debt', 'currentMonthName', 'ksm', 'omzet'));
    }
}
