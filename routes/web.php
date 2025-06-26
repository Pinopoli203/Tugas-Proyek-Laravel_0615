<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuanController;
use App\Http\Controllers\UASController;
use App\Http\Controllers\AuthController;

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

Route::get('/cuan', [CuanController::class, 'index'])->name('cuan.index');
Route::get('/cuan/create', [CuanController::class, 'create'])->name('cuan.create');
Route::post('/cuan', [CuanController::class, 'store'])->name('cuan.store');
Route::get('/cuan/{id}/edit', [CuanController::class, 'edit'])->name('cuan.edit');
Route::put('/cuan/{id}', [CuanController::class, 'update'])->name('cuan.update');
Route::delete('/cuan/{id}', [CuanController::class, 'destroy'])->name('cuan.destroy');

Route::middleware(['auth'])->group(function () {
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/password/edit', [CuanController::class, 'editPassword'])->name('password.edit');
    Route::post('/password/update', [CuanController::class, 'updatePassword'])->name('password.update');
});

Route::get('/UAS', [UASController::class, 'UAS']);
Route::post('/UASsubmit', [UASController::class, 'UAS_hasil']);
Route::get('/UAS/index', [UASController::class, 'indexkaryawan']);
