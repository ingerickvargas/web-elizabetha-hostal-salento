<?php

use Illuminate\Support\Facades\Route;
use App\Models\Gallery;
use App\Http\Controllers\WebController;

Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/services', [WebController::class, 'services'])->name('services');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/gallery', [WebController::class, 'gallery'])->name('gallery');
Route::get('/reviews', [WebController::class, 'reviews'])->name('reviews');
Route::get('/location', [WebController::class, 'location'])->name('location');