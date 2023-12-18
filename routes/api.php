<?php

use App\Http\Controllers\API\LeadController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('restaurants', [RestaurantController::class, 'index'])->name('api.restaurants');
Route::get('restaurants/types', [RestaurantController::class, 'getRestaurantsByTypes']);
Route::get('restaurants/{restaurant:slug}', [RestaurantController::class, 'show']);

//filter
Route::get('types', [TypeController::class, 'index'])->name('api.types');
Route::get('types/{type:slug}', [TypeController::class, 'show']);

//mail
Route::post('cart', [LeadController::class, 'store']);
