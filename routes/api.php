<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ProductoController;

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



Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


 Route::post('/productos', [ProductoController::class, 'store']);      // Crear
Route::get('/productos', [ProductoController::class, 'index']);       // Listar
Route::get('/productos/{id}', [ProductoController::class, 'show']);   // Mostrar uno
Route::put('/productos/{id}', [ProductoController::class, 'update']); // Actualizar
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']); // Eliminar
