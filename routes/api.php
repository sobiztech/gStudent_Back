<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReportController;

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

//Farm_Product-----------------------------------------------OK----------------
Route::GET('/farmProduct/show/all', [FarmProductController::class,'index']);
Route::GET('/farmProduct/show/{id}', [FarmProductController::class,'show']);
Route::POST('/farmProduct/store', [FarmProductController::class,'store']);
Route::POST('/farmProduct/update', [FarmProductController::class,'update']);
Route::DELETE('/farmProduct/delete', [FarmProductController::class,'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
