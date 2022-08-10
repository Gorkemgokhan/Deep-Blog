<?php

use App\Http\Controllers\Front\Homepage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
*/
Route::get("admin/panel",[App\Http\Controllers\Back\Dashboard::class,"index"])->name("admin.dashboard");
Route::get("admin/giris",[App\Http\Controllers\Back\Auth::class,"login"])->name("admin.login");
/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', [Homepage::class,"index"])->name("homepage");
Route::get('/anasayfa', [Homepage::class,"index"])->name("homepage");
Route::get('sayfa',[Homepage::class,"index"]);
Route::get("/kategori/{category}",[Homepage::class,"category"])->name("category");
Route::get("/{category}/{slug}",[Homepage::class,"single"])->name("single");
Route::get("/hakkinda",[Homepage::class,"hakkinda"])->name("hakkinda");
Route::get("/iletisim",[Homepage::class,"iletisim"])->name("iletisim");
Route::post("/iletisimm",[Homepage::class,"iletisimpost"])->name("iletisimpost");
Route::get("/{sayfa}",[Homepage::class,"page"])->name("page");
Route::get("/misyon",[Homepage::class,"misyon"])->name("misyon");
Route::get("/vizyon",[Homepage::class,"vizyon"])->name("vizyon");

