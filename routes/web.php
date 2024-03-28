<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('site.home');
Route::get('/drink/{id}', [SiteController::class, 'drink'])->name('site.drink');
Route::post('/results', [SiteController::class, 'results'])->name('site.results');
Route::match(['post','get'],'/search', [SiteController::class, 'search'])->name('site.search');
Route::get('/favorites', [SiteController::class, 'favorites'])->name('site.favorites');
