<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Tratamento, Requisito, Sistema, User};

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
    public function index()
    {
        $tratamentos = Tratamento::listar();
        return view('paginas.listas.tratamento_lista')->with('tratamentos', $tratamentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sistemas = Sistema::listarVersaoSistema();
        $requisitos = Requisito::listar();
        $users = User::listar();

        return view('paginas.cadastros.tratamento', compact('sistemas','requisitos', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $descricao = $request->input('descricao');
        $dt_entrega = $request->input('dt_entrega');
        $situacao = $request->input('situacao');
        $id_usuario_responsavel = $request->input('id_usuario_responsavel');
        $id_requisito = $request->input('id_requisito');
        $id_sistema = $request->input('id_sistema');
        $id_usuario = auth()->user()->id;

        $form = [
            'descricao' => $descricao,
            'dt_entrega'=>$dt_entrega,
            'situacao'=>$situacao,
            'id_usuario_responsavel'=>$id_usuario_responsavel,
            'id_requisito'=>$id_requisito,
            'id_usuario'=>$id_usuario,
            'id_sistema'=>$id_sistema,
            'excluido'=> 1
        ];
        Tratamento::inserir($form);

        return redirect()->action('TratamentoController@index')
          ->with('mensagem', 'Tratamento cadastrado com sucesso!');
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
