<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Http\Requests\EmpresaFormulario;
use Illuminate\Http\Request;
use App\Http\Services\{EmpresaService};
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
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
        $empresas = EmpresaService::listar();
        return view('paginas.listas.empresa_lista', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (
            Gate::allows('super_admin', Auth::user()) ||
            Gate::allows('administrador', Auth::user()) ||
            Gate::allows('administrador_gestor', Auth::user())
        ) {

            //chama a tela de cadastro
            return view('paginas.cadastros.empresa');
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
    public function store(EmpresaFormulario $request)
    {
        if (
            Gate::allows('super_admin', Auth::user()) ||
            Gate::allows('administrador', Auth::user()) ||
            Gate::allows('administrador_gestor', Auth::user())
        ) {
            //dd($request->all());;

            EmpresaService::inserir($request->all());
             // retorna a mensagem de sucesso
             return redirect()->action('EmpresaController@index')
             ->with('mensagem', 'Empresa cadastrada com sucesso!');

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
