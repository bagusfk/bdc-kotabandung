<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Kepalabagian\KepalabagianController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KelolaDataKsmController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StokbarangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/e-catalog', [StokbarangController::class, 'index'])->name('catalog');
Route::get('/e-catalog/detail/{id}', [StokbarangController::class, 'detail'])->name('detail_catalog');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
// ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'revalidate'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/address', [ProfileController::class, 'updateCities'])->name('profile.update.address');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/{province}', [ProfileController::class, 'getCities'])->name('getcities');

    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('index');
        // items
        Route::get('/kelola-barang', [AdminController::class, 'manage_items'])->name('manage-items');
        Route::get('/clustering-produk', [AdminController::class, 'clusteringProduk'])->name('clustering.produk');
        Route::get('/tambah-barang', [AdminController::class, 'add_item'])->name('add-item');
        Route::put('/create-item', [AdminController::class, 'create_item'])->name('create-item');
        Route::get('/edit-item/{id}', [AdminController::class, 'edit_item'])->name('edit-item');
        Route::put('/update-item', [AdminController::class, 'update_item'])->name('update-item');
        Route::delete('/delete-item/{id}', [AdminController::class, 'delete_item'])->name('delete-item');
        //terlaris
        Route::get('/terlaris', [AdminController::class, 'terlaris'])->name('terlaris');
        Route::get('/terlaris/{id}', [AdminController::class, 'terlaris_id'])->name('terlaris_id');
        Route::get('/laris/{id}', [AdminController::class, 'laris_id'])->name('laris_id');
        Route::get('/kurang_laris/{id}', [AdminController::class, 'kurang_laris_id'])->name('kurang_laris_id');
        // laporan
        Route::get('/laporan-barang', [AdminController::class, 'report_item'])->name('report_item');
        Route::get('/report-item-json', [AdminController::class, 'report_item_json'])->name('report_item_json');

        // ksm
        Route::get('/kelola-ksm', [AdminController::class, 'manage_ksm'])->name('manage-ksm');
        Route::get('/edit-ksm/{id}', [AdminController::class, 'edit_ksm'])->name('edit-ksm');
        Route::put('/update-ksm', [AdminController::class, 'update_ksm'])->name('update-ksm');
        Route::delete('/delete-ksm/{id}', [AdminController::class, 'delete_ksm'])->name('delete-ksm');
        Route::get('/edit-pembeli/{id}', [AdminController::class, 'edit_pembeli'])->name('edit-pembeli');
        Route::put('/update-pembeli', [AdminController::class, 'update_pembeli'])->name('update-pembeli');
        Route::delete('/delete-pembeli/{id}', [AdminController::class, 'delete_pembeli'])->name('delete-pembeli');
        // event
        //list
        Route::get('/table_list', [AdminController::class, 'table_list'])->name('table_list');
        Route::get('/list-event', [AdminController::class, 'list_event'])->name('list-event');
        Route::get('/tambah-event', [AdminController::class, 'add_event'])->name('add-event');
        Route::put('/create-event', [AdminController::class, 'create_event'])->name('create-event');
        Route::get('/edit-event/{id}', [AdminController::class, 'edit_event'])->name('edit-event');
        Route::put('/update-event', [AdminController::class, 'update_event'])->name('update-event');
        Route::delete('/delete-event/{id}', [AdminController::class, 'delete_event'])->name('delete-event');
        //daftar
        Route::get('/daftar-event', [AdminController::class, 'daftar_event'])->name('daftar-event');
        Route::put('/agree/{id}', [AdminController::class, 'agree']);
        Route::put('/reject/{id}', [AdminController::class, 'reject']);
        //laporan
        Route::get('/penjualan-event', [AdminController::class, 'penjualan_event'])->name('penjualan-event');
        Route::get('/tambah-laporan', [AdminController::class, 'tambah_laporan_event'])->name('tambah-laporan-event');
        Route::put('/create-laporan', [AdminController::class, 'create_laporan_event'])->name('create-laporan-event');
        Route::get('/edit-laporan/{id}', [AdminController::class, 'edit_laporan_event'])->name('edit-laporan-event');
        Route::put('/update-laporan', [AdminController::class, 'update_laporan_event'])->name('update-laporan-event');
        Route::delete('/delete-laporan/{id}', [AdminController::class, 'delete_laporan_event'])->name('delete-laporan-event');
        Route::get('/get-event-details/{id}', [AdminController::class, 'getEventDetails']);
        Route::get('/get-owner-ksm/{id}', [AdminController::class, 'getOwnerKsm']);
        //dokumentasi
        Route::get('/dokumentasi-event', [AdminController::class, 'dokumentasi_event'])->name('dokumentasi-event');
        Route::get('/edit-gambar', [AdminController::class, 'event_document'])->name('event-document');
        Route::put('/addorupdate', [AdminController::class, 'addOrUpdate'])->name('addorupdate');

        // penjualan
        Route::get('/kelola-penjualan', [AdminController::class, 'manage_sales'])->name('manage-sales');
        Route::post('/order_status/{id}', [AdminController::class, 'order_status'])->name('order_status');
        Route::post('/input_resi/{id}', [AdminController::class, 'input_resi'])->name('no_resi');
        // keuangan
        Route::get('/kelola-keuangan', [AdminController::class, 'manage_finance'])->name('manage-finance');
        Route::get('/tambah-kolom', [AdminController::class, 'neraca'])->name('neraca');
        Route::put('/omzet_store', [AdminController::class, 'omzet_store'])->name('omzet_store');
        Route::put('/omzet_update/{id}', [AdminController::class, 'omzet_update'])->name('omzet_update');
        Route::delete('/omzet_destroy/{id}', [AdminController::class, 'omzet_destroy'])->name('omzet_destroy');
        Route::put('/labarugi_store', [AdminController::class, 'labarugi_store'])->name('labarugi_store');
        Route::put('/labarugi_update/{id}', [AdminController::class, 'labarugi_update'])->name('labarugi_update');
        Route::delete('/labarugi_destroy/{id}', [AdminController::class, 'labarugi_destroy'])->name('labarugi_destroy');
        // Route::match(['get', 'post'], '/neraca-store', [AdminController::class, 'neraca_store'])->name('neraca_store');
        Route::put('/neraca-store', [AdminController::class, 'neraca_store'])->name('neraca_store');
        Route::get('/tambah', [AdminController::class, 'add_neraca'])->name('add_neraca');
        Route::put('/neraca_update/{id}', [AdminController::class, 'neraca_update'])->name('neraca_update');
        Route::delete('/neraca_destroy/{id}', [AdminController::class, 'neraca_destroy'])->name('neraca_destroy');


        Route::get('/laporan-event', [AdminController::class, 'laporan_event'])->name('laporan-event');
        Route::get('/laporan-produk', [AdminController::class, 'laporan_produk'])->name('laporan-produk');
        Route::get('/laporan-user', [AdminController::class, 'laporan_user'])->name('laporan-user');
        Route::get('/laporan-penjualan', [AdminController::class, 'laporan_penjualan'])->name('laporan-penjualan');
    });

    Route::middleware('role:kepalabagian')->group(function () {
        Route::get('/dashboard/kepalabagian', [KepalabagianController::class, 'index'])->name('kepalabagiandashboard');
        Route::get('/kelola_barang', [KepalabagianController::class, 'manage_items_kg'])->name('manage_items_kg');
        Route::get('/clustering-produk-kabag', [KepalabagianController::class, 'clusteringProduk'])->name('clustering.produk.kabag');
        Route::get('/terlaris_/{id}', [KepalabagianController::class, 'terlaris_kg'])->name('terlaris_kg');
        Route::get('/laris_/{id}', [KepalabagianController::class, 'laris_kg'])->name('laris_kg');
        Route::get('/kurang_laris_/{id}', [KepalabagianController::class, 'kurang_laris_kg'])->name('kurang_laris_kg');
        Route::get('/manage_ksm_kg', [KepalabagianController::class, 'manage_ksm'])->name('manage_ksm_kg');
        Route::get('/list_event_kg', [KepalabagianController::class, 'list_event_kg'])->name('list_event_kg');
        Route::get('/daftar_event_kg', [KepalabagianController::class, 'daftar_event_kg'])->name('daftar_event_kg');
        Route::get('/laporan_event_kg', [KepalabagianController::class, 'laporan_event_kg'])->name('laporan_event_kg');
        Route::get('/manage_sales_kg', [KepalabagianController::class, 'manage_sales_kg'])->name('manage_sales_kg');
        Route::get('/manage_finance_kg', [KepalabagianController::class, 'manage_finance_kg'])->name('manage_finance_kg');
        Route::get('/report_item_json2', [KepalabagianController::class, 'report_item_json2'])->name('report_item_json2');
    });

    Route::middleware('role:ksm')->group(function () {
        // Route::get('/ksm', function () {
        //     return 'KSM Page';
        // });
        Route::get('/dashboard-ksm', [KelolaDataKsmController::class, 'index'])->name('dashboard_ksm');
        Route::get('/dashboard-ksm/brand-products/{id}', [KelolaDataKsmController::class, 'show'])->name('product_ksm');
        Route::get('/dashboard-ksm/brand-products/details/{id}', [KelolaDataKsmController::class, 'showDetail'])->name('product_detail_ksm');
        Route::get('/register-event/{id}', [EventController::class, 'store'])->name('register_event');
        Route::get('/view-pdf/{path}', [KelolaDataKsmController::class, 'viewPdf'])->name('view_pdf');
    });

    Route::middleware('role:pembeli,ksm')->group(function () {
        Route::get('/pembeli', function () {
            return view('dashboard');
        });
        Route::post('/cart/add/{item}', [CartController::class, 'addTocart'])->name('cart.add');
        Route::get('/cart', [CartController::class, 'index'])->name('cart');
        Route::get('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
        Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
        Route::get('/checkout/{id}', [OrderController::class, 'continueCheckout'])->name('continueCheckout');
        Route::post('/getCourierServices', [OrderController::class, 'getCourierServices'])->name('getCourierServices');
        Route::post('/payment', [OrderController::class, 'payment'])->name('payment');
        // Route::match(['get', 'post', 'put'], '/finish-payment', [OrderController::class, 'finishPayment'])->name('finish-payment');
        Route::get('/finish-payment', [OrderController::class, 'finishPayment'])->name('finish-payment');
        Route::get('/my-order', [OrderController::class, 'myOrder'])->name('my-order');
        Route::get('/register-ksm', [RegisteredUserController::class, 'createKsm'])->name('register-ksm');
        Route::put('/create-ksm', [RegisteredUserController::class, 'storeKsm'])->name('store-ksm');
    });
});
Route::get('/e-catalog/search', [StokbarangController::class, 'searchBarang'])->name('search.barang');
Route::get('/e-catalog/search-category', [StokbarangController::class, 'searchCategory'])->name('search.category');
Route::get('/company-profile', [CompanyController::class, 'index'])->name('company_profile');
Route::get('/event', [EventController::class, 'index'])->name('event');

require __DIR__ . '/auth.php';
// Route::get('/register-ksm', [RegisteredUserController::class, 'createKsm'])->name('register-ksm');
// Route::get('/straight/{id}', [RegisteredUserController::class, 'straight_ksm']);
