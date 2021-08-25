<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Venta;
use App\VentaDetalle;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index() 
    {
        $ventas = Venta::all();
        return view('venta.index', compact('ventas'));
    }
    public function create()
    {
        return view('venta.create');
    }
 
    public function store(Request $request)
    {
     //  dd($request->all());
      
       // $this->validate($request);

      //* $nitBD = DB::table('proveedors')
               // ->select('nit')
                //->where('nit','=',request('nit'))
                //->exists();
        
        //$nomBD = DB::table('proveedors')
                //->select('nombre_empresa')
                //->where('nombre_empresa','=',request('nombre_empresa'))
                //->exists();

       // if($nitBD == false && $nomBD==false){
            

        $ventaDetalle = new VentaDetalle();
        $ventaDetalle->codigo_producto = $request->input('codigo_producto');
        $ventaDetalle->nombre = $request->input('nombre');
        $ventaDetalle->cantidad = $request->input('cantidad');
        $ventaDetalle->unidad = $request->input('unidad');
        $ventaDetalle->precio = $request->input('precio');
        $ventaDetalle->sub_total = $request->input('sub_total');
        $ventaDetalle->id_venta = $request->input('id_venta');
        //dd($ventaDetalle);
        $ventaDetalle->save();

      //  return redirect('/venta');
      //  }

      //  else{
      //  return redirect('/venta')->with('Estado','Se guaardo detaller'); 
        //}
    }
   
    public function show(Venta $venta)
    {
        return view('venta.view', compact('venta'));
    }
    public function edit(Venta $venta)
    {
        return view('venta.edit', compact('venta'));
    } 
    public function update(Request $request, Venta $venta)
    {
        $venta->nit = $request->input('nit');
        $venta->nombre_empresa = $request->input('nombre_empresa');
        $venta->nombre_contacto = $request->input('nombre_contacto');
        $venta->direccion = $request->input('direccion');
        $venta->telefono = $request->input('telefono');
        $venta->email = $request->input('email');
        $venta->web_site = $request->input('web_site');
        $venta->categoria = $request->input('categoria');
        $venta->save();
        return redirect('/venta');
    }
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect('/venta');
    }
    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('clientes')
        ->where('nombre_contacto', 'LIKE', "%{$query}%")
        ->get();
      $output = '<datalist id="datalistOptions">';
      foreach($data as $row)
      {
       $output .= '
       <option>'.$row->nombre_contacto.'</option>
       ';
      }
      $output .= '</datalist>';
      echo $output;
     }
    }
} 
