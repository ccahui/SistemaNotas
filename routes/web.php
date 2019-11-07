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


/*ASIGNAR CURSO PROFESOR */
Route::get('/profesores/asignarCurso','ProfesorController@asignarCurso');
Route::get('/profesores/asignarCurso/{id}','ProfesorController@asignarDetalle');

/* PARA EXPORT e importar EXCEL*/
Route::get('/exportarNotas/profesor/{id}','ExportNotasController@exportNotasExcel');
Route::post('/importarNotas/profesor/{id}','ImportController@notas');

/*enviar comunicado*/
Route::post('/profesores/enviarcomunicado','ProfesorController@enviarComunicado');

Route::get('/login','AuthGoogle\LoginController@login');
Route::get('/login/callback','AuthGoogle\LoginController@callback');
Route::get('/logout','AuthGoogle\LoginController@logout');

Route::get('/alumnos/search','AlumnoController@search');
Route::get('/profesores/search','ProfesorController@search');
Route::get('/cursos/search','CursoController@search');


/*GESTION DE NOTAS */
Route::get('/notas/alumno/{id}','NotasController@show');
Route::get('/notas/profesor/{id}','NotasController@showNotasProfesor');
Route::get('/notas/profesor/{id}/detalle','NotasController@showNotasProfesorDetalle');
Route::put('/notas','NotasController@storeNotas');


/* CRUDs */
Route::resource('alumnos', 'AlumnoController');
Route::resource('profesores', 'ProfesorController');
Route::resource('cursos', 'CursoController');
Route::resource('salones', 'SalonController');
