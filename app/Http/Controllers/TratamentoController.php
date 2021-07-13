<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\{TratamentoFormReuest, PesquisaFormRequest};
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\{EmpresaService,
    RequisitoService,
    SistemaService,
    TratamentoService,
    DescricaoService,
    UsuarioService,
    VinculoService};

use function PHPUnit\Framework\isEmpty;

class TratamentoController extends Controller
{
    public function __construct()
    {
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
        $tratamentos = TratamentoService::listar();
        return view('paginas.listas.tratamento_lista')->with([
            'tratamentos' => $tratamentos]);
    }

    // metodo que faz a busca do tratamento que é passodo por parametro
    public function consultarPorParametro(PesquisaFormRequest $request)
    {
        // recebe o tipo de pesquisa

        $valor = $request->input('pesquisa');

        // verifica se e sistema
        if ($valor === "sistema") {
            $tratamentos = TratamentoService::consultarPorSistema($request->input('pesquisa'));
            return view('paginas.listas.tratamento_lista')->with('tratamentos', $tratamentos);
            // veriifica se é usuario
        } else if ($valor === "usuario") {
            $tratamentos = TratamentoService::consultarPorUsuario($request->input('pesquisa'));
            return view('paginas.listas.tratamento_lista')->with('tratamentos', $tratamentos);
            // caso não seja , simplismente lista as informaçoes
        } else {
            return $this->index();
        }
    }

    // lista os tratamentos
    public function listarTratamentos($situacao)
    {
        $status = TratamentoService::listarConsultasExpecificas($situacao);
        // caso seja igual a 0, retorna para a tela anterior
        if (sizeof($status) == 0) {
            return redirect()->back()->with('erro', 'Nao ha Tratamento com status Concluído!');
        } else if ($status[0]->situacao === 'concluido') {
            // caso a situaçao for igual concluido, ele listara para mostrar concluidos
            return view('paginas.listas.mostrar_concluidos', compact('status'));
        }

        return view('paginas.listas.ver_tratamento', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // clama a tela de inicia o cadastro
    public function create()
    {
        $sistemas = TratamentoService::listarVersaoSistema();
        $requisitos = TratamentoService::listarRequisito();
        $users = TratamentoService::listarUsuario();
        $empresas = EmpresaService::listarTodasPorResponsavel(Auth::user()->id);

        return view('paginas.cadastros.tratamento',
            compact('sistemas', 'requisitos', 'users', 'empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    // cadastra as informaçoes
    public function store(TratamentoFormReuest $request)
    {
        // pega os atributos
        $descricao = $request->input('descricao');
        $dt_entrega = $request->input('dt_entrega');
        $situacao = $request->input('situacao');
        $id_usuario_responsavel = $request->input('id_usuario_responsavel');
        $id_requisito = $request->input('id_requisito');
        $id_sistema = $request->input('id_sistema');
        $id_empresa = $request->input('id_empresa');
        $id_usuario = Auth::user()->id;
        // insere no array
        $form = [
            'dt_entrega' => $dt_entrega,
            'situacao' => $situacao,
            'id_usuario_responsavel' => $id_usuario_responsavel,
            'id_requisito' => $id_requisito,
            'id_usuario' => $id_usuario,
            'id_sistema' => $id_sistema,
            'id_empresa' => $id_empresa,
            'excluido' => 1
        ];
        // faz o cadastro
        TratamentoService::inserir($form);
        // busca o ultimo id inserido
        $id_tratamento = TratamentoService::cconsultarUltimoId();
        // insere o array
        $form2 = [
            'descricao' => $descricao,
            'id_tratamento' => $id_tratamento
        ];

        // cadastra a descricao
        DescricaoService::inserir($form2);
        // retorna a mensagem
        return redirect()->action('TratamentoController@index')
            ->with('mensagem', 'Tratamento cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    // consulta as informaçoes
    public function show($id)
    {
        if (Gate::allows('administrador', Auth::user()) || Gate::allows('desenvolvedor', Auth::user())) {
            // faz a consulta
            $tratamento = TratamentoService::consultar($id);
            if (!empty($tratamento)) {
                return view('paginas.decisoes.apagar_tratamento', compact('tratamento'));
            } else {
                return redirect()->back()->with('erro', 'Tratamento não encontrada!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    // consulta as informaçoes para a edição
    public function edit($id)
    {
        // faz a consulta
        $tratamento = TratamentoService::consultar($id);
        if (!empty($tratamento)) {
            // recebe as informaçoes
            $sistema = SistemaService::consultar($tratamento->id_sistema);
            $requisito = RequisitoService::consultar($tratamento->id_requisito);
            $user = UsuarioService::consultar($tratamento->id_usuario);
            $descricoes = DescricaoService::consultar($id);
            $empresa = EmpresaService::consultar($sistema->id_empresa);
            // caso seja o status seja concluido, levara para a tela mostrar concluidos detalhes
            if ($tratamento['situacao'] === 'concluido') {
                return view('paginas.listas.mostrar_concluidos_detalhes', compact(
                    'tratamento',
                    'sistema',
                    'requisito',
                    'user',
                    'empresa',
                    'descricoes'
                ));
            }
            // retorna para alteraçao
            return view('paginas.alteracoes.tratamento_altera', compact(
                'tratamento',
                'sistema',
                'requisito',
                'empresa',
                'user',
                'descricoes'
            ));
        } else {
            return redirect()->back()->with('erro', 'Tratamento não encontrada!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    // atualiza as informaçoes
    public function update(TratamentoFormReuest $request, $id)
    {   // consulta o tratamento
        $tratamento = TratamentoService::consultar($id);
        // verifica se nao veio vazio
        if (!empty($tratamento)) {
            //pesquisa a descricao na tabela descricoes
            $id_decricao = DescricaoService::consultar($id);
            // verifica se nao esta vazio
            if (!empty($id_decricao)) {
                // recebe os atributos
                $tratamento->id = $id;
                $tratamento->dt_entrega = $request->input('dt_entrega');
                $tratamento->situacao = $request->input('situacao');
                $tratamento->id_usuario_responsavel = $request->input('id_usuario_responsavel');
                $tratamento->id_requisito = $request->input('id_requisito');
                $tratamento->id_sistema = $request->input('id_sistema');
                $tratamento->id_empresa = $request->input('id_empresa');
                $tratamento->id_usuario = Auth::user()->id;
                // atuaaliza as informaçoes do tratamento
                TratamentoService::atualizar($tratamento);
                // insere o array, uma nova descriçao
                $form2 = [
                    'descricao' => $request->input('descricao'),
                    'id_tratamento' => $tratamento->id = $id
                ];
                // cadastra a descricao
                DescricaoService::inserir($form2);
                // retorna a mensagem
                return redirect()->action('TratamentoController@index')
                    ->with('mensagem', 'Tratamento Atualizado com sucesso!');
            } else {
                // caso de erro , nao atualiza o tratamento
                return redirect()->action('TratamentoController@index')
                    ->with('erro', 'Erro ao atualizar o Tratamento !');
            }
        } else {
            return redirect()->action('TratamentoController@index')
                ->with('erro', 'Erro ao atualizar o Tratamento !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    // realiza a deleçao logica
    public function destroy($id)
    {
        // somente adm e desenvolvedor pode remover
        if (Gate::allows('administrador', Auth::user()) || Gate::allows('desenvolvedor', Auth::user())) {
            $tratamento = TratamentoService::consultar($id);
            if (!empty($tratamento)) {
                // atuzaliza o excluido para 0 -- inativado
                // passa o usuario que fez a açao
                $tratamento->excluido = 0;
                $tratamento->id_usuario = Auth::user()->id;
                // executa o delete
                TratamentoService::deletar($tratamento);
                return redirect()->action('SistemaController@index')
                    ->with('mensagem', 'Tratamento Excluído com sucesso!');
            } else {
                // se deu erro , o sistema nao faz a açao
                return redirect()->back()->with('erro', 'Sistema não encontrado!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }
}
