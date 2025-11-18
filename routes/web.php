<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return redirect()->route('menus.index');
});

Route::resource('menus', MenuController::class);
use App\Http\Controllers\MakananController;

Route::resource('makanans', MakananController::class);
