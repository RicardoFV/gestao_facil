<?php


namespace App\Http\Services\traits;
use App\Vinculo;

trait VerDados
{

    public static function Ver($id){
        return Vinculo::where('id_gestor' , $id)->count();
    }


}
