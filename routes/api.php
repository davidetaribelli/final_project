<?php

use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VoteController;
use App\Http\Controllers\Api\GenreController;
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


// routes per la search su vue
Route::get("/users/search/{averageVote}", [UserController::class, "searchByAverageVote"]);
Route::get("/users/genre/{genre}", [UserController::class, "getUsersByGenre"]);

Route::get("/users", [UserController::class, "index"]);
Route::get("/genres", [GenreController::class, "index"]);
Route::get("/users/{id}", [UserController::class, "show"]);

Route::post('/reviews', [ReviewController::class, 'post']);
Route::post('/votes', [VoteController::class, 'addVote']);
Route::post('/messages', [MessageController::class, 'Message']);


