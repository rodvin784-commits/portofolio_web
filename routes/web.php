<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

// Redirect halaman utama ke daftar portofolio
Route::get('/', function () {
    return redirect()->route('projects.index');
});

// ROUTE KHUSUS PENAMBAH VIEWS (+1)
// Disimpan sebelum Resource Route agar tidak terbentrok
Route::get('/projects/{id}/visit', [ProjectController::class, 'visit'])->name('projects.visit');

// Resource Route untuk menghandle seluruh fungsi CRUD
Route::resource('projects', ProjectController::class);
