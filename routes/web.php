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
Route::get('/profesores/asignarCurso','ProfesorController@asignarCurso')->middleware('admin');
Route::get('/profesores/asignarCurso/{id}','ProfesorController@asignarDetalle')->middleware('admin');
Route::post('/profesores/asignarCurso','ProfesorController@storeAsignarCurso')->middleware('admin');



/* PARA EXPORT e importar EXCEL*/
Route::get('/exportarNotas/profesor/{id}','ExportNotasController@exportNotasExcel')->middleware('profesor');
Route::post('/importarNotas/profesor/{id}','ImportController@notas')->middleware('profesor');

/*enviar comunicado*/
Route::post('/profesores/enviarcomunicado','ProfesorController@enviarComunicado')->middleware('profesor');

/*ranking*/
Route::get('/notas/ranking','NotasController@ranking')->middleware('admin');

Route::get('/login','AuthGoogle\LoginController@login');
Route::get('/login/callback','AuthGoogle\LoginController@callback');
Route::get('/logout','AuthGoogle\LoginController@logout');

Route::get('/alumnos/search','AlumnoController@search')->middleware('admin');
Route::get('/profesores/search','ProfesorController@search')->middleware('admin');
Route::get('/cursos/search','CursoController@search')->middleware('admin');


/*GESTION DE NOTAS */
Route::get('/notas/alumno','NotasController@show')->middleware('alumno');
Route::get('/notas/profesor','NotasController@showNotasProfesor')->middleware('profesor');
Route::get('/notas/profesor/detalle','NotasController@showNotasProfesorDetalle')->middleware('profesor');;;
Route::put('/notas','NotasController@storeNotas')->middleware('profesor');


/* CRUDs */
Route::resource('alumnos', 'AlumnoController')->middleware('admin');
Route::resource('profesores', 'ProfesorController')->middleware('admin');
Route::resource('cursos', 'CursoController')->middleware('admin');
Route::resource('salones', 'SalonController')->middleware('admin');
