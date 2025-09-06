<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ClientController;



Route::get('/', [AccueilController::class, 'index'])->name('index');


// Routes pour personnels
Route::get('/personnels', [PersonnelController::class, 'personnel'])->name('personnels'); // Liste des personnels
Route::get('/personnels/create', [PersonnelController::class, 'create'])->name('personnels.create'); // Formulaire de création
Route::post('/personnels', [PersonnelController::class, 'store'])->name('personnels.store'); // Enregistrement du nouveau personnel
Route::get('/personnels/{personnel}/edit', [PersonnelController::class, 'edit'])->name('personnels.edit'); // Formulaire d'édition
Route::put('/personnels/{personnel}', [PersonnelController::class, 'update'])->name('personnels.update'); // Mise à jour du personnel
Route::delete('/personnels/{personnel}', [PersonnelController::class, 'destroy'])->name('personnels.destroy'); // Suppression du personnel




// gestion des clients
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
