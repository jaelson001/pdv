<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PdvController;
use App\Http\Controllers\ConfigurationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ProductController::class)->group(function(){
    Route::get("/product/{company_id}/{code}", "research");//Cause the user load the barcode to research
    Route::delete("/product/{id}", "delete");
});
Route::post("order", [PdvController::class, "order"]);