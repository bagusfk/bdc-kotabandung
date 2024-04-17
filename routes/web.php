<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StokbarangController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Admin\AdminController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', function () {
            return view('welcomeadmin');
        });
        // items
        Route::get('/kelola-barang', [AdminController::class, 'kelolabarang'])->name('kelola-barang');
        Route::get('/tambah-barang', [AdminController::class, 'add_item'])->name('add-item');
        Route::put('/create-item', [AdminController::class, 'create_item'])->name('create-item');
        Route::get('/edit-item/{id}', [AdminController::class, 'edit_item'])->name('edit-item');
        Route::put('/update-item', [AdminController::class, 'update_item'])->name('update-item');
        Route::delete('/delete-item/{id}', [AdminController::class, 'delete_item'])->name('delete-item');
        // barang
        Route::get('/kelola-ksm', [AdminController::class, 'kelola_ksm'])->name('kelola-ksm');
        Route::get('/edit-ksm/{id}', [AdminController::class, 'edit_ksm'])->name('edit-ksm');
        Route::put('/update-ksm', [AdminController::class, 'update_ksm'])->name('update-ksm');
        Route::delete('/delete-ksm/{id}', [AdminController::class, 'delete_ksm'])->name('delete-ksm');
        // event
        Route::get('/kelola-event', [AdminController::class, 'kelola_event'])->name('kelola-event');

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
    });
});

Route::get('/comapny-profile', [CompanyController::class, 'index'])->name('company_profile');

require __DIR__.'/auth.php';
