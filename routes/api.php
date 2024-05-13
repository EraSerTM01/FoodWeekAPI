<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api as Controllers;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/auth')->name('auth.')->controller(Controllers\AuthController::class)->group(function () {

    Route::post('/register', 'register')->name('register');

    Route::post('/login', 'login')->name('login');

    Route::post('/logout', 'logout')->middleware('auth:sanctum')->name('logout');
});



Route::middleware('auth:sanctum')->resource('menus', Controllers\MenuController::class)
    ->name('index', 'index')
    ->name('store', 'store')
    ->name('show', 'show')
    ->name('update', 'update')
    ->name('destroy', 'destroy');

Route::middleware('auth:sanctum')->resource('dishes', Controllers\DishController::class)
    ->name('index', 'index');

Route::prefix('/users')->name('users.')->middleware('auth:sanctum')->controller(Controllers\UserController::class)->group(function () {

    Route::get('/profile', 'getCurrentUser')->name('profile');
});
