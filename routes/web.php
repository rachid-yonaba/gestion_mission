<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get("client",[ClientController::class, 'index'])->name("client.index");