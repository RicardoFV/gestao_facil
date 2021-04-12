<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Descricoes;

class DescricaoService
{
    // cadastrar as informaçoes
    public static function inserir(array $dados)
    {
        Descricoes::create($dados);
    }
    // consulta descricao por id_tratamento
    public static function consultar($id_tratamento)
    {
        return Descricoes::where('id_tratamento', $id_tratamento)
            ->orderBy('id', 'desc')
            ->get();
    }
}
