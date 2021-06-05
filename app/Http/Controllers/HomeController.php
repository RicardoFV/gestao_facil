<?php

namespace App\Http\Controllers;

use App\Http\Services\TratamentoService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // retorna a contagem dos tratamentos por situaçao
        $novo = TratamentoService::listarNovos();
        $nao_iniciado = TratamentoService::listarNaoIniciado();
        $parado = TratamentoService::listarParado();
        $andamento = TratamentoService::listarAndamento();
        $concluido = TratamentoService::listarConcluidos();
        return view('home', compact('novo', 'nao_iniciado', 'parado', 'andamento', 'concluido'));
    }
}
