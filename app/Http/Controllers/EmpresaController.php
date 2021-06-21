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
        if (Gate::allows('super_admin', Auth::user())) {
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
        if (Gate::allows('super_admin', Auth::user())) {
            if ($request->input('id_usuario')  == Auth::user()->id) {
                EmpresaService::inserir($request->all());
                // retorna a mensagem de sucesso
                return redirect()->action('EmpresaController@index')
                    ->with('mensagem', 'Empresa cadastrada com sucesso!');
            } else { // caso o id do usuario tenha sido modificado
                return redirect()
                    ->back()
                    ->withErrors('erro', 'Nao é possível fazer o cadastro');
            }
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
        if (Gate::allows('super_admin', Auth::user())) {
            // faz a consulta
            $empresa = EmpresaService::consultar($id);
            if (!empty($empresa)) {
                return view('paginas.decisoes.apagar_empresa', compact('empresa'));
            } else {
                return redirect()->back()->with('erro', 'Empresa não encontrado!');
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
    public function edit($id)
    {
        if (Gate::allows('super_admin', Auth::user())) {
            // faz a consulta
            $empresa = EmpresaService::consultar($id);
            if (!empty($empresa)) {
                return view('paginas.alteracoes.empresa_altera', compact('empresa'));
            } else {
                return redirect()->back()->with('erro', 'Empresa não encontrado!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }
    // metodo que ativa usuario
    public function consultarEmpresaInativa($id)
    {
        // configurando as permissoes
        if (
            Gate::allows('super_admin', Auth::user())) {
            $empresa = EmpresaService::consultarEmpresaDeletada($id);
            if (!empty($empresa)) {
                return view('paginas.decisoes.ativar_empresa', compact('empresa'));
            } else {
                return redirect()->back()->with('erro', 'Empresa não encontrada!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }
    // ativar empresa
    public function ativarEmpresa($id)
    {
        // configurando as permissoes
        if (
            Gate::allows('super_admin', Auth::user())) {
            $empresa = EmpresaService::consultarEmpresaDeletada($id);
            if (!empty($empresa)) {
                EmpresaService::ativarEmpresa($empresa);
                return redirect()->action('EmpresaController@index')
                    ->with('mensagem', 'Empresa Ativado com sucesso!');
            } else {
                return redirect()->back()->with('erro', 'Usuario não encontrado!');
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
    public function update(EmpresaFormulario $request, $id)
    {
        if (Gate::allows('super_admin', Auth::user())) {
            if ($request->input('id_usuario')  == Auth::user()->id) {
                // consulta as informaçoes
                $empresa = EmpresaService::consultar($id);
                // caso nao esteja vazio
                if (!empty($empresa)) {
                    // recebe as novas informaçoes
                    $empresa->id = $id;
                    $empresa->name = $request->input('name');
                    $empresa->email = $request->input('email');
                    $empresa->telefone_1 = $request->input('telefone_1');
                    $empresa->telefone_2 = $request->input('telefone_2');
                    $empresa->cnpj = $request->input('cnpj');
                    $empresa->situacao_empresa = $request->input('situacao_empresa');
                    $empresa->cep = $request->input('cep');
                    $empresa->logradouro = $request->input('logradouro');
                    $empresa->complemento = $request->input('complemento');
                    $empresa->bairro = $request->input('bairro');
                    $empresa->localidade = $request->input('localidade');
                    $empresa->uf = $request->input('uf');
                    $empresa->id_usuario = Auth()->user()->id;

                    // atualiza os dados
                    EmpresaService::atualizar($empresa);
                    // apresenta a mensagem de sucesso
                    return redirect()->action('EmpresaController@index')
                        ->with('mensagem', 'Empresa Atualizada com sucesso!');
                } else {
                    // caso de erro , o sistema informa que nao foi possivel realizar a atividade
                    return redirect()->back()->with('erro', 'Erro ao atualizar a Empresa!');
                }
            } else { // caso o id do usuario tenha sido modificado
                return redirect()
                    ->back()
                    ->withErrors('erro', 'Nao é possível fazer o cadastro');
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
    public function destroy($id)
    {
        if (Gate::allows('super_admin', Auth::user())) {
            $empresa = EmpresaService::consultar($id);
            if (!empty($empresa)) {
                EmpresaService::deletar($empresa);
                return redirect()->action('EmpresaController@index')
                    ->with('mensagem', 'Empresa Excluída com sucesso!');
            } else {
                return redirect()->back()->with('erro', 'Empresa não encontrado!');
            }
        } else {
            return view('paginas.restricao_acesso.restricao_acesso');
        }
    }
}
