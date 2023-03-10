<?php

use App\Http\Controllers\Api\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/sliders', [HomeController::class, 'sliders']);
Route::get('/settings/{key}', [HomeController::class, 'settings']);
Route::get('/posts', [HomeController::class, 'posts']);
Route::get('/post-details/{id}', [HomeController::class, 'post_details']);
Route::post('/ContactUs', [HomeController::class, 'ContactUs']);
Route::post('/Out-ContactUs', [HomeController::class, 'OutContactUs']);

