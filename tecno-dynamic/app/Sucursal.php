<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sucursal extends Model
{

    public static function sucursal($id){
        $persona = DB::table('sucursals') 
        ->select('*')
        ->where('sucursals.id','<>',$id)
        ->get();
        return $persona;
    }

    function numRows($nombre) {
        $result  = DB::table('sucursals')
                    ->where('nombre','=', $nombre)
                    ->selectRaw('count(*)')
                    ->first();
        return $result;
    }
}
