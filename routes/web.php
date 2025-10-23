<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/services', [WebController::class, 'services'])->name('services');
Route::get('/contact', [WebController::class, 'contact'])->name('contact');
Route::get('/gallery', [WebController::class, 'gallery'])->name('gallery');
Route::get('/reviews', [WebController::class, 'reviews'])->name('reviews');
Route::get('/location', [WebController::class, 'location'])->name('location');
Route::get('/rooms', [WebController::class, 'rooms'])->name('rooms');
Route::get('/rooms/{room}/images', [RoomController::class, 'getRoomImages'])->name('rooms.images');
Route::get('/rooms/{room}/details', [RoomController::class, 'details']);
