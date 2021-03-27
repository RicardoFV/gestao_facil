<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Versao;

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
        $versoes = Versao::listar();
        return view('paginas.listas.versao_lista', compact('versoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //chama a tela de cadastro
        return view('paginas.cadastros.versao');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nome = $request->input('nome');
        $id_usuario = auth()->user()->id;

        $form = [
            'nome' => $nome, 
            'id_usuario'=>$id_usuario,
            'excluido'=> 1
        ];
        Versao::inserir($form);
        return redirect()->action('VersaoController@index')
            ->with('mensagem', 'Versão cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // faz a consulta 
        $versao = Versao::find($id);
        if(!empty($versao)){
            return view('paginas.decisoes.apagar_versao', compact('versao'));
        }else{
            return redirect()->back()->with('erro', 'Versão não encontrada!');
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
        // faz a consulta 
        $versao = Versao::find($id);
        if(!empty($versao)){
            return view('paginas.alteracoes.versao_altera', compact('versao'));
        }else{
            return redirect()->back()->with('erro', 'Versão não encontrada!');
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
        $versao = Versao::find($id);
        if(!empty($versao)){
            $versao->id = $id;
            $versao->nome =$request->input('nome');
            $versao->id_usuario= auth()->user()->id;

            Versao::atualizar($versao);
            return redirect()->action('VersaoController@index')
            ->with('mensagem', 'Versão Atualizada com sucesso!');
        }else{
            return redirect()->back()->with('erro', 'Erro ao atualizar a Versão!');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $versao = Versao::find($id);
        if(!empty($versao)){
            $sistema = Versao::consultarSistemaPorVersao($versao->id);
            if(!empty($sistema)){
                return redirect()->back()->with('erro', 'Versão não pode ser removida');
            }else{
                // coloca como excluido 
                $versao->excluido = 0;
                Versao::deletar($versao);
                return redirect()->action('VersaoController@index')
                    ->with('mensagem', 'Versão Excluída com sucesso!');
            }
        }else {
            return redirect()->back()->with('erro', 'Versão não encontrada!');
        }
         
    }
}
