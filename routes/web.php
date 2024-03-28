<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
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

//untuk yng blm register
Route::get('/', [BukuController::class, 'welcome']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/buku/detail/{id}', [BukuController::class, 'detail'])->name('detail');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [UserController::class, 'logout'])->middleware('checkLogoutPermission');

//admin
Route::middleware(['auth','role:admin']) ->group(function () {
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori/tambah', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::delete('/kategori/hapus/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::patch('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/buku', [BukuController::class, 'index'])->name('buku');  
    Route::get('/buku/tambah', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::delete('/buku/hapus/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit'); 
    Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');  
    Route::get('/peminjaman/tambah', [PeminjamanController::class, 'tambahPeminjaman'])->name('peminjaman.tambah');
    Route::post('/peminjaman/store', [PeminjamanController::class, 'storePeminjaman'])->name('peminjaman.store');
    Route::post('/peminjaman/selesai/{id}', [PeminjamanController::class, 'kembalikanBuku'])->name('peminjaman.kembalikan');
    Route::get('/print', [PeminjamanController::class, 'print'])->name('print');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('users.index');
        Route::get('/user/tambah', [UserController::class, 'create'])->name('users.create');
        Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/user/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
    });
    
});

//user
Route::get('/user/peminjaman', [PeminjamanController::class, 'userPeminjaman'])->name('peminjaman.user')
->middleware(['auth', 'role:user']);


require __DIR__.'/auth.php';

