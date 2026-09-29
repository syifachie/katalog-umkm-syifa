<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProdukController::class, 'home'])->name('home');
Route::get('/katalog', [ProdukController::class, 'katalog'])->name('katalog');
Route::get('/katalog/{id}', [ProdukController::class, 'detail'])->name('detail');

Route::get('/admin', [ProdukController::class, 'adminIndex'])->name('admin.index');
Route::get('/admin/tambah', [ProdukController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [ProdukController::class, 'store'])->name('admin.store');


// Route Edit & Update Produk
Route::get('/admin/edit/{id}', [ProdukController::class, 'edit'])->name('admin.edit');
Route::put('/admin/update/{id}', [ProdukController::class, 'update'])->name('admin.update');
Route::delete('/admin/delete/{id}', [ProdukController::class, 'destroy'])->name('admin.destroy');
