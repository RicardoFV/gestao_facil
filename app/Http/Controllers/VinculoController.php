<?php

namespace App\Http\Controllers;

use App\Http\Requests\VinculoFormulario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\{EmpresaService, UsuarioService, VinculoService};
use App\Vinculo;

class VinculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('super_admin', Auth::user())) {
            // recebe os dados
            $usuarios = UsuarioService::listarTodos();
            $empresas = EmpresaService::listarTodas();
            return view('paginas.cadastros.vincular_usuario_empresa', compact(
                'usuarios',
                'empresas'
            ));
            // se o perfil for somente administrador ou administrador gestor, ele nao listara o super
        } else if (Gate::allows('administrador', Auth::user()) || Gate::allows('administrador_gestor', Auth::user())) {

            // recebe os dados
            $usuarios = UsuarioService::listarTodosSemSuper();
            $empresas = EmpresaService::listarTodas();
            return view('paginas.cadastros.vincular_usuario_empresa', compact(
                'usuarios',
                'empresas'
            ));
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (
            Gate::allows('super_admin', Auth::user()) ||
            Gate::allows('administrador', Auth::user()) ||
            Gate::allows('administrador_gestor', Auth::user())
        ) {
            //chama a tela de cadastro
            return view('paginas.cadastros.vincular_usuario_empresa');
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (
            Gate::allows('super_admin', Auth::user()) ||
            Gate::allows('administrador', Auth::user()) ||
            Gate::allows('administrador_gestor', Auth::user())
        ) {
            // realiza a consulta, para ver se tem vinculo
            $contador = VinculoService::verificarVinculo(
                $request->input('id_gestor'),
                $request->input('id_empresa')
            );
            // se contador igual a zero , significa que nao tem vinculo
            if ($contador === 0) {
                // cadastra o vinculo
                VinculoService::inserir($request->all());
                // retorna para a listagem
                return redirect()->back()
                    ->with('mensagem', 'Vinculo realizado com sucesso!');
            }else{// retorna o erro
                return redirect()->back()
                ->with('erro', 'Voce já esta vinculado, não pode Vincular mais de uma vez a mesma Empresa');
            }
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
