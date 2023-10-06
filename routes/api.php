<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludoController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/saludar', [SaludoController::class, 'saludar']);
//Route::get('/lista/{id}', [ListController::class, 'getById']);

Route::get('/personas', [SaludoController::class, 'ListaEspecifica']);
Route::get('/personas/{id}', [SaludoController::class, 'getById']);