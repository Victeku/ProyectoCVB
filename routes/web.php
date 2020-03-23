<?php

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
    return view('welcome');
});

Route::get('/altausuario','UsuariosController@altausuario')->name('altausuario');
Route::POST('/guardarusuario','UsuariosController@guardarusuario')->name('guardarusuario');

Route::get('/modificausuario/{id_usuario}','UsuariosController@modificausuario')->name('modificausuario');
Route::get('/eliminauser/{id_usuario}','UsuariosController@eliminauser')->name('eliminauser');
Route::get('/restableceruser/{id_usuario}','UsuariosController@restableceruser')->name('restableceruser');
Route::POST('/editausuario','UsuariosController@editausuario')->name('editausuario');

Route::get('/formularioxd','ProductosController@formulario');
Route::post('/guardar','ProductosController@guardar');

Route::get('/reporteusuarios','UsuariosController@reporteusuarios')->name('reporteusuarios');

Route::get('/reporteproductos','ProductosController@reporteproductos')->name('reporteproductos');
Route::get('/vista','UsuariosController@vista')->name('vista');
Route::get('/indexadmin','vista@indexadmin')->name('indexadmin');

Route::get('/login','AccesoSistema@login')->name('login');
Route::POST('/valida','AccesoSistema@valida')->name('valida');
Route::get('/index','AccesoSistema@index')->name('index');