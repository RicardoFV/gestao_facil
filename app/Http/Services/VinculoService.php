<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use App\Vinculo;

class VinculoService
{
    // cadastrar vinculo
    public static function inserir(array $dados)
    {
        Vinculo::create($dados);
    }

    // verificar se tem vinculo
    public static function verificarVinculo($id_gestor, $id_empresa)
    {
        return Vinculo::where([
            'id_gestor' => $id_gestor,
            'id_empresa' => $id_empresa
        ])->count();
    }
}
