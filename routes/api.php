<?php

use App\Http\Controllers\CuentasBancariasController;
use App\Http\Controllers\MovimientosController;
use App\Http\Controllers\UserController;
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

// Ruta para obtener todos los ingresos
Route::get('/movimientos/ingresos', [MovimientosController::class, 'indexIngresos']);

// Ruta para obtener todos los gastos
Route::get('/movimientos/gastos', [MovimientosController::class, 'indexGastos']);

// Ruta de recursos para todos los movimientos
Route::apiResource('/movimientos', MovimientosController::class);

Route::apiResource('/users', UserController::class);

Route::apiResource('/cuentasbancarias', CuentasBancariasController::class);
