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

}
