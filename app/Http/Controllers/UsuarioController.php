<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $users = User::listar();
        return view('paginas.listas.usuario_lista', compact('users'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // clama a tela de inicia o cadastro
    public function create()
    {
        //chama a tela de cadastro
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // cadastra as informaçoes
    public function store(Request $request)
    {
        $nome = $request->input('name');
        $email = $request->input('email');
        $perfil_acesso = $request->input('perfil_acesso');
        $password = $request->input('password');

        $form = [
            'name' => $nome ,
            'email' => $email,
            'perfil_acesso'=>$perfil_acesso,
            'password' => Hash::make($password),
            'excluido' => 1
        ]; 

        User::inserir($form);
        return redirect()->action('UsuarioController@index')
            ->with('mensagem', 'Usuário cadastrado com sucesso!');
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
        // faz a consulta 
        $usuario = User::find($id);
        if(!empty($usuario)){
            return view('paginas.decisoes.apagar_usuario', compact('usuario'));
        }else{
            return redirect()->back()->with('erro', 'Usuário não encontrado!');
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
        // faz a consulta 
        $usuario = User::find($id);
        if(!empty($usuario)){
            return view('paginas.alteracoes.usuario_altera', compact('usuario'));
        }else{
            return redirect()->back()->with('erro', 'Usuário não encontrado!');
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
        $usuario = User::find($id);
        if(!empty($usuario)){
            $usuario->id = $id;
            $usuario->name =$request->input('name');
            $usuario->email =$request->input('email');
            $usuario->perfil_acesso =$request->input('perfil_acesso');

            User::atualizar($usuario);
            return redirect()->action('UsuarioController@index')
            ->with('mensagem', 'Usuário Atualizado com sucesso!');
        }else{
            return redirect()->back()->with('erro', 'Erro ao atualizar o Usuário!');
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
        $usuario = User::find($id);
        if(!empty($usuario)){
           
            $usuario->excluido = 0;
            User::deletar($usuario);
            return redirect()->action('UsuarioController@index')
                ->with('mensagem', 'Usuário Excluído com sucesso!');
            
        }else {
            return redirect()->back()->with('erro', 'Usuario não encontrado!');
        }
    }
}
