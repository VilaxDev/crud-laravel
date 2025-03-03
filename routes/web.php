<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AnimalController::class, 'index'])->name('welcome');
Route::post('/animal/store', [AnimalController::class, 'store'])->name('animal.store');
Route::put('/animal/update/{id}', [AnimalController::class, 'update'])->name('animal.update');
Route::delete('/animal/destroy/{id}', [AnimalController::class, 'destroy'])->name('animal.destroy');
