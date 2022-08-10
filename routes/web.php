<?php

use App\Http\Controllers\Front\Homepage;
use Illuminate\Support\Facades\Route;

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
/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
*/
Route::get("admin/panel","Back\Dashboard@index")->name("admin.dashboard");
