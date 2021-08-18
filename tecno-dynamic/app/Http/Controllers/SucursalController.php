<?php

namespace App\Http\Controllers;

use App\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursal = Sucursal::all();
        return view('sucursal.index',compact('sucursal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sucursal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sucursal = new Sucursal();
        $sucursal->nombre = request('nombre');
        $sucursal->responsable = request('responsable');
        $sucursal->save();
        return redirect('sucursal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursal $sucursal, $id)
    {
        $sucursal = Sucursal::findOrFail($id);
        return view('sucursal.edit',compact('sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sucursal = Sucursal::FindOrFail($id);

        $sucursal->nombre = request('nombre');
        $sucursal->responsable = request('responsable');
        
        $sucursal->update();

        return redirect('sucursal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sucursal $sucursal,$id)
    {
        Sucursal::destroy($id);
        return redirect('sucursal');
    }
    public function validar(Sucursal $sucursal)
    {
        $db_handle = new Sucursal();

        if(!empty($_POST["nombre"])) {
            $query = "SELECT * FROM sucursals WHERE nombre='" . $_POST["nombre"] . "'";
            $user_count = $db_handle->numRows($_POST["nombre"]);
            if($user_count>0) {
                echo "<span class='estado-no-disponible-usuario'> Usuario NO Disponible.</span>";
            }else{
                echo "<span class='estado-disponible-usuario'> Usuario Disponible.</span>";
            }
        }
    }

}
