<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransferenciaDetalle extends Model
{
  

    function existe($codigo,$sucursal){

        $nombre = DB::table('productos')
                ->select('nombre')
                ->where('codigo','=',$codigo)
                ->where('id_sucursal','=',$sucursal)
                ->exists();
        return $nombre;
    }
}
