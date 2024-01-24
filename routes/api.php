<?php

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\EquipeController;
use App\Http\Controllers\Api\SistemaController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('equipes', EquipeController::class);
/*Route::apiResource('equipes.users', UserController::class)
    ->scoped(['user' => 'equipe']);*/
Route::apiResource('users', UserController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('sistemas', SistemaController::class);
Route::apiResource('clientes', ClienteController::class);