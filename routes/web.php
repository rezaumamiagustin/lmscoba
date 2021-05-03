<?php

use App\Http\Controllers\UlanganController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});
Route::view('/Admin/a_siswa','Admin/a_siswa');
Route::view('/Admin/a_guru','Admin/a_guru');
Route::view('/Admin/a_mapel','Admin/a_mapel');
Route::view('/Admin/a_kelas','Admin/a_kelas');

// ============Ulangan Guru=========
Route::get('/Guru/ulangan', [UlanganController::class, 'index']);
Route::get('/Guru/ulangan/create', [UlanganController::class, 'create']);
Route::post('/ulangan', [UlanganController::class, 'store'])->name('storeUlanganTambah');
Route::get('/Guru/ulangan/edit/{ulangan}', [UlanganController::class, 'edit']);
Route::patch('/Guru/ulangan/{ulangan}', [UlanganController::class, 'update']);
Route::delete('/Guru/ulangan/{id}', [UlanganController::class, 'destroy']);
Route::get('/Guru/ulangan/inputSoal/{ulangan}', [UlanganController::class, 'inputSoal']);


// ============Ulangan Siswa=========
Route::view('/Siswa/ulangan','Siswa/ulangan');