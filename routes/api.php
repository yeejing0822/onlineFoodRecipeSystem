<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CommentController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('recipes', [RecipeController::class, 'index']);
Route::get('recipes/user/{user_id}', [RecipeController::class, 'indexByUser']);

Route::get('recipe/{id}', [RecipeController::class, 'get']);
Route::post('recipe', [RecipeController::class, 'store']);
Route::put('recipe', [RecipeController::class, 'update']);
Route::delete('recipe/{id}', [RecipeController::class, 'destroy']);

Route::post('addRating', [RatingController::class, 'store']);

Route::post('addComment', [CommentController::class, 'store']);
Route::delete('deleteComment/{id}', [CommentController::class, 'destroy']);
