<?php

use Illuminate\Support\Facades\Route;
use Services\SampleAlice\App\Http\Controllers\AnimalController;

Route::get('/', function () {
    return 'Hello, Alice!';
});

Route::get('/animal', [AnimalController::class, 'index']);
Route::get('/animal/{id}', [AnimalController::class, 'show']);
