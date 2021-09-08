<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public static function getNit($id){
        $nit = DB::table('clientes') 
        ->select('nit')
        ->where('nombre','=',$id)
        ->get();
        return $nit;
    } 
}
