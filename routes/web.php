<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\PersonnelController;



Route::get('/', [AccueilController::class, 'index'])->name('index');


// Routes pour personnels
Route::get('/personnels', [PersonnelController::class, 'personnel'])->name('personnel');