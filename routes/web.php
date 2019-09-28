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

Route::get('/alumnos/search','AlumnoController@search');
Route::get('/profesores/search','ProfesorController@search');
Route::get('/cursos/search','CursoController@search');

Route::get('/notas/{id}','NotasController@show');

Route::resource('alumnos', 'AlumnoController');
Route::resource('profesores', 'ProfesorController');
Route::resource('cursos', 'CursoController');
Route::resource('salones', 'SalonController');


