<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\SugerenciaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get("/inicio", [BlogController::class, "inicio"]);
Route::get("/biografia", [BlogController::class, "biografia"]);
Route::get("/publicaciones", [BlogController::class, "publicaciones"]);
Route::get("/sugerencias", [BlogController::class, "sugerencias"]);

Route::get("/libro", [LibroController::class, "libro"]);
Route::post("/comprar-libro", [LibroController::class, "comprar_libro"]);

Route::post("/validar-login", [LoginController::class, "validar_login"]);
Route::post("/validar-login-ajax", [LoginController::class, "validar_login_ajax"]);
Route::get("/cerrar-sesion", [LoginController::class, "cerrar_sesion"]);

Route::post("/validar-registro", [RegisterController::class, "validar_registro"]);
Route::post("/validar-registro-ajax", [RegisterController::class, "validar_registro_ajax"]);

Route::get("/insertar-entrada", [EntradaController::class, "insertar_entrada"]);

Route::post("/enviar-sugerencia", [SugerenciaController::class, "enviar_sugerencia"]);