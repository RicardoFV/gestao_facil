<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Sistema, Versao};

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
    public function index()
    {
        $sistemas = Sistema::listarVersaoSistema();
        return view('paginas.listas.sistema_lista', ['sistemas'=>$sistemas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $versoes = Versao::listar();
        return view('paginas.cadastros.sistema' ,compact('versoes'));
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
        $descricao = $request->input('descricao');
        $id_versao = $request->input('id_versao');
        $id_usuario = auth()->user()->id;

        $form = [
            'nome' => $nome,
            'descricao'=>$descricao,
            'id_usuario'=>$id_usuario,
            'id_versao'=>$id_versao
        ];
        Sistema::inserir($form);

        return redirect()->action('SistemaController@index')
          ->with('mensagem', 'Sistema cadastrado com sucesso!');
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
         $sistema  = Sistema::find($id);
         if(!empty($sistema)){
            $versoes = Versao::listar();
            return view('paginas.alteracoes.sistema_altera', compact('sistema','versoes' ));
         }else{
             return redirect()->back()->with('erro', 'Sistema não encontrada!');
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
        //
    }
}
