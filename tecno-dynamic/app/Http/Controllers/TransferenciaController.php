<?php

namespace App\Http\Controllers;

use App\Productos;
use App\Sucursal;
use App\Transferencia;
use App\TransferenciaDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transferencia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursal = Sucursal::all();
        return view('transferencia.create',compact('sucursal'));
    }

    public function sucursal(Request $request, $id)
    {
        if($request->ajax()){
            $sucursal=Sucursal::sucursal($id);
            return response()->json( $sucursal);
        }
    }

    public function producto(Request $request, $id)
    {
        if($request->ajax()){
            $producto=Productos::producto($id);
            return response()->json( $producto);
        }
    }

    public function codigo(Request $request, $id)
    {
        if($request->ajax()){
            $codigo=Productos::codigo($id);
            return response()->json( $codigo);
        }
    }
    public function store(Request $request)
    {
        $transferencia = new Transferencia();

        $transferencia->comprobante = request('comprobante');
        $transferencia->responsable_transferencia = request('responsable');
        $transferencia->fecha = request('fecha');
        $transferencia->sucursal_origen = $request->get('sucursal_origen');
        $transferencia->sucursal_destino = $request->get('sucursal_destino');
        
        $transferencia->save();

        $id_transferencia = DB::table('transferencias')
                                ->select('id')
                                ->where('fecha','=',request('fecha'))
                                ->first();
        
        if($request->input('codigoI') && $request->input('nombre') && $request->input('cantidad') && $request->input('unidad') && $request->input('precio') && $request->input('subTotal')){
            $codigo = request('codigoI');
            $nombre = request('nombre');
            $cantidad = request('cantidad');
            $unidad = request('unidad');
            $precio = request('precio');
            $subTotal = request('subTotal');
            for ($i=0; $i < sizeOf($nombre); $i++) { 

                $id_codigo_producto = DB::table('productos')
                                    ->select('id')
                                    ->where('codigo','=',$codigo[$i])
                                    ->first();

                $transferencia_detalle = new TransferenciaDetalle();

                $transferencia_detalle->codigo_producto =  $id_codigo_producto->id;
                $transferencia_detalle->nombre = $nombre[$i];
                $transferencia_detalle->cantidad = $cantidad[$i];
                $transferencia_detalle->unidad = $unidad[$i];
                $transferencia_detalle->precio = $precio[$i];
                $transferencia_detalle->sub_total = $subTotal[$i];
                $transferencia_detalle->id_transferencia = $id_transferencia->id;

                $transferencia_detalle->save();
            }
        }
        

        return redirect('transferencia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transferencia  $transferencia
     * @return \Illuminate\Http\Response
     */
    public function show(Transferencia $transferencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transferencia  $transferencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Transferencia $transferencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transferencia  $transferencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transferencia $transferencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transferencia  $transferencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transferencia $transferencia)
    {
        //
    }
}
