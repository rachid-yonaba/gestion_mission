<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\PersonnelController;



Route::get('/', [AccueilController::class, 'index'])->name('index');


// Routes pour personnels
Route::get('/personnels', [PersonnelController::class, 'personnel'])->name('personnels'); // Liste des personnels
Route::get('/personnels/create', [PersonnelController::class, 'create'])->name('personnels.create'); // Formulaire de création
Route::post('/personnels', [PersonnelController::class, 'store'])->name('personnels.store'); // Enregistrement du nouveau personnel
Route::get('/personnels/{personnel}/edit', [PersonnelController::class, 'edit'])->name('personnels.edit'); // Formulaire d'édition
Route::put('/personnels/{personnel}', [PersonnelController::class, 'update'])->name('personnels.update'); // Mise à jour du personnel
Route::delete('/personnels/{personnel}', [PersonnelController::class, 'destroy'])->name('personnels.destroy'); // Suppression du personnel