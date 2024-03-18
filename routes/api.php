<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\PerfilController;

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

 
// Ruta para registrar usuarios
Route::post('/register', [AuthController::class, 'register']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Ruta para el inicio de sesión
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout']);
// Ruta para perfiles
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/perfil', [PerfilController::class, 'show'])->name('perfil.show');
    Route::put('/perfil', [PerfilController::class, 'update']);
});



Route::middleware('auth:sanctum')->post('/compra', [ComprasController::class, 'crearCompra']);

Route::post('/actualizar_estado_compra', [ComprasController::class, 'actualizarEstadoCompra']);
