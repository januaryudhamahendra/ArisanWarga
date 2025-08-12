<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ArisanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\StatistikController;

Route::get('/', function(){ return redirect()->route('arisans.index'); });

Route::resource('peserta', PesertaController::class);
Route::resource('arisans', ArisanController::class);

// pembayaran: index, create, store, destroy, toggle
Route::get('pembayaran', [PembayaranController::class,'index'])->name('pembayaran.index');
Route::get('pembayaran/create', [PembayaranController::class,'create'])->name('pembayaran.create');
Route::post('pembayaran', [PembayaranController::class,'store'])->name('pembayaran.store');
Route::delete('pembayaran/{pembayaran}', [PembayaranController::class,'destroy'])->name('pembayaran.destroy');
Route::post('pembayaran/{pembayaran}/toggle', [PembayaranController::class,'toggle'])->name('pembayaran.toggle');

Route::get('statistik', [StatistikController::class,'index'])->name('statistik.index');
