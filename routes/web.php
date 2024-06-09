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

Route::get('/', [Home::class, 'index']);

Route::get('/home', [Home::class, 'index']);

Route::get('/konsul', [Konsultasi::class, 'index']);
Route::post('/konsul/action', [Konsultasi::class, 'action']);
Route::post('/konsul/nextPertanyaan/{kd_pasien}/{kode_gejala}', [Konsultasi::class, 'nextPertanyaan']);

Route::get('/konsul/result/{kd_pasien}', [Konsultasi::class, 'result'])->name('konsultasi.index');
// Route::get('/konsul/result', [Konsultasi::class, 'result'])->name('konsultasi.view');



Route::get('/about', function () {
    return view('about',[
        "title" => "About"
    ]);
});
//========================================================================
//auth
Route::get('/login', [Login::class, 'index'])->name('login')->Middleware('guest');
Route::post('/login',[Login::class, 'authenticate']);
Route::get('/login/logout',[Login::class, 'logout']);

Route::get('/register', [Register::class, 'index']);
Route::post('/register',[Register::class, 'store']);
//========================================================================


//========================================================================
//admin
Route::get('/admin/home', [AdminPages::class, 'index'])->middleware('auth');
//admin penyakit
Route::get('/admin/penyakit', [AdminPenyakit::class, 'index'])->name('penyakit.index')->middleware('auth');

Route::get('/admin/penyakit/create', [AdminPenyakit::class, 'create'])->name('penyakit.create')->middleware('auth');
Route::post('/admin/penyakit/create', [AdminPenyakit::class, 'store'])->name('penyakit.store')->middleware('auth');

Route::get('/admin/penyakit/edit/{id}', [AdminPenyakit::class, 'edit'])->name('penyakit.edit')->middleware('auth');
Route::post('/admin/penyakit/edit/{id}',[AdminPenyakit::class, 'update'])->name('penyakit.update')->middleware('auth');

Route::post('/admin/penyakit/delete/{id}',[AdminPenyakit::class, 'delete'])->name('penyakit.delete')->middleware('auth');

//admin gejala
Route::get('/admin/gejala', [AdminGejala::class, 'index'])->name('gejala.index')->middleware('auth');

Route::get('/admin/gejala/create', [AdminGejala::class, 'create'])->name('gejala.create')->middleware('auth');
Route::post('/admin/gejala/create', [AdminGejala::class, 'store'])->name('gejala.store')->middleware('auth');

Route::get('/admin/gejala/edit/{id}', [AdminGejala::class, 'edit'])->name('gejala.edit')->middleware('auth');
Route::post('/admin/gejala/edit/{id}',[AdminGejala::class, 'update'])->name('gejala.update')->middleware('auth');

Route::post('/admin/gejala/delete/{id}',[AdminGejala::class, 'delete'])->name('gejala.delete')->middleware('auth');

//admin rulebase
Route::get('/admin/rulebase', [AdminRulebase::class, 'index'])->name('rulebase.index')->middleware('auth');

Route::get('/admin/rulebase/create', [AdminRuleBase::class, 'create'])->name('rulebase.create')->middleware('auth');
Route::post('/admin/rulebase/create', [AdminRuleBase::class, 'store'])->name('rulebase.store')->middleware('auth');

Route::get('/admin/rulebase/edit/{id}', [AdminRuleBase::class, 'edit'])->name('rulebase.edit')->middleware('auth');
Route::post('/admin/rulebase/edit/{id}',[AdminRuleBase::class, 'update'])->name('rulebase.update')->middleware('auth');

Route::post('/admin/rulebase/delete/{id}',[AdminRuleBase::class, 'delete'])->name('rulebase.delete')->middleware('auth');

//admin hasil
Route::get('/admin/hasil', [AdminHasil::class, 'index']);
route::get('/admin/hasil/delete/{kd_pasien}', [AdminHasil::class, 'delete']);
//========================================================================

?>