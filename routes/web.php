<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashKategoriController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/', function () {
//     return view('contents.dashboard');
// });

Route::get('/',[DashboardController::class, 'index'])->name('dashboard');




Route::resource('penerbit', PenerbitController::class);

Route::resource('kategori', KategoriController::class);

Route::resource('rak', RakController::class);

Route::resource('buku',BukuController::class);

Route::resource('member', MemberController::class);

Route::resource('/login',LoginController::class);

Route::resource('peminjaman',PeminjamanController::class);

Route::resource('pengembalian',PengembalianController::class);

// Route::get('/registered',[RegisterController::class, 'index']);
Route::get('/registered',[RegisterController::class, 'index']);

// Route::get('pengembalian/{peminjaman}/create_pengembalian', [PengembalianController::class, 'create_pengembalian'])->name('pengembalian.create_pengembalian');
Route::get('peminjaman/{peminjaman}/create_pengembalian', [PeminjamanController::class, 'create_pengembalian'])->name('peminjaman.create_pengembalian');
Route::put('peminjaman/{peminjaman}/return', [PeminjamanController::class, 'return'])->name('peminjaman.return');



