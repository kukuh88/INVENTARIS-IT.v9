<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TokoBarangController;

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
    if (auth()->guest()) {
        return redirect()->route('login');
    }

    return redirect()->route('dashboard');
});

require __DIR__.'/auth.php';

Route::get('/auth', function () {
    return view('/auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/error', function(){
    return view ('error.index');
});

Route::middleware('auth')->group(function () {
    
    // bagain tambah barang
    Route::get('/book',[BookController::class,'index']);
    Route::post('/book/create',[BookController::class,'create']);
    Route::get('/book/{id}/edit',[BookController::class,'edit']);
    Route::post('/book/{id}/update',[BookController::class,'update']);
    Route::get('/book/{id}/delete',[BookController::class,'delete']);

    // bagian tambah lokasi barang
    Route::get('/tokobarang', [TokoBarangController::class, 'index']);
    Route::post('/tokobarang/store', [TokoBarangController::class, 'store']);
    Route::get('/tokobarang/{id}/edit', [TokoBarangController::class, 'edit']);
    Route::post('/tokobarang/{id}/update', [TokoBarangController::class, 'update']);
    Route::get('/tokobarang/{id}/destroy', [TokoBarangController::class,'destroy']);
    
});
