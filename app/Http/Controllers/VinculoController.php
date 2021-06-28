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
    {   // administrador ver tudo
        if (Gate::allows('super_admin', Auth::user())) {
            // recebe os dados
            $usuarios = VinculoService::listarUsuariosVinculados();
            return view('paginas.listas.ver_vinculo_empresa', compact('usuarios'));
            // administrador ver todos sem o super
        } else if (Gate::allows('administrador', Auth::user())) {
            // recebe os dados
            $usuarios = VinculoService::listarUsuariosVinculadosSemSuper();
            return view('paginas.listas.ver_vinculo_empresa', compact('usuarios'));
        // ver somente gestor , desenvolvedor e suporte
        }else if(Gate::allows('administrador_gestor', Auth::user())){
            // recebe os dados
            $usuarios = VinculoService::listarUsuariosVinculadosSemSuperSemAdministrador();
            return view('paginas.listas.ver_vinculo_empresa', compact('usuarios'));
            // caso seja desenvolvedor e suporte
        }else if (Gate::allows('desenvolvedor', Auth::user()) ||Gate::allows('suporte', Auth::user())){
             // recebe os dados
             $usuarios = VinculoService::listarUsuariosVinculadosPorDesenvolvedorEUsuario(Auth::user()->id);
             return view('paginas.listas.ver_vinculo_empresa', compact('usuarios'));

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
        if (Gate::allows('super_admin', Auth::user())) {
            // recebe os dados
            $usuarios = UsuarioService::listar();
            $empresas = EmpresaService::listarTodas();
            return view('paginas.cadastros.vincular_usuario_empresa', compact(
                'usuarios',
                'empresas'
            ));
            // se o perfil for somente administrador ou administrador gestor, ele nao listara o super
        } else if (Gate::allows('administrador', Auth::user())){
            $usuarios = UsuarioService::listarTodosSemSuper();
            $empresas = EmpresaService::listarTodas();
            return view('paginas.cadastros.vincular_usuario_empresa', compact(
                'usuarios',
                'empresas'
            ));
        }else if(Gate::allows('administrador_gestor', Auth::user())) {
            $usuarios = UsuarioService::listarTodosSemSuperSemAdminsitrador();
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
            } else { // retorna o erro
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
        // configurando as permissoes
        if (
            Gate::allows('super_admin', Auth::user()) ||
            Gate::allows('administrador', Auth::user()) ||
            Gate::allows('administrador_gestor', Auth::user())
        ) {
            // faz a consulta
            $vinculo = VinculoService::consultar($id);
            if (!empty($vinculo)) {
                // traz a empresa tambem
                $empresa = EmpresaService::consultar($vinculo->id_empresa);
                if (!empty($empresa)) {
                    // coloca as informações na view
                    return view('paginas.decisoes.apagar_vinculo', compact(
                        'empresa',
                        'vinculo'
                    ));
                } else {
                    return redirect()->back()->with('erro', 'Empresa não encontrada!');
                }
            } else {
                return redirect()->back()->with('erro', 'Vinculo não encontrado!');
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
    public function edit($id)
    {
        if (
            Gate::allows('super_admin', Auth::user()) ||
            Gate::allows('administrador', Auth::user()) ||
            Gate::allows('administrador_gestor', Auth::user())
        ) {
            // verifica se foi passado algum id
            if (isset($id)) {
                // consulta o usuario
                $usuario = UsuarioService::consultar($id);
                // verifica se nao esta vezio
                if (!empty($usuario)) {
                    // consulto as empresas
                    $empresas = VinculoService::detalhesEmpresaVinculo($id);
                    // verifica se nao esta vazio
                    if (!empty($empresas)) {
                        // retorna as infotmacoes
                        return view('paginas.listas.detalhes_vinculo', compact(
                            'usuario',
                            'empresas'
                        ));
                    } else {
                        return redirect()->back()->with('erro', 'Empresa nao Encontrada !');
                    }
                } else {
                    return redirect()->back()->with('erro', 'Erro ao buscar usuario !');
                }
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
        if (
            Gate::allows('super_admin', Auth::user()) ||
            Gate::allows('administrador', Auth::user()) ||
            Gate::allows('administrador_gestor', Auth::user())
        ){
            // consulta as informações
            $vinculo = VinculoService::consultar($id);
            if (!empty($vinculo)) {
                VinculoService::deletar($vinculo);
                return redirect()->action('VinculoController@index')
                    ->with('mensagem', 'Vinculo desfeito com sucesso!');
            } else {
                return redirect()->back()->with('erro', 'Vinculo não encontrado!');
            }

        }else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }
}
