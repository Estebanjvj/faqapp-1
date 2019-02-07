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
    $secciones = \App\Seccion::all();
    return view('welcome', compact('secciones'));
    //return view('welcome');
})->name('welcome');

//Secciones
Route::resource('secciones','SeccionController')->except(['index']);
//Preguntas se hacen los routes individuales porque son personalizados
    Route::get('pregunta/{seccion}/create','PreguntaController@create')->name('pregunta.create');
    Route::resource('preguntas','PreguntaController')->except(['index','create','show']);
//Soluciones se hacen los routes individuales porque son personalizados
    Route::get('solucion/{pregunta}/create','RespuestaController@create')->name('solucion.create');
    Route::resource('soluciones','RespuestaController')->except(['index','create']);