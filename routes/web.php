<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PdvController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware("auth")->group(function () {
    Route::any('/',[PdvController::class, "tela"]);
    Route::get("/test", function(Request $request){
        exit(Auth::user()->name);
    });
    Route::controller(ProductController::class)->group(function(){
        Route::get("/produtos", "tela");
        Route::put("/produtos/{id}", "update");
        Route::post("/produtos", "create");
        Route::delete("/produtos/{id}", "delete");
    });
});

Route::view('/login', "login")->name('login');

Route::controller(AuthController::class)->group(function(){
    Route::post("/autenticar", "autenticar");
    Route::get("/sair", "sair");
});