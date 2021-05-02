<?php

namespace App\Http\Controllers;

use App\Http\Requests\SistemaFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\SistemaService;

class SistemaController extends Controller
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
        $sistemas = SistemaService::listarVersaoSistema();
        return view('paginas.listas.sistema_lista', ['sistemas' => $sistemas]);
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
            $versoes = SistemaService::listarVersao();
            return view('paginas.cadastros.sistema', compact('versoes'));
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
    public function store(SistemaFormRequest $request)
    {
        if (Gate::allows('administrador', Auth::user()) || Gate::allows('desenvolvedor', Auth::user())) {
            $nome = $request->input('nome');
            $descricao = $request->input('descricao');
            $id_versao = $request->input('id_versao');
            $id_usuario = auth()->user()->id;

            $form = [
                'nome' => $nome,
                'descricao' => $descricao,
                'id_usuario' => $id_usuario,
                'id_versao' => $id_versao,
                'excluido' => 1
            ];
            SistemaService::inserir($form);

            return redirect()->action('SistemaController@index')
                ->with('mensagem', 'Sistema cadastrado com sucesso!');
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
            $sistema = SistemaService::consultar($id);
            if (!empty($sistema)) {
                return view('paginas.decisoes.apagar_sistema', compact('sistema'));
            } else {
                return redirect()->back()->with('erro', 'Sistema não encontrado!');
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
            $sistema  = SistemaService::consultar($id);
            if (!empty($sistema)) {
                $versoes = SistemaService::listarVersao();
                return view('paginas.alteracoes.sistema_altera', compact('sistema', 'versoes'));
            } else {
                return redirect()->back()->with('erro', 'Sistema não encontrada!');
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
    public function update(SistemaFormRequest $request, $id)
    {
        if (Gate::allows('administrador', Auth::user()) || Gate::allows('desenvolvedor', Auth::user())) {
            $sistema = SistemaService::consultar($id);
            if (!empty($sistema)) {
                $sistema->id = $id;
                $sistema->nome = $request->input('nome');
                $sistema->descricao = $request->input('descricao');
                $sistema->id_usuario = auth()->user()->id;
                $sistema->id_versao = $request->input('id_versao');

                SistemaService::atualizar($sistema);
                return redirect()->action('SistemaController@index')
                    ->with('mensagem', 'Sistema Atualizado com sucesso!');
            } else {
                return redirect()->back()->with('erro', 'Erro ao atualizar o Sistema!');
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
            $sistema = SistemaService::consultar($id);
            if (!empty($sistema)) {
                //$tratamento = SistemaService::consultarTratamentoPorsistema($sistema->id);
                //if (!empty($tratamento)) {
                  //  return redirect()->action('SistemaController@index')
                  //      ->with('erro', 'Sistema não pode ser removido');
               //  } else {
                    $sistema->id_usuario = auth()->user()->id;
                    $sistema->excluido = 0;
                    SistemaService::deletar($sistema);
                    return redirect()->action('SistemaController@index')
                        ->with('mensagem', 'Sistema Excluído com sucesso!');
                //}
            } else {
                return redirect()->back()->with('erro', 'Sistema não encontrado!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }
}
