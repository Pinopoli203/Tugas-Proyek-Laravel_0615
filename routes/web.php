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

Route::get('/home', 'MenuController@home');
Route::get('/movie', 'MenuController@movie');
Route::get('/dosen', 'MenuController@dosen');
Route::get('/mahasiswa', 'MenuController@mahasiswa');
Route::post('/skripsi', 'MenuController@skripsi');
Route::get('/', 'MenuController@index');
Route::post('/save', 'MenuController@savemovie');
Route::get('/movie/form-ubah/(id)', 'MenuController@editMovie');
Route::put('/update/(id)', 'MenuController@updatemovie');