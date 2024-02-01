<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('template_back/layout');
// });
// Route::get('/', function () {
//     return view('data-buku/index');
// });
Route::get('/dashboard', function () {
    return view('dashboard/index');
});

Route::get('/', [BukuController::class, 'index'])->name('data-buku');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');