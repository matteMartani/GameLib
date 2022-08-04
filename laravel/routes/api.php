<?php

// api sono richieste che mi restituiscono qualcosa che non é in html

use App\Http\Controllers\LibraryController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //return $request->user();
//});

Route::get("/api/games", [LibraryController::class, "listGames"])->name("games_all");
Route::get("/api/games/paginate", [LibraryController::class, "list_games_with_sh_paginate"])->name("games_paginate");
Route::get("/api/games/resources", [LibraryController::class, "list_games_with_resources"])->name("games_resources");
