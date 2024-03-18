<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DescricaoController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\SistemaController;
use App\Http\Controllers\SolicitanteController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UrgenciaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/mark-as-read', [App\Http\Controllers\TicketController::class,'markAsRead'])->name('mark-as-read');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('/register', RegisterController::class)->only('create', 'store', 'edit', 'update', 'destroy');

    Route::resource('/cliente', ClienteController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');

    Route::resource('/descricao', DescricaoController::class)->only('store', 'update');

    Route::resource('/equipe', EquipeController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');

    Route::resource('/sistema', SistemaController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');

    Route::resource('/solicitante', SolicitanteController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');

    Route::resource('/status', StatusController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');

    Route::resource('/tag', TagController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');

    Route::resource('/ticket', TicketController::class)->only('index', 'create', 'store', 'edit', 'update');
 
    Route::resource('/urgencias', UrgenciaController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');
    
    Route::resource('/user', UserController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');

});

