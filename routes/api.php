<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::apiResource('products', ProductController::class);
Route::apiResource('brands', \App\Http\Controllers\Api\BrandsController::class);
Route::apiResource('rams', \App\Http\Controllers\Api\RamsController::class);
Route::apiResource('colors', \App\Http\Controllers\Api\ColorsController::class);
Route::apiResource('images', \App\Http\Controllers\Api\ImagesController::class);
Route::apiResource('price', \App\Http\Controllers\Api\PriceController::class);
Route::apiResource('allTables', \App\Http\Controllers\Api\AdminController::class);
Route::get('showTable/{name}', [\App\Http\Controllers\Api\AdminController::class,'showTable']);
