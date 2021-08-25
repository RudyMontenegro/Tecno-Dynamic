<?php

namespace App\Http\Controllers;

use App\Compra;
use App\CompraDetalle;
use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::all();
        return view('compra.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor = Proveedor::all();
        return view('compra.create',['proveedor'=>$proveedor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        
    /*
        $compra = new Compra();

        $compra-> comprobante = request('comprobante');
        $compra-> id_proveedor = $request -> get('proveedor');
        $compra-> responsable_compra = request('responsable_compra');
        $compra-> fecha = request('fecha');
        $compra-> tipo_compra = request('tipo_compra');
        $compra-> observaciones = request('observaciones');
        $compra-> save();

        return redirect('compra');
        */


        $compraDetalle = new CompraDetalle();
        $compraDetalle->codigo_producto = $request->input('codigo_producto');
        $compraDetalle->nombre = $request->input('nombre');
        $compraDetalle->cantidad = $request->input('cantidad');
        $compraDetalle->unidad = $request->input('unidad');
        $compraDetalle->precio = $request->input('precio');
        $compraDetalle->sub_total = $request->input('sub_total');
        $compraDetalle->id_compra = $request->input('id_compra');
        //dd($compraDetalle);
        $compraDetalle->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        return view('compra.edit', compact('compra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        return view('compra.edit', compact('compra'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        /*
        $compra->nit = $request->input('nit');
        $compra->nombre_empresa = $request->input('nombre_empresa');
        $compra->nombre_contacto = $request->input('nombre_contacto');
        $compra->direccion = $request->input('direccion');
        $compra->telefono = $request->input('telefono');
        $compra->email = $request->input('email');
        $compra->web_site = $request->input('web_site');
        $compra->categoria = $request->input('categoria');
        $compra->save();
        return redirect('/compra');
        */

        $this->validate($request);

        $compra = new Compra();

        $compra->comprobante = request('comprobante');
        $compra->proveedor = request('proveedor');
        $compra->responsable_compra = request('responsable_compra');
        $compra->fecha = request('fecha');
        $compra->tipo_compra = request('tipo_compra');
        $compra->observaciones = request('observaciones');
        $compra->id_sucursal = request('os_sucursal');
        
        $compra->save();
        return redirect('compra');

    }
/*
    public function calculoCostos(Request $request){
        $request->validate([
            'suma' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
        ]);
        $sumado = DB::table('compraDetalle')
        -->select('compraDetalle, cantidad && precio')
        -->where()

    }
    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();
        return redirect('compra');
    }

}
