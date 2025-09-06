<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\TypedemissionController;



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



// gestion des consultants
Route::get('/consultants', [ConsultantController::class, 'index'])->name('consultants.index');
Route::get('/consultants/create', [ConsultantController::class, 'create'])->name('consultants.create');
Route::post('/consultants', [ConsultantController::class, 'store'])->name('consultants.store');
Route::get('/consultants/{consultant}/edit', [ConsultantController::class, 'edit'])->name('consultants.edit');
Route::put('/consultants/{consultant}', [ConsultantController::class, 'update'])->name('consultants.update');
Route::delete('/consultants/{consultant}', [ConsultantController::class, 'destroy'])->name('consultants.destroy');
Route::get('/consultants/{consultant}', [ConsultantController::class, 'show'])->name('consultants.show');



// Routes complètes pour CRUD
Route::get('type_de_missions', [TypedemissionController::class, 'index'])->name('type_de_missions.index');
Route::get('type_de_missions/create', [TypedemissionController::class, 'create'])->name('type_de_missions.create');
Route::post('type_de_missions', [TypedemissionController::class, 'store'])->name('type_de_missions.store');
Route::get('type_de_missions/{type_de_mission}/edit', [TypedemissionController::class, 'edit'])->name('type_de_missions.edit');
Route::put('type_de_missions/{type_de_mission}', [TypedemissionController::class, 'update'])->name('type_de_missions.update');
Route::delete('type_de_missions/{type_de_mission}', [TypedemissionController::class, 'destroy'])->name('type_de_missions.destroy');
