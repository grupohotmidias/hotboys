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
// Teste


// Home
Route::get('/home', 'DashboardController@index')->name('home.index');


// Noticia

Route::get('/noticias' , 'NoticiaController@index')->name('noticia.index');
Route::get('/noticia/cadastro' , 'NoticiaController@create')->name('noticia.create');
Route::post('/noticia/cadastrar' , 'NoticiaController@store')->name('noticia.store');
Route::get('/noticia/{id}/edit' , 'NoticiaController@show')->name('noticia.show');
Route::post('/noticia/{id}/editar' , 'NoticiaController@index')->name('noticia.update');

// Dashboard
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

// Modelo

Route::get('/modelos' , 'ModeloController@index')->name('modelo.index');
Route::get('/modelo/{id}/perfil' , 'ModeloController@show')->name('modelo.show');
Route::get('/modelo/cadastro' , 'ModeloController@create')->name('modelo.create');
Route::post('/modelo/cadastrar' , 'ModeloController@store')->name('modelo.store');
Route::get('/modelo/{id}/edit' , 'ModeloController@edit')->name('modelo.edit');
Route::any('/modelo/{id}/editar' , 'ModeloController@update')->name('modelo.update');
Route::get('/modelo/{id}/deletar' , 'ModeloController@destroy')->name('modelo.destroy');
// Cena

Route::get('/cenas' , 'CenaController@index')->name('cena.index');
Route::get('/cena/cadastro' , 'CenaController@create')->name('cena.create');
Route::post('/cena/cadastrar' , 'CenaController@store')->name('cena.store');
Route::get('/cena/{id}/edit' , 'CenaController@edit')->name('cena.show');
Route::any('/cena/{id}/editar' , 'CenaController@update')->name('cena.update');
Route::get('/cena/{id}/deletar' , 'CenaController@destroy')->name('cena.destroy');

// Autenticação


Auth::routes();
