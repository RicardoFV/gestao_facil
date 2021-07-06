<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\{RequisitoFormRequest, PesquisaFormRequest};
use Illuminate\Support\Facades\Auth;
use App\Http\Services\{RequisitoService, EmpresaService};

class RequisitoController extends Controller
{
    public function __construct()
    {
        // permite acesso somente logado
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // lista as informaçoes , colcoando na tela inicial
    public function index()
    {
        $requisitos = RequisitoService::listar();
        return view('paginas.listas.requisito_lista', compact('requisitos'));
    }
    // metodo que faz a busca do tratamento que é passodo por parametro
    public function consultarPorParametro(PesquisaFormRequest $request)
    {
        // recebe o tipo de pesquisa
        $valor = $request->input('tipo_pesquisa');
        // verifica se e sistema
        if ($valor === "nome") {
            $requisito = RequisitoService::consultarPorNomeRequisito($request->input('pesquisa'));

            dd($requisito);
            return view('paginas.listas.requisito_lista')->with('requisito', $requisito);
            // veriifica se é usuario
        } else {
            return $this->index();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // clama a tela de inicia o cadastro
    public function create()
    {
        // configurando as permissoes
        if (
            Gate::allows('super_admin', Auth::user())
        ) {
            $empresas = EmpresaService::listarTodas();
            return view('paginas.cadastros.requisito', compact('empresas'));
        } else if (
            Gate::allows('administrador', Auth::user()) ||
            Gate::allows('administrador_gestor', Auth::user()) ||
            Gate::allows('desenvolvedor', Auth::user())
        ) {
            $empresas = EmpresaService::listarTodasPorResponsavel(Auth::user()->id);
            return view('paginas.cadastros.requisito', compact('empresas'));
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

    // cadastra as informaçoes
    public function store(RequisitoFormRequest $request)
    {
        // configurando as permissoes
        if (
            Gate::allows('super_admin', Auth::user()) ||
            Gate::allows('administrador', Auth::user()) ||
            Gate::allows('administrador_gestor', Auth::user()) ||
            Gate::allows('desenvolvedor', Auth::user())
        ) {
            // recebe as informaçoes
            $nome = $request->input('nome');
            $tipo_requisito = $request->input('tipo_requisito');
            $descricao = $request->input('descricao');
            $id_empresa = $request->input('id_empresa');
            $id_usuario = Auth::user()->id;
            // passa para um array
            $form = [
                'nome' => $nome,
                'tipo_requisito' => $tipo_requisito,
                'descricao' => $descricao,
                'id_usuario' => $id_usuario,
                'id_empresa' => $id_empresa,
                'excluido' => 1
            ];
            // executa a inserçao
            RequisitoService::inserir($form);
            // retorna a mensagem de sucesso
            return redirect()->action('RequisitoController@index')
                ->with('mensagem', 'Requisito cadastrado com sucesso!');
        } else {
            // em caso de erro
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
        // configurando as permissoes
        if (
            Gate::allows('super_admin', Auth::user()) ||
            Gate::allows('administrador', Auth::user()) ||
            Gate::allows('administrador_gestor', Auth::user()) ||
            Gate::allows('desenvolvedor', Auth::user())
        ) {
            // faz a consulta
            $requisito = RequisitoService::consultar($id);
            if (!empty($requisito)) {
                return view('paginas.decisoes.apagar_requisito', compact('requisito'));
            } else {
                return redirect()->back()->with('erro', 'Requisito não encontrado!');
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
        // configurando as permissoes
        if (
            Gate::allows('super_admin', Auth::user()) ||
            Gate::allows('administrador', Auth::user()) ||
            Gate::allows('administrador_gestor', Auth::user()) ||
            Gate::allows('desenvolvedor', Auth::user())
        ) {
            // faz a consulta
            $requisito = RequisitoService::consultar($id);
            if (!empty($requisito)) {
                return view('paginas.alteracoes.requisito_altera', compact('requisito'));
            } else {
                return redirect()->back()->with('erro', 'Requisito não encontrado!');
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
    public function update(RequisitoFormRequest $request, $id)
    {
        // configurando as permissoes
        if (
            Gate::allows('super_admin', Auth::user()) ||
            Gate::allows('administrador', Auth::user()) ||
            Gate::allows('administrador_gestor', Auth::user()) ||
            Gate::allows('desenvolvedor', Auth::user())
        ) {
            // consulta as informaçoes
            $requisito = RequisitoService::consultar($id);
            // caso nao esteja vazio
            if (!empty($requisito)) {
                // recebe as novas informaçoes
                $requisito->id = $id;
                $requisito->nome = $request->input('nome');
                $requisito->tipo_requisito = $request->input('tipo_requisito');
                $requisito->descricao = $request->input('descricao');
                $requisito->id_usuario = Auth::user()->id;
                // atualiza os dados
                RequisitoService::atualizar($requisito);
                // apresenta a mensagem de sucesso
                return redirect()->action('RequisitoController@index')
                    ->with('mensagem', 'Requisito Atualizado com sucesso!');
            } else {
                // caso de erro , o sistema informa que nao foi possivel realizar a atividade
                return redirect()->back()->with('erro', 'Erro ao atualizar o Requisito!');
            }
        } else {
            // em caso de restriçao de acesso , sera encaminhada para uma tela informando a restriçao
            return view('paginas.restricao_acesso.restricao_acesso');
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
        // configurando as permissoes
        if (
            Gate::allows('super_admin', Auth::user()) ||
            Gate::allows('administrador', Auth::user()) ||
            Gate::allows('administrador_gestor', Auth::user())
        ) {
            // consulta as informaçoes
            $requisito = RequisitoService::consultar($id);
            // em caso de nao vazio
            if (!empty($requisito)) {
                // consulta se tem tratamento
                //$tratamento = RequisitoService::consultarTratamentoPorRequisito($requisito->id);
                // caso de nao vazio
                // if (!empty($tratamento)) {
                // sera informado que nao pode ser removido
                //     return redirect()->action('RequisitoController@index')
                //       ->with('erro', 'Requisito não pode ser removido');
                //} else {
                // atualiza as informaçoes
                $requisito->excluido = 0;
                $requisito->id_usuario = Auth::user()->id;
                // faz uma deleçao logica
                RequisitoService::deletar($requisito);
                // retorna a mensagem de erro
                return redirect()->action('RequisitoController@index')
                    ->with('mensagem', 'Requisito Excluído com sucesso!');
                //}
            } else {
                return redirect()->back()->with('erro', 'Requisito não encontrado!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }
}
