<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PdvController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ConfigurationController;
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
        exit(json_encode(Auth::user()));
    });
    Route::controller(ProductController::class)->group(function(){
        Route::get("products", "tela");
        Route::put("/product", "update");
        Route::post("/product", "create");
        Route::delete("/product/{id}", "delete");
    });
    Route::get('/orders',[PdvController::class, "orders"]);
    Route::get("configs", [ConfigurationController::class, "tela"]);
    Route::post("configs", [ConfigurationController::class, "update"]);
});

Route::view('/login', "login")->name('login');
Route::view('/register', "register")->name('register');

Route::controller(AuthController::class)->group(function(){
    Route::post("/autenticar", "autenticar");
    Route::post("/registrar", "registrar");
    Route::get("/sair", "sair");
});