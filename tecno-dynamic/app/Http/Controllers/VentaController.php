<?php

namespace App\Http\Controllers;

use App\Venta;
use App\VentaDetalle;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index() 
    {
        $ventas = Venta::all();
        return view('venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venta.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
      
       // $this->validate($request);

       $nitBD = DB::table('proveedors')
                ->select('nit')
                ->where('nit','=',request('nit'))
                ->exists();
        
        $nomBD = DB::table('proveedors')
                ->select('nombre_empresa')
                ->where('nombre_empresa','=',request('nombre_empresa'))
                ->exists();

        if($nitBD == false && $nomBD==false){
            
       
        $venta = new Venta();
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

        else{
        return redirect('/venta')->with('Estado','El codigo de producto ya esta registrado'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta) 
    {
        return view('venta.view', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        return view('venta.edit', compact('venta'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect('/venta');
    }
} 
