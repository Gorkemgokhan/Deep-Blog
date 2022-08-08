<?php

use App\Http\Controllers\Front\Homepage;
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

Route::get('/ana-sayfa', [Homepage::class,"index"])->name("homepage");
Route::get('sayfa',[Homepage::class,"index"]);
Route::get("/kategori/{category}",[Homepage::class,"category"])->name("category");
Route::get("/{category}/{slug}",[Homepage::class,"single"])->name("single");
Route::get("/hakkinda",[Homepage::class,"hakkinda"])->name("hakkinda");
Route::get("/iletisim",[Homepage::class,"iletisim"])->name("iletisim");
Route::get("/{sayfa}",[Homepage::class,"page"])->name("page");
