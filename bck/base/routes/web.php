<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\UserController::class, 'home'])->name('homescustomer');
Route::get('/about', [App\Http\Controllers\UserController::class, 'about'])->name('about');
Route::get('/program', [App\Http\Controllers\UserController::class, 'program'])->name('program');
Route::get('/daftar-{id}', [App\Http\Controllers\UserController::class, 'daftar'])->name('daftar');
Route::get('/manualverifikasi', [App\Http\Controllers\UserController::class, 'verifikasi'])->name('verifikasi');
Route::get('/verifikasi/{invoice}', [App\Http\Controllers\UserController::class, 'verifikasi2'])->name('verif');
Route::get('/contact', [App\Http\Controllers\UserController::class, 'contact'])->name('contact');
Route::get('/daftarrombongan', [App\Http\Controllers\UserController::class, 'daftarrombongan'])->name('daftarrombongan');

Route::get('resetme', function (){
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
  });
  
Route::post('daftarrombongan', function () {
    $passing = 'Halo Brilliant English Course Saya dan teman-teman ingin Bergabung Dengan "Paket Rombongan"'."\n\n";
    $passing .= 'Nama Penanggung : '.request()->nama_penanggung."\n";
    $passing .= 'Whatsapp : '.request()->wa_penanggung1."\n";
    $passing .= 'Rombongan Dari : '.request()->rombongan_dari."\n";
    $passing .= 'Nama Rombongan : '.request()->nama_rombongan."\n";
    $passing .= 'Jumlah Rombongan : '.request()->jumlah_rombongan."\n";
    $passing .= 'Periode : '.request()->kloter."\n";
    $passing .= ' '.request()->wa_penanggung2."\n";
    $passing .= 'Email : : '.request()->wa_penanggung3."\n";
    $passing .= ' '.request()->paket_pulang."\n";
    $passing .= 'Pesan : '.request()->pesan_penanggung."\n";
    $passing = urlencode($passing);
    return redirect()->to('https://wa.me/6285156458433?text='.$passing);
    // dd(request());
})->name('daftarrombonganaction');

Route::get('getkab', [App\Http\Controllers\UserController::class, 'getkab'])->name('getdaerah');

Route::post('daftaraction', [App\Http\Controllers\UserController::class, 'daftaraction'])->name('daftaraction');
Route::get('verifikasidaftar/{id}',  [App\Http\Controllers\UserController::class, 'konfirmasiaction'])->name('konfirmasiaction');

Route::post('cekinvoicetrue', [App\Http\Controllers\UserController::class, 'cekinvoicetrue'])->name('cekinvoicetrue');
Route::post('uploadconfirminv', [App\Http\Controllers\UserController::class, 'uploadconfirminv'])->name('uploadconfirminv');

Route::get('showinvoice/{id}', [App\Http\Controllers\UserController::class, 'showinvoice'])->name('showinvoice');

Auth::routes(['register' => false,'reset' => false,'verify' => false,]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/manage-bank', [App\Http\Controllers\HomeController::class, 'manage_bank'])->name('manage_bank');
Route::post('/manage-bank', [App\Http\Controllers\HomeController::class, 'manage_bank_action'])->name('manage_bank_action');
Route::get('/manage-bank-delete/{id}', [App\Http\Controllers\HomeController::class, 'manage_bank_delete'])->name('manage_bank_delete');

Route::get('/manage-paket', [App\Http\Controllers\HomeController::class, 'manage_paket'])->name('manage_paket');
Route::get('/manage-paket-tambah', [App\Http\Controllers\HomeController::class, 'manage_paket_tambah'])->name('manage_paket_tambah');
Route::post('/manage-paket-tambah-action', [App\Http\Controllers\HomeController::class, 'manage_paket_tambah_action'])->name('manage_paket_tambah_action');
Route::get('/manage-paket-edit-{id}', [App\Http\Controllers\HomeController::class, 'manage_paket_edit'])->name('manage_paket_edit');
Route::post ('/manage-paket-edit-action', [App\Http\Controllers\HomeController::class, 'manage_paket_edit_action'])->name('manage_paket_edit_action');
Route::get('/manage-paket-delete-{id}', [App\Http\Controllers\HomeController::class, 'manage_paket_delete'])->name('manage_paket_delete');

Route::get('/manage-referal', [App\Http\Controllers\HomeController::class, 'manage_referal'])->name('manage_referal');
Route::post('/manage-referal', [App\Http\Controllers\HomeController::class, 'manage_referal_action'])->name('manage_referal_action');
Route::get('/manage-referal-delete/{id}', [App\Http\Controllers\HomeController::class, 'manage_referal_delete'])->name('manage_referal_delete');
Route::post('/manage-referal-action-edit', [App\Http\Controllers\HomeController::class, 'manage_referal_action_edit'])->name('manage_referal_action_edit');

Route::get('/manage-kloter', [App\Http\Controllers\HomeController::class, 'manage_kloter'])->name('manage_kloter');
Route::post('/manage-kloter', [App\Http\Controllers\HomeController::class, 'manage_kloter_action'])->name('manage_kloter_action');
Route::get('/manage-kloter-ar{id}{active}', [App\Http\Controllers\HomeController::class, 'manage_kloter_ar'])->name('manage_kloter_ar');
Route::post('/manage-kloter-up', [App\Http\Controllers\HomeController::class, 'manage_kloter_actionup'])->name('manage_kloter_actionup');
Route::get('/managedelkloter{id}', [App\Http\Controllers\HomeController::class, 'managedelkloter'])->name('managedelkloter');

Route::get('/manage-detail-kloter/{id}', [App\Http\Controllers\HomeController::class, 'manage_dkloter'])->name('manage_dkloter');

Route::get('/manage-delete-kloter/{id}', [App\Http\Controllers\HomeController::class, 'manage_delkloter'])->name('manage_delkloter');
Route::get('/konfirmasi-kloter/{id}/{lunas}', [App\Http\Controllers\HomeController::class, 'konfirmasikloter'])->name('konfirmasikloter');

Route::get('/export-kloter/{id}', [App\Http\Controllers\HomeController::class, 'exportkloter'])->name('exportkloter');

Route::get('/cookie', function () {
    return Cookie::get('referral');
});
