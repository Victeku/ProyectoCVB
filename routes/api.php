<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('usuarios', 'UsuariosController');
Route::resource('productos', 'ProductosController');
Route::resource('estados', 'EstadosController');
Route::resource('municipios', 'MunicipiosController');
Route::resource('pagos', 'PagoController');
Route::resource('almacens', 'AlmacenController');
Route::resource('tickets', 'TicketsController');
