<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recipe/{id}', function($id) {
    $user_id = Auth::id();
    $recipe = Recipe::find($id);
    if (!$recipe) {
        return redirect('/');
    }
    return view('recipe', ['id' => $id, 'user_id' => $user_id]);
});

Route::get('/myrecipe', function() {
    $user_id = Auth::id();
    return view('myrecipe', ['user_id' => $user_id]);
})->middleware('auth');

Route::group(['middleware' => ['auth', 'can:isOwner,id']], function() {
    Route::get('/recipe/edit/{id}', function($id) {
        $user_id = Auth::id();
        return view('editrecipe', ['id' => $id, 'user_id' => $user_id]);
    }); 
});

Route::get('/newrecipe', function() {
    $user_id = Auth::id();
    return view('newrecipe', ['user_id' => $user_id]);
})->middleware('auth');

Route::group(['middleware' => ['auth', 'can:isAdmin']], function() {
    Route::get('/deleterecipe', function() {
        $user_id = Auth::id();
        return view('deleterecipe');
    });
});
