<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\{PesquisaFormRequest, UsuarioFormRequest, ValidaSenhaFormRequest, UsuarioAlteracaoFormRequest};
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\UsuarioService;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // lista as informaçoes , colcoando na tela inicial
    public function index()
    {
        if (Gate::allows('administrador', Auth::user())) {
            $users = UsuarioService::listar();
            return view('paginas.listas.usuario_lista', compact('users'));
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }

    // metodo que faz a busca do tratamento que é passodo por parametro
    public function consultarPorParametro(PesquisaFormRequest $request)
    {
    }

    /*
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // clama a tela de inicia o cadastro
    public function create()
    {
        if (Gate::allows('administrador', Auth::user())) {
            //chama a tela de cadastro
            return view('auth.register');
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }

    public function telaSenha()
    {
        return view('paginas.alteracoes.alterar_senha');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // cadastra as informaçoes
    public function store(UsuarioFormRequest $request)
    {
        if (Gate::allows('administrador', Auth::user())) {
            $nome = $request->input('name');
            $email = $request->input('email');
            $perfil_acesso = $request->input('perfil_acesso');
            $password = $request->input('password');
            // caso seja o primeir cadastro, como nao tem id cadastro ,
            //ele vai inserir o numero 1 para registro
            // pois se tem usuario logado , o primeiro cadastro sera 1
            if (empty(auth()->user()->id)) {
                $id_usuario_ressponsavel = 1;
            } else {
                //se nao ele vai receber o id do usuario que esta logado , ou seja responsavel
                $id_usuario_ressponsavel = auth()->user()->id;
            }

            $form = [
                'name' => $nome,
                'email' => $email,
                'perfil_acesso' => $perfil_acesso,
                'password' => Hash::make($password),
                'id_usuario_ressponsavel' => $id_usuario_ressponsavel
            ];

            UsuarioService::inserir($form);
            return redirect()->action('UsuarioController@index')
                ->with('mensagem', 'Usuário cadastrado com sucesso!');
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // consulta as informaçoes
    public function show($id)
    {
        if (Gate::allows('administrador', Auth::user())) {
            // faz a consulta
            $usuario = UsuarioService::consultar($id);
            if (!empty($usuario)) {
                return view('paginas.decisoes.apagar_usuario', compact('usuario'));
            } else {
                return redirect()->back()->with('erro', 'Usuário não encontrado!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // consulta as informaçoes para a edição
    public function edit($id)
    {
        if (Gate::allows('administrador', Auth::user())) {
            // faz a consulta
            $usuario = UsuarioService::consultar($id);
            if (!empty($usuario)) {
                return view('paginas.alteracoes.usuario_altera', compact('usuario'));
            } else {
                return redirect()->back()->with('erro', 'Usuário não encontrado!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // atualiza as informaçoes
    public function update(UsuarioAlteracaoFormRequest $request, $id)
    {
        if (Gate::allows('administrador', Auth::user())) {
            $usuario = UsuarioService::consultar($id);
            if (!empty($usuario)) {
                $usuario->id = $id;
                $usuario->name = $request->input('name');
                $usuario->email = $request->input('email');
                $usuario->perfil_acesso = $request->input('perfil_acesso');
                $usuario->id_usuario_ressponsavel = auth()->user()->id;

                UsuarioService::atualizar($usuario);
                return redirect()->action('UsuarioController@index')
                    ->with('mensagem', 'Usuário Atualizado com sucesso!');
            } else {
                return redirect()->back()->with('erro', 'Erro ao atualizar o Usuário!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }

    public function updatePassword(ValidaSenhaFormRequest $request, $id)
    {
        $usuario = UsuarioService::consultar($id);
        if (!empty($usuario)) {
            $usuario->id_usuario_ressponsavel = auth()->user()->id;
            $usuario->password = Hash::make($request->input('password'));
            UsuarioService::atualizar($usuario);
            return redirect()->action('HomeController@index')
                ->with('mensagem', 'Senha Atualizado com sucesso!');
        } else {
            return redirect()->action('HomeController@index')
                ->with('erro', 'Erro ao atualizar a Senha!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // realiza a deleçao logica
    public function destroy($id)
    {
        if (Gate::allows('administrador', Auth::user())) {
            $usuario = UsuarioService::consultar($id);
            if (!empty($usuario)) {
                $usuario->id_usuario_ressponsavel = auth()->user()->id;
                UsuarioService::deletar($usuario);
                return redirect()->action('UsuarioController@index')
                    ->with('mensagem', 'Usuário Excluído com sucesso!');
            } else {
                return redirect()->back()->with('erro', 'Usuario não encontrado!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }
}
