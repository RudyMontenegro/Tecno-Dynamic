<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cliente extends Model
{
    function numRows($nit) {
        $result  = DB::table('clientes')
                    ->where('nit','=', $nit)
                    ->count();
        return $result;
    }
    function cuenta($nit) {
        $result  =  strlen($nit);
        return $result;
    }
}
