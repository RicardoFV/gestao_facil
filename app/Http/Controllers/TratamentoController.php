<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Tratamento, Requisito, Sistema, User};
use App\Http\Requests\TratamentoFormReuest;

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
        $tratamentos = Tratamento::listar();
        return view('paginas.listas.tratamento_lista')->with('tratamentos', $tratamentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // clama a tela de inicia o cadastro
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
    // cadastra as informaçoes
    public function store(TratamentoFormReuest $request)
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
    // consulta as informaçoes
    public function show($id)
    {
        // faz a consulta 
        $tratamento  = Tratamento::find($id);
        if(!empty($tratamento)){
           return view('paginas.decisoes.apagar_tratamento', compact('tratamento' ));
        }else{
            return redirect()->back()->with('erro', 'Tratamento não encontrada!');
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
        $tratamento  = Tratamento::find($id);
        if(!empty($tratamento)){
            $sistemas = Sistema::listarVersaoSistema();
            $requisitos = Requisito::listar();
            $users = User::listar();
           return view('paginas.alteracoes.tratamento_altera', compact(
               'tratamento',
               'sistemas', 
               'requisitos',
               'users'
            ));
        }else{
            return redirect()->back()->with('erro', 'Tratamento não encontrada!');
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
    public function update(TratamentoFormReuest $request, $id)
    {
        $tratamento = Tratamento::find($id);
        if(!empty($tratamento)){
            $tratamento->id = $id;
            $tratamento->descricao =$request->input('descricao');
            $tratamento->dt_entrega =$request->input('dt_entrega');
            $tratamento->situacao =$request->input('situacao');
            $tratamento->id_usuario_responsavel =$request->input('id_usuario_responsavel');
            $tratamento->id_requisito =$request->input('id_requisito');
            $tratamento->id_sistema =$request->input('id_sistema');
            $tratamento->id_usuario= auth()->user()->id;

            Tratamento::atualizar($tratamento);
            return redirect()->action('TratamentoController@index')
                ->with('mensagem', 'Tratamento Atualizado com sucesso!');
        }else{
            return redirect()->action('TratamentoController@index')
                ->with('erro', 'Erro ao atualizar o Tratamento !');
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
        $tratamento = Tratamento::find($id);
        if(!empty($tratamento)){
           
            $tratamento->excluido = 0;
            Tratamento::deletar($tratamento);
            return redirect()->action('SistemaController@index')
                ->with('mensagem', 'Tratamento Excluído com sucesso!');
            
        }else {
            return redirect()->back()->with('erro', 'Sistema não encontrado!');
        }
    }
}
