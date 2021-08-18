<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Productos extends Model
{
    public static function producto($id){
        $persona = DB::table('productos') 
        ->select('*')
        ->where('id_sucursal','=',$id)
        ->get();
        return $persona;
    }

    public static function codigo($id){
        $persona2 = DB::table('productos') 
        ->select('*')
        ->where('id','=',$id)
        ->get();
        return $persona2;
    }
}
