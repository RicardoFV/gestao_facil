<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requisito;
use App\Http\Requests\RequisitoFormRequest;

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
        $requisitos = Requisito::listar();
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
        return view('paginas.cadastros.requisito');
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
        $nome = $request->input('nome');
        $tipo_requisito = $request->input('tipo_requisito');
        $descricao = $request->input('descricao');
        $id_usuario = auth()->user()->id;

        $form = [
            'nome' => $nome, 
            'tipo_requisito'=> $tipo_requisito,
            'descricao'=>$descricao,
            'id_usuario'=>$id_usuario,
            'excluido'=> 1
        ];
        Requisito::inserir($form);
         
        return redirect()->action('RequisitoController@index')
          ->with('mensagem', 'Requisito cadastrado com sucesso!');
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
        // faz a consulta 
        $requisito = Requisito::find($id);
        if(!empty($requisito)){
            return view('paginas.decisoes.apagar_requisito', compact('requisito'));
        }else{
            return redirect()->back()->with('erro', 'Requisito não encontrado!');
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
        // faz a consulta 
        $requisito = Requisito::find($id);
        if(!empty($requisito)){
            return view('paginas.alteracoes.requisito_altera', compact('requisito'));
        }else{
            return redirect()->back()->with('erro', 'Requisito não encontrado!');
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
        $requisito = Requisito::find($id);
        if(!empty($requisito)){
            $requisito->id = $id;
            $requisito->nome =$request->input('nome');
            $requisito->tipo_requisito =$request->input('tipo_requisito');
            $requisito->descricao =$request->input('descricao');
            $requisito->id_usuario= auth()->user()->id;

            Requisito::atualizar($requisito);
            return redirect()->action('RequisitoController@index')
            ->with('mensagem', 'Requisito Atualizado com sucesso!');
        }else{
            return redirect()->back()->with('erro', 'Erro ao atualizar o Requisito!');
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
        $requisito = Requisito::find($id);
        if(!empty($requisito)){
            $tratamento = Requisito::consultarTratamentoPorRequisito($requisito->id);
            if(!empty($tratamento)){
                return redirect()->action('RequisitoController@index')
                    ->with('erro', 'Requisito não pode ser removido');
            }else{
                $requisito->excluido = 0;
                Requisito::deletar($requisito);
                return redirect()->action('RequisitoController@index')
                    ->with('mensagem', 'Requisito Excluído com sucesso!');
            }
        }else {
            return redirect()->back()->with('erro', 'Requisito não encontrado!');
        }
    }
}
