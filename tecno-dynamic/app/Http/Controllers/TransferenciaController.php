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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        
        $transferencia_detalle = new TransferenciaDetalle();

        $transferencia_detalle->codigo_producto = request('codigo');;

        if ($request->input('nombre')) {
            $nombre = request('nombre');
            foreach ($nombre as $nombre) {
                $transferencia_detalle->nombre = $nombre;
            }
        }
        if ($request->input('cantidad')) {
            $cantidad = request('cantidad');
            foreach ($cantidad as $cantidad) {
                $transferencia_detalle->cantidad = $cantidad;
            }
        }
        if ($request->input('unidad')) {
            $unidad = request('unidad');
            foreach ($unidad as $unidad) {
                $transferencia_detalle->unidad = $unidad;
            }
        }
        if ($request->input('precio')) {
            $precio = request('precio');
            foreach ($precio as $precio) {
                $transferencia_detalle->precio = $precio;
            }
        }
        if ($request->input('subTotal')) {
            $subTotal = request('subTotal');
            foreach ($subTotal as $subTotal) {
                $transferencia_detalle->sub_total = $subTotal;
            }
        }
        $transferencia_detalle->id_transferencia = $id_transferencia->id;
        
        $transferencia_detalle->save();

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
