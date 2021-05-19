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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// rotas padroes 
Route::resources([
    'requirements' => 'RequisitoController',
    'systems' => 'SistemaController',
    'treatments' => 'TratamentoController',
    'versions' => 'VersaoController',
    'settings' => 'ConfigController',
    'users' => 'UsuarioController'
]);



// rota de requisito
Route::post('/requirements/consulta', 'RequisitoController@consultarPorParametro')->name('cunnsulta_parametro_requisito');
Route::post('requirements/consult/', 'RequisitoController@consultarPorParametro')->name('cunnsulta_parametro_requisito');
// rota de sistema
Route::post('/systems/consulta', 'SistemaController@consultarPorParametro')->name('cunnsulta_parametro_sistema');
// rota de versao
Route::post('/versions/consuta', 'VersaoController@consultarPorParametro')->name('cunnsulta_parametro_versao');

// rota de auterar a senah de usuario
Route::get('/usres/updatepassword/tela', 'UsuarioController@telaSenha')->name('tela_senha');
Route::post('/usres/updatepassword/{id}', 'UsuarioController@updatePassword')->name('update.password');
Route::post('/users/consulta', 'UsuarioController@consultarPorParametro')->name('cunnsulta_parametro_usuario');
Route::post('/users/ativar/{id}', 'UsuarioController@ativarUsuario')->name('ativar_usuario');
Route::any('/users/consulta/inativo/{id}', 'UsuarioController@consultarUsuarioInativo')->name('cunnsulta_usuario_inativo');

// rota de tratamento, que mostra os tratamentos
Route::get('/treatments/status/{situacao}', 'TratamentoController@listarTratamentos')->name('ver_tratamento');
Route::post('treatments/tratamentos', 'TratamentoController@consultarPorParametro')->name('cunnsulta_parametro');
