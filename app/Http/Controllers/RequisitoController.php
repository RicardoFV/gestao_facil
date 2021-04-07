<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Http\Requests\RequisitoFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\RequisitoService;

class RequisitoController extends Controller
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
        $requisitos = RequisitoService::listar();
        return view('paginas.listas.requisito_lista', compact('requisitos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // clama a tela de inicia o cadastro
    public function create()
    {
        if (Gate::allows('administrador', Auth::user()) || Gate::allows('desenvolvedor', Auth::user())) {
            return view('paginas.cadastros.requisito');
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
        if (Gate::allows('administrador', Auth::user()) || Gate::allows('desenvolvedor', Auth::user())) {

            $nome = $request->input('nome');
            $tipo_requisito = $request->input('tipo_requisito');
            $descricao = $request->input('descricao');
            $id_usuario = auth()->user()->id;

            $form = [
                'nome' => $nome,
                'tipo_requisito' => $tipo_requisito,
                'descricao' => $descricao,
                'id_usuario' => $id_usuario,
                'excluido' => 1
            ];
            RequisitoService::inserir($form);

            return redirect()->action('RequisitoController@index')
                ->with('mensagem', 'Requisito cadastrado com sucesso!');
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
        if (Gate::allows('administrador', Auth::user()) || Gate::allows('desenvolvedor', Auth::user())) {
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
        if (Gate::allows('administrador', Auth::user()) || Gate::allows('desenvolvedor', Auth::user())) {
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
        if (Gate::allows('administrador', Auth::user()) || Gate::allows('desenvolvedor', Auth::user())) {
            $requisito = RequisitoService::consultar($id);
            if (!empty($requisito)) {
                $requisito->id = $id;
                $requisito->nome = $request->input('nome');
                $requisito->tipo_requisito = $request->input('tipo_requisito');
                $requisito->descricao = $request->input('descricao');
                $requisito->id_usuario = auth()->user()->id;

                RequisitoService::atualizar($requisito);
                return redirect()->action('RequisitoController@index')
                    ->with('mensagem', 'Requisito Atualizado com sucesso!');
            } else {
                return redirect()->back()->with('erro', 'Erro ao atualizar o Requisito!');
            }
        } else {
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
        if (Gate::allows('administrador', Auth::user()) || Gate::allows('desenvolvedor', Auth::user())) {

            $requisito = RequisitoService::consultar($id);
            if (!empty($requisito)) {
                $tratamento = RequisitoService::consultarTratamentoPorRequisito($requisito->id);
                if (!empty($tratamento)) {
                    return redirect()->action('RequisitoController@index')
                        ->with('erro', 'Requisito não pode ser removido');
                } else {
                    $requisito->excluido = 0;
                    $requisito->id_usuario = auth()->user()->id;
                    // faz uma deleçao logica
                    RequisitoService::deletar($requisito);
                    return redirect()->action('RequisitoController@index')
                        ->with('mensagem', 'Requisito Excluído com sucesso!');
                }
            } else {
                return redirect()->back()->with('erro', 'Requisito não encontrado!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }
}
