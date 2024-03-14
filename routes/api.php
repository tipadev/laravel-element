<?php

use Illuminate\Support\Facades\Route;

Route::get('/properties', [\App\Http\Controllers\PropertyController::class, 'index']);
