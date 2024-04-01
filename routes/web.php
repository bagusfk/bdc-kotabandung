<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
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
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', function () {
            return view('welcomeadmin');
        });
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
            return view('welcomepembeli');
        });
    });
});

Route::get('/comapny-profile', [CompanyController::class, 'index'])->name('company_profile');

require __DIR__.'/auth.php';
