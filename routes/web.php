<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\quesioner;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/dashboard', [quesioner::class, 'indexdas'])->middleware('auth');

Route::get('/register', [quesioner::class, 'register']);
Route::post('/register', [quesioner::class, 'registerPost']);
//Route::get('/logout', [quesioner::class, 'logout']);

Route::get('/login', [quesioner::class, 'indexlogin'])->name('login')->middleware('guest');
Route::post('/login', [quesioner::class, 'login']);
Route::get('/logout', [quesioner::class, 'logout']);

Route::get('/datadosen', [quesioner::class, 'index'])->middleware('auth');
Route::get('/tambahdatadosen', [quesioner::class, 'tambah'])->middleware('auth');
Route::post('/simpandatadosen', [quesioner::class, 'simpan'])->middleware('auth');
Route::post('/updatedatadosen', [quesioner::class, 'update'])->middleware('auth');
Route::get('/editdatadosen/{id_dosen}', [quesioner::class, 'edit'])->middleware('auth');
Route::get('/hapusdatadosen/{id}', [quesioner::class, 'hapus'])->middleware('auth');

Route::get('/datamatkul', [quesioner::class, 'indexmk'])->middleware('auth');
Route::get('/tambahdatamatkul', [quesioner::class, 'tambahmk'])->middleware('auth');
Route::post('/simpandatamatkul', [quesioner::class, 'simpanmk'])->middleware('auth');
Route::post('/updatedatamatkul', [quesioner::class, 'updatemk'])->middleware('auth');
Route::get('/editdatamatkul/{id}', [quesioner::class, 'editmk'])->middleware('auth');
Route::get('/hapusdatamatkul/{id}', [quesioner::class, 'hapusmk'])->middleware('auth');

Route::get('/datafasilitas', [quesioner::class, 'indexfas'])->middleware('auth');
Route::get('/tambahdatafasilitas', [quesioner::class, 'tambahfas'])->middleware('auth');
Route::post('/simpandatafasilitas', [quesioner::class, 'simpanfas'])->middleware('auth');
Route::post('/updatedatafasilitas', [quesioner::class, 'updatefas'])->middleware('auth');
Route::get('/editdatafasilitas/{id}', [quesioner::class, 'editfas'])->middleware('auth');
Route::get('/hapusdatafasilitas/{id}', [quesioner::class, 'hapusfas'])->middleware('auth');

Route::get('/datapertanyaan', [quesioner::class, 'indextan'])->middleware('auth');
Route::get('/tambahdatapertanyaan', [quesioner::class, 'tambahtan'])->middleware('auth');
Route::post('/simpandatapertanyaan', [quesioner::class, 'simpantan'])->middleware('auth');
Route::post('/updatedatapertanyaan', [quesioner::class, 'updatetan'])->middleware('auth');
Route::get('/editdatapertanyaan/{id}', [quesioner::class, 'edittan'])->middleware('auth');
Route::get('/hapusdatapertanyaan/{id}', [quesioner::class, 'hapustan'])->middleware('auth');

Route::get('/listquesioneredom', [quesioner::class, 'dataedom'])->middleware('auth');
Route::get('/sembunyikanpertanyaanedom/{id}', [quesioner::class, 'sembunyikandataedom'])->middleware('auth');
Route::get('/tampilkanpertanyaanedom/{id}', [quesioner::class, 'tampilkandataedom'])->middleware('auth');
Route::get('/quesioneredom', [quesioner::class, 'isiedom'])->middleware('auth');
Route::post('/simpanquesioneredom', [quesioner::class, 'tambahedom'])->middleware('auth');
Route::get('/laporanedom', [quesioner::class, 'datalaporanedom'])->middleware('auth');

Route::get('/listquesionerfas', [quesioner::class, 'datafas'])->middleware('auth');
Route::get('/sembunyikanpertanyaanfas/{id}', [quesioner::class, 'sembunyikandatafas'])->middleware('auth');
Route::get('/tampilkanpertanyaanfas/{id}', [quesioner::class, 'tampilkandatafas'])->middleware('auth');
Route::get('/quesionerfas', [quesioner::class, 'isifas'])->middleware('auth');
Route::post('/simpanquesionerfas', [quesioner::class, 'tambahfasi'])->middleware('auth');
Route::get('/laporanfas', [quesioner::class, 'datalaporanfas'])->middleware('auth');

Route::get('/guest', [quesioner::class, 'indexmhs']);
Route::get('/quesioneredommhs', [quesioner::class, 'isiedommhs']);
Route::post('/simpanquesioneredommhs', [quesioner::class, 'tambahedommhs']);

Route::get('/listnilai', [quesioner::class, 'datanilai'])->middleware('auth');
Route::get('/raportedom/{id_dosen}/{id_matkul}', [quesioner::class, 'raportedom'])->middleware('auth');

Route::get('/raportfas/{id_fasilitas}', [quesioner::class, 'raportfas'])->middleware('auth');


//Route::get('/register', [quesioner::class, 'register']);

//Auth::routes();

//Route::get('/login', [App\Http\Controllers\quesioner::class, 'indexlogin'])->name('home');
