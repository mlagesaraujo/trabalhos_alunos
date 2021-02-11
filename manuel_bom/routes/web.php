<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('welcome');
});

//normal
route::get('/livros', 'App\http\Controllers\LivrosController@index')->name('livros.index');

route::get('/autores', 'App\http\Controllers\AutoresController@index')->name('autores.index');

route::get('/editoras', 'App\http\Controllers\EditorasController@index')->name('editoras.index');

route::get('/generos', 'App\http\Controllers\GenerosController@index')->name('generos.index');

route::get('/livros/{id}/show', 'App\http\Controllers\LivrosController@show')->name('livros.show');

route::get('/generos/{id}/show', 'App\http\Controllers\GenerosController@show')->name('generos.show');

route::get('/editoras/{id}/show', 'App\http\Controllers\EditorasController@show')->name('editoras.show');

route::get('/autores/{id}/show', 'App\http\Controllers\AutoresController@show')->name('autores.show');


//Create
route::get('/livros/create', 'App\http\Controllers\LivrosController@create')->name('livros.create')->middleware('auth');

route::get('/generos/create', 'App\http\Controllers\GenerosController@create')->name('generos.create')->middleware('auth');

route::get('/editoras/create', 'App\http\Controllers\EditorasController@create')->name('editoras.create')->middleware('auth');

route::get('/autores/create', 'App\http\Controllers\AutoresController@create')->name('autores.create')->middleware('auth');



//Store
route::post('/livros', 'App\http\Controllers\LivrosController@store')->name('livros.store')->middleware('auth');

route::post('/generos', 'App\http\Controllers\GenerosController@store')->name('generos.store')->middleware('auth');

route::post('/editoras', 'App\http\Controllers\EditorasController@store')->name('editoras.store')->middleware('auth');

route::post('/autores', 'App\http\Controllers\AutoresController@store')->name('autores.store')->middleware('auth');



//Update & patch
route::get('/livros/{id}/edit', 'App\http\Controllers\LivrosController@edit')->name('livros.edit')->middleware('auth');

route::patch('/livros', 'App\http\Controllers\LivrosController@update')->name('livros.update')->middleware('auth');

route::get('/autores/{id}/edit', 'App\http\Controllers\AutoresController@edit')->name('autores.edit')->middleware('auth');

route::patch('/autores', 'App\http\Controllers\AutoresController@update')->name('autores.update')->middleware('auth');

route::get('/editoras/{id}/edit', 'App\http\Controllers\EditorasController@edit')->name('editoras.edit')->middleware('auth');

route::patch('/editoras', 'App\http\Controllers\EditorasController@update')->name('editoras.update')->middleware('auth');

route::get('/generos/{id}/edit', 'App\http\Controllers\GenerosController@edit')->name('generos.edit')->middleware('auth');

route::patch('/generos', 'App\http\Controllers\GenerosController@update')->name('generos.update')->middleware('auth');


//Delete

route::get('/livros/{id}/delete', 'App\http\Controllers\LivrosController@delete')->name('livros.delete')->middleware('auth');

route::delete('/livros', 'App\http\Controllers\LivrosController@destroy')->name('livros.destroy')->middleware('auth');

route::get('/generos/{id}/delete', 'App\http\Controllers\GenerosController@delete')->name('generos.delete')->middleware('auth');

route::delete('/generos', 'App\http\Controllers\GenerosController@destroy')->name('generos.destroy')->middleware('auth');

route::get('/editoras/{id}/delete', 'App\http\Controllers\EditorasController@delete')->name('editoras.delete')->middleware('auth');

route::delete('/editoras', 'App\http\Controllers\EditorasController@destroy')->name('editoras.destroy')->middleware('auth');

route::get('/autores/{id}/delete', 'App\http\Controllers\autoresController@delete')->name('autores.delete')->middleware('auth');

route::delete('/autores', 'App\http\Controllers\AutoresController@destroy')->name('autores.destroy')->middleware('auth');



Auth::routes();



//login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
