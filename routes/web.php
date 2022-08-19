<?php

use App\Http\Controllers\Front\Homepage;
use Illuminate\Support\Facades\Route;

    //Backend Routes

Route::prefix("admin")->name("admin.")->middleware("isLogin")->group(function(){
                    Route::get( "giris"                    ,[App\Http\Controllers\Back\AuthController::class,"login"])->name("login");
                    Route::post("giris"                    ,[App\Http\Controllers\Back\AuthController::class,"loginPost"])->name("login.post");
});
Route::prefix("admin")->name("admin.")->middleware("isAdmin")->group(function(){
                    Route::get("panel"                     ,[App\Http\Controllers\Back\Dashboard::class,"index"])->name("dashboard");
    //MAKALE Route
                    Route::get("makaleler/silinenler"      ,[App\Http\Controllers\Back\ArticleController::class,"trashed"])->name("trashed.article");
                    Route::resource("makaleler"          ,"App\Http\Controllers\Back\ArticleController");
                    Route::post('switch'                   ,[App\Http\Controllers\Back\ArticleController::class,"switch"])->name('switch');
                    Route::get('/deletearticle/{id}'       ,[App\Http\Controllers\Back\ArticleController::class,"delete"])->name('delete.article');
                    Route::get('/harddeletearticle/{id}'   ,[App\Http\Controllers\Back\ArticleController::class,"harddelete"])->name('hard.delete.article');
                    Route::get('/recoverarticle/{id}'      ,[App\Http\Controllers\Back\ArticleController::class,"recover"])->name('recover.article');
    //Category
                    Route::get("/kategoriler"              ,[App\Http\Controllers\Back\CategoryController::class,"index"])->name("category.index");
                    Route::post("/kategoriler/oluştur"     ,[App\Http\Controllers\Back\CategoryController::class,"create"])->name("category.create");
                    Route::post("/kategoriler/update"      ,[App\Http\Controllers\Back\CategoryController::class,"update"])->name("category.update");
                    Route::post("/kategoriler/delete"      ,[App\Http\Controllers\Back\CategoryController::class,"delete"])->name("category.delete");
                    Route::post("/kategoriler/status"      ,[App\Http\Controllers\Back\CategoryController::class,"switch"])->name("category.switch");
                    Route::post("/kategoriler/getData"     ,[App\Http\Controllers\Back\CategoryController::class,"getData"])->name("category.getdata");
    //PAGE ROUTE
                    Route::get("/sayfalar"                 ,[App\Http\Controllers\Back\PageController::class,"index"])->name("page.index");
                    Route::get("/sayfalar/oluştur"         ,[App\Http\Controllers\Back\PageController::class,"create"])->name("page.create");
                    Route::get("/sayfalar/güncelle/{id}"   ,[App\Http\Controllers\Back\PageController::class,"update"])->name("page.edit");
                    Route::post("/sayfalar/güncelle/{id}"  ,[App\Http\Controllers\Back\PageController::class,"updatePost"])->name("page.edit.post");
                    Route::post("/sayfalar/olustur"        ,[App\Http\Controllers\Back\PageController::class,"post"])->name("page.create.post");
                    Route::post('/sayfa/switch'            ,[App\Http\Controllers\Back\PageController::class,"switch"])->name('page.switch');
                    Route::get('/sayfa/sil/{id}'           ,[App\Http\Controllers\Back\PageController::class,"delete"])->name('page.delete');
                    Route::get('/sayfa/sırala'             ,[App\Http\Controllers\Back\PageController::class,"orders"])->name('page.orders');
    //EXIT
                    Route::get("cikis"                     ,[App\Http\Controllers\Back\AuthController::class,"logout"])->name("logout");
});

    // Front Routes

                    Route::get('/'                             ,[Homepage::class,"index"])->name("homepage");
                    Route::get('/ana-sayfa'                    ,[Homepage::class,"index"])->name("homepage");
                    Route::get('sayfa'                         ,[Homepage::class,"index"]);
                    Route::get("/kategori/{category}"          ,[Homepage::class,"category"])->name("category");
                    Route::get("/{category}/{slug}"            ,[Homepage::class,"single"])->name("single");
                    Route::get("/hakkinda"                     ,[Homepage::class,"hakkinda"])->name("hakkinda");
                    Route::get("/iletisim"                     ,[Homepage::class,"iletisim"])->name("iletisim");
                    Route::post("/iletisim"                    ,[Homepage::class,"iletisimpost"])->name("iletisimpost");
                    Route::get("/{sayfa}"                      ,[Homepage::class,"page"])->name("page");
                    Route::get("/misyon"                       ,[Homepage::class,"misyon"])->name("misyon");
                    Route::get("/vizyon"                       ,[Homepage::class,"vizyon"])->name("vizyon");
