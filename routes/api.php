<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\AlbumController;
use App\Http\Controllers\v1\ImageManipulationController;

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

Route::prefix('v1')->group(function(){
    // album resources
    Route::apiResource('album',AlbumController::class);

    // image manipulation
    Route::get('image',[ImageManipulationController::class,'index']);
    Route::get('image/byalbum/{album}',[ImageManipulationController::class,'byAlbum']);
    Route::get('image/{image}',[ImageManipulation::class,'show']);
    Route::post('image/resize',[ImageManipulation::class,'resize']);
    Route::delete('image/{image}',[ImageManipulation::class],'destroy');
});