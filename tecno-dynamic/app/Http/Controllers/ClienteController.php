<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
 
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.registro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'nit' => 'required|unique:clientes,nit|max:50|min:3',
            'nombre_empresa' => 'required|unique:clientes,nombre_empresa|max:50|min:3',
            'nombre_contacto' => 'required|unique:clientes,nombre_contacto|max:50|min:3',
            'direccion' => 'required',
            'telefono' => 'required|unique:clientes,telefono',
            'email' => 'required ',
            'web_site' => 'required',
        
        ];

        $Mensaje = [
            
            "required"=>'El campo es requerido',
            "regex"=>'Solo se admiten letras',
            "min"=>'Solo se acepta 3 caracteres como minimo',
            "max"=>'Solo se acepta 50 caracteres como maximo',
            "numeric"=>'Solo se acepta números' ,
            "telefono.unique" => 'El numero de telefono ya esta registrado',
            "nombre_contacto" => 'El nombre del contacto ya esta registrado', 
        ];

        $this->validate($request,$campos,$Mensaje);

            $cliente = new Cliente();

            $cliente->nit = request('nit');
            $cliente->nombre_empresa = request('nombre_empresa');
            $cliente->nombre_contacto = request('nombre_contacto');
            $cliente->direccion = request('direccion');
            $cliente->telefono = request('telefono');
            $cliente->email = request('email');
            $cliente->web_site = request('web_site');
            
            $cliente->save();
            return redirect('cliente');

    }

    /*


        $cliente = new Cliente();
        $cliente->nit = $request->input('nit');
        $cliente->nombre_empresa = $request->input('nombre_empresa');
        $cliente->nombre_contacto = $request->input('nombre_contacto');
        $cliente->direccion = $request->input('direccion');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->web_site = $request->input('web_site');
        $cliente->save();
        return redirect('cliente');
    }
    */
    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $cliente = DB::table('clientes')
            ->select('*')
            ->where('id','=',$id)
            ->first();

        return view('cliente.editar', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente-> Clientes::FindOrAll($id);
        $cliente->nit = $request->input('nit');
        $cliente->nombre_empresa = $request->input('nombre_empresa');
        $cliente->nombre_contacto = $request->input('nombre_contacto');
        $cliente->direccion = $request->input('direccion');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->web_site = $request->input('web_site');

        $cliente->update();
        return redirect('cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente, $id)
    {
        Cliente::destroy($id);
        return redirect('cliente');
    }
    //public function registro(){
     //   return view('cliente.registro');
    //}
    // public function registrarCliente(){
       // return view('cliente.registro');
    //}
}
