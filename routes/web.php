<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'requirements' => 'RequisitoController',
    'systems' => 'SistemaController',
    'treatments' => 'TratamentoController',
    'versions' => 'VersaoController',
    'settings' => 'ConfigController',
    'users' => 'UsuarioController'
]);

// rota de auterar a senah de usuario
Route::get('/usres/updatepassword/tela', 'UsuarioController@telaSenha')->name('tela_senha');
Route::post('/usres/updatepassword/{id}', 'UsuarioController@updatePassword')->name('update.password');

// rota de tratamento, que mostra os tratamentos
Route::get('/treatments/status/{situacao}', 'TratamentoController@listarTratamentos')->name('ver_tratamento');
Auth::routes();
