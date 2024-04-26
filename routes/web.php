<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EventController;
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
Route::get('/e-catalog/{id}', [StokbarangController::class, 'detail'])->name('detail_catalog');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
// ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','revalidate'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard-admin', [AdminController::class, 'index'])->name('index');
        // items
        Route::get('/kelola-barang', [AdminController::class, 'manage_items'])->name('manage-items');
        Route::get('/tambah-barang', [AdminController::class, 'add_item'])->name('add-item');
        Route::put('/create-item', [AdminController::class, 'create_item'])->name('create-item');
        Route::get('/edit-item/{id}', [AdminController::class, 'edit_item'])->name('edit-item');
        Route::put('/update-item', [AdminController::class, 'update_item'])->name('update-item');
        Route::delete('/delete-item/{id}', [AdminController::class, 'delete_item'])->name('delete-item');
        // barang
        Route::get('/kelola-ksm', [AdminController::class, 'manage_ksm'])->name('manage-ksm');
        Route::get('/edit-ksm/{id}', [AdminController::class, 'edit_ksm'])->name('edit-ksm');
        Route::put('/update-ksm', [AdminController::class, 'update_ksm'])->name('update-ksm');
        Route::delete('/delete-ksm/{id}', [AdminController::class, 'delete_ksm'])->name('delete-ksm');
        // event
        Route::get('/kelola-event', [AdminController::class, 'manage_event'])->name('manage-event');
        Route::get('/tambah-event', [AdminController::class, 'add_event'])->name('add-event');
        Route::put('/create-event', [AdminController::class, 'create_event'])->name('create-event');
        Route::get('/edit-event/{id}', [AdminController::class, 'edit_event'])->name('edit-event');
        Route::put('/update-event', [AdminController::class, 'update_event'])->name('update-event');
        Route::delete('/delete-event/{id}', [AdminController::class, 'delete_event'])->name('delete-event');
        Route::get('/dokumentasi-event', [AdminController::class, 'event_document'])->name('event-document');
        Route::put('/addorupdate', [AdminController::class, 'addOrUpdate'])->name('addorupdate');
        // penjualan
        Route::get('/kelola-penjualan', [AdminController::class, 'manage_sales'])->name('manage-sales');
        // keuangan
        Route::get('/kelola-keuangan', [AdminController::class, 'manage_finance'])->name('manage-finance');

    });

    Route::middleware('role:kepalabagian')->group(function () {
        Route::get('/kepalabagian', function () {
            return 'Kepala Bagian Page';
        });
    });

    Route::middleware('role:ksm')->group(function () {
        Route::get('/ksm', function () {
            return 'KSM Page';
        });
    });

    Route::middleware('role:pembeli')->group(function () {
        Route::get('/pembeli', function () {
            return view('dashboard');
        });
        Route::get('/cart', [CartController::class, 'index'])->name('cart');
        Route::get('/my-order', [OrderController::class, 'index'])->name('my-order');
    });
});

Route::get('/comapny-profile', [CompanyController::class, 'index'])->name('company_profile');
Route::get('/event', [EventController::class, 'index'])->name('event');

require __DIR__ . '/auth.php';
Route::get('/register-ksm', [RegisteredUserController::class, 'createKsm'])->name('register-ksm');

