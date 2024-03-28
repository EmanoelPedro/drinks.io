<?php

use App\Http\Controllers\FavoriteDrinks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/favorite-drinks', [FavoriteDrinks::class,'index']);
Route::post('/favorite-drinks', [FavoriteDrinks::class,'create']);
Route::delete('/favorite-drinks/{id}', [FavoriteDrinks::class,'destroy']);
