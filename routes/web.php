<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::resource('genres', GenreController::class);
Route::resource('movies', MovieController::class);

Route::get('/', function () {
    return redirect()->route('movies.index');
});