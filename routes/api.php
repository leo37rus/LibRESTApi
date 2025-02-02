<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/approvals', [ListingController::class, 'show'])->middleware('role:super-admin');


Route::prefix('v1')->group(function () {
    Route::apiResource('books', \App\Http\Controllers\Api\V1\LibController::class);
    Route::get('books', [\App\Http\Controllers\Api\V1\LibController::class, 'getList']);
});
