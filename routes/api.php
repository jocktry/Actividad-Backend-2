<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ComentarioRecomendacionController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\RecomendacionController;
use App\Http\Controllers\SitioTuristicoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CiudadController::class)->prefix('ciudad')->group(function () {
    Route::get('/',[CiudadController::class, 'index']);
    Route::post('/', [CiudadController::class, 'create']);
    Route::get('/{ciudad}', [CiudadController::class, 'show']);
    Route::post('/{ciudad}', [CiudadController::class, 'update']);
    Route::put('/{ciudad}', [CiudadController::class, 'put']);
    Route::delete('/{ciudad}', [CiudadController::class, 'destroy']);
});

Route::controller(SitioTuristicoController::class)->prefix('sitio_turistico')->group(function () {
    Route::get('/',[SitioTuristicoController::class, 'index']);
    Route::post('/', [SitioTuristicoController::class, 'create']);
    Route::get('/{sitio}', [SitioTuristicoController::class, 'show']);
    Route::post('/{sitio}', [SitioTuristicoController::class, 'update']);
    Route::put('/{sitio}', [SitioTuristicoController::class, 'put']);
    Route::delete('/{sitio}', [SitioTuristicoController::class, 'destroy']);
});

Route::controller(ComentarioController::class)->prefix('comentario')->group(function () {
    Route::get('/',[ComentarioController::class, 'index']);
    Route::post('/', [ComentarioController::class, 'create']);
    Route::get('/{comentario}', [ComentarioController::class, 'show']);
    Route::post('/{comentario}', [ComentarioController::class, 'update']);
    Route::put('/{comentario}', [ComentarioController::class, 'put']);
    Route::delete('/{comentario}', [ComentarioController::class, 'destroy']);
});

Route::controller(RecomendacionController::class)->prefix('recomendacion')->group(function () {
    Route::get('/',[RecomendacionController::class, 'index']);
    Route::post('/', [RecomendacionController::class, 'create']);
    Route::get('/{recomendacion}', [RecomendacionController::class, 'show']);
    Route::post('/{recomendacion}', [RecomendacionController::class, 'update']);
    Route::put('/{recomendacion}', [RecomendacionController::class, 'put']);
    Route::delete('/{recomendacion}', [RecomendacionController::class, 'destroy']);
});
Route::controller(comentarioRecomendacionController::class)->prefix('comentario_recomendacion')->group(function () {
    Route::get('/',[comentarioRecomendacionController::class, 'index']);
    Route::post('/', [comentarioRecomendacionController::class, 'create']);
    Route::get('/{comentario_recomendacion}', [comentarioRecomendacionController::class, 'show']);
    Route::post('/{comentario_recomendacion}', [comentarioRecomendacionController::class, 'update']);
    Route::put('/{comentario_recomendacion}', [comentarioRecomendacionController::class, 'put']);
    Route::delete('/{comentario_recomendacion}', [comentarioRecomendacionController::class, 'destroy']);
});

Route::controller(FotoController::class)->prefix('foto')->group(function () {
    Route::get('/',[FotoController::class, 'index']);
    Route::post('/', [FotoController::class, 'create']);
    Route::get('/{foto}', [FotoController::class, 'show']);
    Route::post('/{foto}', [FotoController::class, 'update']);
    Route::put('/{foto}', [FotoController::class, 'put']);
    Route::delete('/{foto}', [FotoController::class, 'destroy']);
});

