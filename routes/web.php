<?php

use App\Http\Controllers\Front\Homepage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix("admin")->name("admin.")->middleware("isLogin")->group(function(){
    Route::get("giris",[App\Http\Controllers\Back\AuthController::class,"login"])->name("login");
    Route::post("giris",[App\Http\Controllers\Back\AuthController::class,"loginPost"])->name("login.post");
});
Route::prefix("admin")->name("admin.")->middleware("isAdmin")->group(function(){
    Route::get("panel",[App\Http\Controllers\Back\Dashboard::class,"index"])->name("dashboard");
    Route::resource("makaleler","App\Http\Controllers\Back\ArticleController");
    Route::get("cikis",[App\Http\Controllers\Back\AuthController::class,"logout"])->name("logout");
});

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

