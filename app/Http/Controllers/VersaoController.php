<?php

namespace App\Http\Controllers;

use App\Http\Requests\VersaoFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\VersaoService;

use function PHPUnit\Framework\isEmpty;

class VersaoController extends Controller
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
    public function index()
    {
        $versoes = VersaoService::listar();
        return view('paginas.listas.versao_lista', compact('versoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // lista as informaçoes , colcoando na tela inicial
    public function create()
    {
        if (Gate::allows('administrador', Auth::user()) || Gate::allows('desenvolvedor', Auth::user())) {
            //chama a tela de cadastro
            return view('paginas.cadastros.versao');
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
    public function store(VersaoFormRequest $request)
    {
        if (Gate::allows('administrador', Auth::user()) || Gate::allows('desenvolvedor', Auth::user())) {
            $nome = $request->input('nome');
            $id_usuario = auth()->user()->id;

            $form = [
                'nome' => $nome,
                'id_usuario' => $id_usuario,
                'excluido' => 1
            ];
            VersaoService::inserir($form);
            return redirect()->action('VersaoController@index')
                ->with('mensagem', 'Versão cadastrada com sucesso!');
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
            $versao = VersaoService::consultar($id);
            if (!empty($versao)) {
                return view('paginas.decisoes.apagar_versao', compact('versao'));
            } else {
                return redirect()->back()->with('erro', 'Versão não encontrada!');
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
            $versao = VersaoService::consultar($id);
            if (!empty($versao)) {
                return view('paginas.alteracoes.versao_altera', compact('versao'));
            } else {
                return redirect()->back()->with('erro', 'Versão não encontrada!');
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
    public function update(VersaoFormRequest $request, $id)
    {
        if (Gate::allows('administrador', Auth::user()) || Gate::allows('desenvolvedor', Auth::user())) {
            $versao = VersaoService::consultar($id);
            if (!empty($versao)) {
                $versao->id = $id;
                $versao->nome = $request->input('nome');
                $versao->id_usuario = auth()->user()->id;

                VersaoService::atualizar($versao);
                return redirect()->action('VersaoController@index')
                    ->with('mensagem', 'Versão Atualizada com sucesso!');
            } else {
                return redirect()->back()->with('erro', 'Erro ao atualizar a Versão!');
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
            $versao = VersaoService::consultar($id);
            if (!empty($versao)) {
                $sistema = VersaoService::consultarSistemaPorVersao($versao->id);
                if (!empty($sistema)) {
                    return redirect()->action('VersaoController@index')
                        ->with('erro', 'Versão não pode ser removida');
                } else {
                    // coloca como excluido 
                    $versao->excluido = 0;
                    $versao->id_usuario = auth()->user()->id;
                    VersaoService::deletar($versao);
                    return redirect()->action('VersaoController@index')
                        ->with('mensagem', 'Versão Excluída com sucesso!');
                }
            } else {
                return redirect()->back()->with('erro', 'Versão não encontrada!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }
}
