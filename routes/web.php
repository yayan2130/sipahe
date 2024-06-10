<?php

use App\Http\Controllers\AdminGejala;
use App\Http\Controllers\AdminHasil;
use App\Http\Controllers\AdminPages;
use App\Http\Controllers\AdminPenyakit;
use App\Http\Controllers\AdminRulebase;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Konsultasi;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use GuzzleHttp\Middleware;

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

Route::get('/sipahe', [Home::class, 'index']);

Route::get('/sipahe/home', [Home::class, 'index']);

Route::get('/sipahe/konsul', [Konsultasi::class, 'index']);
Route::post('/sipahe/konsul/action', [Konsultasi::class, 'action']);
Route::post('/sipahe/konsul/nextPertanyaan/{kd_pasien}/{kode_gejala}', [Konsultasi::class, 'nextPertanyaan']);

Route::get('/sipahe/konsul/result/{kd_pasien}', [Konsultasi::class, 'result'])->name('konsultasi.index');
// Route::get('/sipahe/konsul/result', [Konsultasi::class, 'result'])->name('konsultasi.view');



Route::get('/sipahe/about', function () {
    return view('about',[
        "title" => "About"
    ]);
});
//========================================================================
//auth
Route::get('/sipahe/login', [Login::class, 'index'])->name('login')->Middleware('guest');
Route::post('/sipahe/login',[Login::class, 'authenticate']);
Route::get('/sipahe/login/logout',[Login::class, 'logout']);

Route::get('/sipahe/register', [Register::class, 'index']);
Route::post('/sipahe/register',[Register::class, 'store']);
//========================================================================


//========================================================================
//admin
Route::get('/sipahe/admin/home', [AdminPages::class, 'index'])->middleware('auth');
//admin penyakit
Route::get('/sipahe/admin/penyakit', [AdminPenyakit::class, 'index'])->name('penyakit.index')->middleware('auth');

Route::get('/sipahe/admin/penyakit/create', [AdminPenyakit::class, 'create'])->name('penyakit.create')->middleware('auth');
Route::post('/sipahe/admin/penyakit/create', [AdminPenyakit::class, 'store'])->name('penyakit.store')->middleware('auth');

Route::get('/sipahe/admin/penyakit/edit/{id}', [AdminPenyakit::class, 'edit'])->name('penyakit.edit')->middleware('auth');
Route::post('/sipahe/admin/penyakit/edit/{id}',[AdminPenyakit::class, 'update'])->name('penyakit.update')->middleware('auth');

Route::post('/sipahe/admin/penyakit/delete/{id}',[AdminPenyakit::class, 'delete'])->name('penyakit.delete')->middleware('auth');

//admin gejala
Route::get('/sipahe/admin/gejala', [AdminGejala::class, 'index'])->name('gejala.index')->middleware('auth');

Route::get('/sipahe/admin/gejala/create', [AdminGejala::class, 'create'])->name('gejala.create')->middleware('auth');
Route::post('/sipahe/admin/gejala/create', [AdminGejala::class, 'store'])->name('gejala.store')->middleware('auth');

Route::get('/sipahe/admin/gejala/edit/{id}', [AdminGejala::class, 'edit'])->name('gejala.edit')->middleware('auth');
Route::post('/sipahe/admin/gejala/edit/{id}',[AdminGejala::class, 'update'])->name('gejala.update')->middleware('auth');

Route::post('/sipahe/admin/gejala/delete/{id}',[AdminGejala::class, 'delete'])->name('gejala.delete')->middleware('auth');

//admin rulebase
Route::get('/sipahe/admin/rulebase', [AdminRulebase::class, 'index'])->name('rulebase.index')->middleware('auth');

Route::get('/sipahe/admin/rulebase/create', [AdminRuleBase::class, 'create'])->name('rulebase.create')->middleware('auth');
Route::post('/sipahe/admin/rulebase/create', [AdminRuleBase::class, 'store'])->name('rulebase.store')->middleware('auth');

Route::get('/sipahe/admin/rulebase/edit/{id}', [AdminRuleBase::class, 'edit'])->name('rulebase.edit')->middleware('auth');
Route::post('/sipahe/admin/rulebase/edit/{id}',[AdminRuleBase::class, 'update'])->name('rulebase.update')->middleware('auth');

Route::post('/sipahe/admin/rulebase/delete/{id}',[AdminRuleBase::class, 'delete'])->name('rulebase.delete')->middleware('auth');

//admin hasil
Route::get('/sipahe/admin/hasil', [AdminHasil::class, 'index']);
route::get('/sipahe/admin/hasil/delete/{kd_pasien}', [AdminHasil::class, 'delete']);
//========================================================================

?>