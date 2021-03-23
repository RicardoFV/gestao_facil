<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requisito;

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
    public function index()
    {
        $requisitos = Requisito::listar();
        return view('paginas.listas.requisito_lista', compact('requisitos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paginas.cadastros.requisito');
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
        $tipo_requisito = $request->input('tipo_requisito');
        $descricao = $request->input('descricao');
        $id_usuario = auth()->user()->id;

        $form = [
            'nome' => $nome, 
            'tipo_requisito'=> $tipo_requisito,
            'descricao'=>$descricao,
            'id_usuario'=>$id_usuario
        ];
        Requisito::inserir($form);
         
        return redirect()->action('RequisitoController@index')
          ->with('mensagem', 'Requisito cadastrada com sucesso!');
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
        // faz a consulta 
        $requisito = Requisito::find($id);
        if(!empty($requisito)){
            return view('paginas.alteracoes.requisito_altera', compact('requisito'));
        }else{
            return redirect()->back()->with('erro', 'Requisito não encontrada!');
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
        $requisito = Requisito::find($id);
        if(!empty($requisito)){
            $requisito->id = $id;
            $requisito->nome =$request->input('nome');
            $requisito->tipo_requisito =$request->input('tipo_requisito');
            $requisito->descricao =$request->input('descricao');
            $requisito->id_usuario= auth()->user()->id;

            Requisito::atualizar($requisito);
            return redirect()->action('RequisitoController@index')
            ->with('mensagem', 'Requisito Atualizada com sucesso!');
        }else{
            return redirect()->back()->with('erro', 'Erro ao atualizar a Requisito!');
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
        //
    }
}
