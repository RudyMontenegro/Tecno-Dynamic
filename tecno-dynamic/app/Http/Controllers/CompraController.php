<?php

namespace App\Http\Controllers;

use App\Compra;
use App\CompraDetalle;
use App\Proveedor;
use App\Sucursal;
use App\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Sabberworm\CSS\Value\Size;

class CompraController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::paginate(10);
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
        $sucursal = Sucursal::all();
        return view('compra.create',['proveedor'=>$proveedor,'sucursal'=>$sucursal]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    public function nombre(Request $request, $id)
    {
        if($request->ajax()){
            $codigo=Productos::nombres($id);
            return response()->json( $codigo);
        }
    }



    public function store(Request $request) 
    {
        $compra = new Compra();
        
        $compra->comprobante = request('comprobante');
        $compra->responsable_compra = request('responsable_compra');
        $compra->fecha = request('fecha');
        $compra->tipo_compra = $request->get('tipo_compra');
        $compra->observaciones = request('observaciones');
        $compra->id_sucursal = request('sucursal');
        $compra->id_proveedor = $request->get('proveedor');

        $compra->save();

        $id_compra = DB::table('compras')
                   ->select('id')
                   ->where('fecha','=', request('fecha'))
                   ->first();

        if($request->input('codigoP') && $request->input('nombre') && $request->input('cantidad') && $request->input('unidad') && $request->input('precio') && $request->input('sub_total')){
            $codigo = request('codigoP');
            $nombre = request('nombre');
            $cantidad = request('cantidad');
            $unidad = request('unidad');
            $precio = request('precio');
            $sub_total = request('sub_total');

            for($i=0; $i < sizeof($nombre); $i++){
                
                $id_codigo_producto = DB::table('productos')
                                    ->select('id')
                                    ->where('codigo','=',$codigo[$i])
                                    ->first();

                $compra_detalle = new CompraDetalle();

                $compra_detalle-> codigo_producto =  $id_codigo_producto->id;
                $compra_detalle-> nombre = $nombre[$i];
                $compra_detalle-> cantidad = $cantidad[$i];
                $compra_detalle-> unidad = $unidad[$i];
                $compra_detalle-> precio = $precio[$i];
                $compra_detalle-> sub_total = $sub_total[$i];
                $compra_detalle-> id_compra = $id_compra->id;

                $compra_detalle->save();

        
            }
        }
        return redirect('compra');
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
    public function edit(Compra $compra, $id)
    {
        $compra = DB::table('compras')
        ->select('*')
        ->where('id','=',$id)
        ->first();

        $proveedors = DB::table('compras')
        ->join('proveedors','compras.id_proveedor','=','proveedors.id')
        ->select('*')
        ->where('compras.id','=',$id)->first();
        return view('compra.edit',['compra' => $compra,'proveedor' => $proveedors]);
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra,$id)
    {
        $compra = Compra::FindOrAll($id);

        $compra->comprobante = $request->input('comprobante');
        $compra->responsable_compra = $request->input('responsable_compra');
        $compra->fecha = $request->input('fecha');
        $compra->tipo_compra = $request->input('tipo_compra');
        $compra->observaciones = $request->input('observaciones');
        $compra->id_sucursal = $request->input('sucursal');
        $compra->id_proveedor = $request->input('proveedor');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra, $id)
    {
        Compra::destroy($id);
        return redirect('compra');
    }
    public function llenado()
    {
        $db_handle = new CompraDetalle();
        $existe = $db_handle->existe($_POST["codigoP"],$_POST["sucursal"]);

        if(!empty($_POST["codigoP"]) && !empty($_POST["sucursal"])){

            if($existe == 0){
                echo "<span  class='estado-nulo'><h5 class='estado-nulo'>No existe codigo de producto</h5></span>";
            }else{
                echo "<span  class='estado-nulo'><h5 class='estado-nulo'> </h5></span>";
            }
        }else{
            echo "<span  class='estado-nulo'><h5 class='estado-nulo'> </h5></span>";
        }
        
        
    }

}
