<?php

use Illuminate\Support\Facades\Auth; //class untuk Route
use Illuminate\Support\Facades\Route; //class untuk auth

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
    return redirect(route('login'));
});
Route::get('/starter', function () {
    return view('starter');
});

Auth::routes(['verify' => false, 'reset' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    // divisi
    Route::get("/divisi","DivisiController@index")->name("daftarDivisi");
    Route::get("/divisi/create","DivisiController@create")->name("createtbl_divisi");
    Route::post("/divisi/store","DivisiController@store")->name("storetbl_divisi");
    Route::get("/divisi/{divisi}/edit","DivisiController@edit")->name("edittbl_divisi");
    Route::post("/divisi/{divisi}/update","DivisiController@store")->name("updatetbl_divisi");
});

Route::prefix('direktur')->group(function () {
    Route::get('/dashboard', function () {
        return view('direktur.dashboard');
    });
}); //rute direktur sementara
