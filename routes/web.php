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

// Route::get('/', function () {
//     return view('login.index');
// });
// lolgin autch
route::get("/","LoginController@login" )->name("index");
route::post("/","LoginController@authenticate")->name("authenticate");
// Route::post('/login', 'App\Http\Controllers\LoginController@authenticate')->name("authenticate");
route::get('/logout', 'LoginController@logout')->name('logout');

// 
Route::get('/starter', function () {
    return view('starter');
});
Auth::routes();

// Auth::routes(['verify' => false, 'reset' => false]);

// Route::middleware('auth')->group(function () {
   
//     // Route::get('/coba', function () {
//     //     return view('login.index');
//     // });


// });

Route::prefix("admin")->middleware("auth", "role:1")->group(function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
    // divisi
    Route::get("/divisi","DivisiController@index")->name("daftarDivisi");
    Route::get("/divisi/create","DivisiController@create")->name("createDivisi");
    Route::post("/divisi/store","DivisiController@store")->name("storeDivisi");
    Route::get("/divisi/{divisi}/edit","DivisiController@edit")->name("editDivisi");
    Route::post("/divisi/{divisi}/update", "DivisiController@update")->name("updateDivisi");
    Route::get("/divisi/{divisi}/delete", "DivisiController@destroy")->name("deleteDivisi");

    // kategori
    Route::get("/kategori","KategoriController@index")->name("daftarKategori");
    Route::get("/kategori/create","KategoriController@create")->name("createKategori");
    Route::post("/kategori/store","KategoriController@store")->name("storeKategori");
    Route::get("/kategori/{kategori}/edit","KategoriController@edit")->name("editKategori");
    Route::post("/kategori/{kategori}/update", "KategoriController@update")->name("updateKategori");
    Route::get("/kategori/{kategori}/delete", "KategoriController@destroy")->name("deleteKategori");

    // role
    Route::get("/role","RoleController@index")->name("daftarRole");
    Route::get("/role/create","RoleController@create")->name("createRole");
    Route::post("/role/store","RoleController@store")->name("storeRole");
    Route::get("/role/{role}/edit","RoleController@edit")->name("editRole");
    Route::post("/role/{role}/update", "RoleController@update")->name("updateRole");
    Route::get("/role/{role}/delete", "RoleController@destroy")->name("deleteRole");

    //User
    Route::get("/user","UserController@index")->name("daftarUser");
    Route::get("/user/create","UserController@create")->name("createUser");
    Route::post("/user/store","UserController@store")->name("storeUser");
    Route::get("/user/{user}/edit","UserController@edit")->name("editUser");
    Route::post("/user/{user}/update", "UserController@update")->name("updateUser");
    Route::get("/user/{user}/delete", "UserController@destroy")->name("deleteUser");
    Route::get("/user/cetak","UserController@cetak")->name("cetakUser");
    

    //Profile
    Route::get("/profile","ProfileController@index")->name("Profile");
    Route::get("/profile/{profile}/create","ProfileController@create")->name("createProfile");
    Route::post("/profile/{profile}/store", "ProfileController@store")->name("storeProfile");
    Route::get("/profile/{profile}/edit","ProfileController@edit")->name("editProfile");
    Route::post("/profile/{profile}/update", "ProfileController@update")->name("updateProfile");
    
}); 

Route::prefix("direktur")->middleware("auth", "role:2")->group(function(){
    Route::get('/', function () {
        return view('direktur.dashboard');
    });

});
