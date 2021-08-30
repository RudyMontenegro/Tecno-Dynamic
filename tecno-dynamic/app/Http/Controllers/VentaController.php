<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Sucursal;
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
        $sucursal = Sucursal::all();
        return view('venta.create',compact('sucursal'));
    }
 
    public function store(Request $request)
    {
        $venta = new Venta();
        $venta->cliente = $request->input('cliente');
        $venta->comprobante = $request->input('comprobante');
        $venta->responsable_venta = $request->input('responsable_venta');
        $venta->fecha = $request->input('fecha');
        $venta->tipo_venta = $request->input('tipo_venta');
        $venta->observaciones = $request->input('observaciones');
        $venta->id_venta = $request->input('id_venta');
        $venta->save();

        $id_venta = DB::table('ventas')
        ->select('id')
        ->where('fecha','=',request('fecha'))
        ->first();
        if($request->input('nombre') && $request->input('cantidad') && $request->input('unidad') && $request->input('precio') && $request->input('subTotal')){
            $nombre = request('nombre');
            $cantidad = request('cantidad');
            $unidad = request('unidad');
            $precio = request('precio');
            $subTotal = request('subTotal');
            for ($i=0; $i < sizeOf($nombre); $i++) { 
                $venta_detalle = new VentaDetalle();
                $venta_detalle->codigo_producto = request('codigo');
                $venta_detalle->nombre = $nombre[$i];
                $venta_detalle->cantidad = $cantidad[$i];
                $venta_detalles->unidad = $unidad[$i];
                $venta_detalle->precio = $precio[$i];
                $venta_detalle->sub_total = $subTotal[$i];
                $venta_detalle->id_transferencia = $id_transferencia->id;
                $venta_detalle->save();
            }
        }
        return view('venta.index', compact('ventas'));
    }

    public function store2(Request $request)
    {
        $venta = new Venta();
        $venta->cliente = $request->input('cliente');
     //   $venta->nombre = $request->input('nombre');
       // $venta->cantidad = $request->input('cantidad');
        //$venta->unidad = $request->input('unidad');
      //  $venta->precio = $request->input('precio');
      //  $venta->sub_total = $request->input('sub_total');
     //   $venta->id_venta = $request->input('id_venta');
        $venta->save();
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
