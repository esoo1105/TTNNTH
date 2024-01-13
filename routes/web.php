<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::resource('/', \App\Http\Controllers\HomeController::class);
Route::get('chitiet/{id}', [\App\Http\Controllers\HomeController::class, 'chitiet'])->name('chitiet');

//Auth User
Route::get('login', function () {
    return view('login');
});
Route::post('login', '\App\Http\Controllers\UserController@login')->name('login');
Route::get('user-add', [\App\Http\Controllers\UserController::class, 'create']);
Route::get('user/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('updateuser');
Route::delete('user/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('deleteuser');
Route::resource('user', \App\Http\Controllers\UserController::class)->middleware('auth');
Route::get('profile', [\App\Http\Controllers\UserController::class, 'profile']);
Route::get('logout', [\App\Http\Controllers\UserController::class, 'logout']);

// Khóa học

Route::resource('khoahoc', \App\Http\Controllers\KhoahocController::class)->middleware('auth');
Route::get('themkhoahoc', [\App\Http\Controllers\KhoahocController::class, 'create']);
Route::get('capnhatkhoahoc/{id}', [\App\Http\Controllers\KhoahocController::class, 'edit'])->name('capnhatkhoahoc');
Route::delete('khoahoc/{id}', [\App\Http\Controllers\KhoahocController::class, 'destroy'])->name('xoakhoahoc');

// Chi tiết khóa học
Route::resource('chitietkhoahoc', \App\Http\Controllers\ChitietkhoahocController::class)->middleware('auth');
Route::get('themchitietkhoahoc', [\App\Http\Controllers\ChitietkhoahocController::class, 'create']);
Route::get('capnhatchitietkhoahoc/{id}', [\App\Http\Controllers\ChitietkhoahocController::class, 'edit'])->name('capnhatchitietkhoahoc');
Route::delete('chitietkhoahoc/{id}', [\App\Http\Controllers\ChitietkhoahocController::class, 'destroy'])->name('xoachitietkhoahoc');

// Sinh viên

Route::resource('sinhvien', \App\Http\Controllers\SinhvienController::class)->middleware('auth');
Route::get('themsinhvien', [\App\Http\Controllers\SinhvienController::class, 'create']);
Route::get('capnhatsinhvien/{id}', [\App\Http\Controllers\SinhvienController::class, 'edit'])->name('capnhatsinhvien');
Route::delete('sinhvien/{id}', [\App\Http\Controllers\SinhvienController::class, 'destroy'])->name('xoasinhvien');


// Kết quả

Route::resource('ketqua', \App\Http\Controllers\KetquaController::class)->middleware('auth');
Route::get('themketqua', [\App\Http\Controllers\KetquaController::class, 'create']);
Route::get('capnhatketqua/{id}', [\App\Http\Controllers\KetquaController::class, 'edit'])->name('capnhatketqua');
Route::delete('ketqua/{id}', [\App\Http\Controllers\KetquaController::class, 'destroy'])->name('xoaketqua');

// Danh sách lớp

Route::resource('danhsachlop', \App\Http\Controllers\DanhsachlopController::class)->middleware('auth');
Route::get('themdanhsachlop', [\App\Http\Controllers\DanhsachlopController::class, 'create']);
Route::get('capnhatdanhsachlop/{id}', [\App\Http\Controllers\DanhsachlopController::class, 'edit'])->name('capnhatdanhsachlop');
Route::delete('danhsachlop/{id}', [\App\Http\Controllers\DanhsachlopController::class, 'destroy'])->name('xoadanhsachlop');
Route::post('import_csv', [\App\Http\Controllers\DanhsachlopController::class, 'import_csv'])->name('import_csv');


// Route
Route::get('lichhoc', [\App\Http\Controllers\HomeController::class, 'lichhoc']);
Route::get('lichdayhoc', [\App\Http\Controllers\HomeController::class, 'lichdayhoc']);
Route::get('tracuudiem', [\App\Http\Controllers\HomeController::class, 'tracuudiem']);