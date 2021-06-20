<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
    'requisitos' => 'RequisitoController',
    'sistemas' => 'SistemaController',
    'chamados' => 'TratamentoController',
    'versoes' => 'VersaoController',
    'configuracoes' => 'ConfigController',
    'usuarios' => 'UsuarioController',
    'empresas' =>'EmpresaController',
    'vinculos' =>'EnderecoController',
]);

    // rota de requisito
    Route::post('/requisitos/consulta', 'RequisitoController@consultarPorParametro')->name('cunnsulta_parametro_requisito');

    // rota de sistema
    Route::post('/sistemas/consulta', 'SistemaController@consultarPorParametro')->name('cunnsulta_parametro_sistema');
    // rota de versao
    Route::post('/versoes/consuta', 'VersaoController@consultarPorParametro')->name('cunnsulta_parametro_versao');

    // rota de auterar a senah de usuario
    Route::get('/usuarios/atualizasenha/tela', 'UsuarioController@telaSenha')->name('tela_senha');
    Route::post('/usuarios/atualizasenha/{id}', 'UsuarioController@updatePassword')->name('update.password');
    Route::post('/usuarios/consulta', 'UsuarioController@consultarPorParametro')->name('cunnsulta_parametro_usuario');
    Route::post('/usuarios/ativar/{id}', 'UsuarioController@ativarUsuario')->name('ativar_usuario');
    Route::any('/usuarios/consulta/inativo/{id}', 'UsuarioController@consultarUsuarioInativo')->name('cunnsulta_usuario_inativo');

    // rota de tratamento, que mostra os tratamentos
    Route::get('/chamados/status/{situacao}', 'TratamentoController@listarTratamentos')->name('ver_tratamento');
    Route::post('chamados/tratamentos', 'TratamentoController@consultarPorParametro')->name('cunnsulta_parametro');
