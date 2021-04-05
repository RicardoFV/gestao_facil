<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Tratamento};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $novo = Tratamento::listarNovos();
        $nao_iniciado = Tratamento::listarNaoIniciado();
        $parado = Tratamento::listarParado();
        $andamento = Tratamento::listarAndamento();
        $concluido = Tratamento::listarConcluidos();
        return view('home', compact('novo', 'nao_iniciado', 'parado', 'andamento', 'concluido'));
    }
}
