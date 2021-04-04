<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioFormRequest;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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
            $users = User::listar();
            return view('paginas.listas.usuario_lista', compact('users'));
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
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

            $form = [
                'name' => $nome,
                'email' => $email,
                'perfil_acesso' => $perfil_acesso,
                'password' => Hash::make($password),
                'excluido' => 1
            ];

            User::inserir($form);
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
            $usuario = User::find($id);
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
            $usuario = User::find($id);
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
    public function update(Request $request, $id)
    {
        if (Gate::allows('administrador', Auth::user())) {
            $usuario = User::find($id);
            if (!empty($usuario)) {
                $usuario->id = $id;
                $usuario->name = $request->input('name');
                $usuario->email = $request->input('email');
                $usuario->perfil_acesso = $request->input('perfil_acesso');

                User::atualizar($usuario);
                return redirect()->action('UsuarioController@index')
                    ->with('mensagem', 'Usuário Atualizado com sucesso!');
            } else {
                return redirect()->back()->with('erro', 'Erro ao atualizar o Usuário!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $usuario = User::find($id);

        print_r($usuario);
        dd();
        if (!empty($usuario)) {
            $usuario->password = Hash::make($request->input('password'));
            User::atualizar($usuario);
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
            $usuario = User::find($id);
            if (!empty($usuario)) {

                $usuario->excluido = 0;
                User::deletar($usuario);
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
