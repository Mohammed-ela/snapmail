<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;


Route::get('/', [MessageController::class, 'create']);
Route::post('/', [MessageController::class, 'store']);
Route::get('/message/{token}', [MessageController::class, 'show']);

