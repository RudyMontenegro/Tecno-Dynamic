<?php

namespace App\Http\Controllers;
 
use App\Categoria;
use App\Productos;
use App\Proveedor;
use App\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = DB::table('productos')
                    ->join('categorias', 'categorias.id', '=', 'productos.id_categoria')
                    ->select('categorias.nombre as categoria','productos.codigo_barra','productos.nombre','productos.id')
                    ->paginate(10,['*'],'producto');
        $categoria = Categoria::paginate(3,['*'],'categoria');
        return view('producto.index',['producto'=>$producto,'categoria'=>$categoria]);
    }

    public function prueba(){
        return view('producto.prueba');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor = Proveedor::all();
        $categoria = Categoria::all();
        $sucursal = Sucursal::all();
        return view('producto.create',['proveedor'=>$proveedor,'categoria'=>$categoria,'sucursal'=>$sucursal]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $producto = new Productos();

            $producto->codigo = request('codigo');
            $producto->codigo_barra = request('codigoBarra');
            $producto->nombre = request('nombre');
            $producto->marca = request('marca');
            $producto->precio_costo = request('precioCosto');
            $producto->precio_venta_mayor = request('precioVentaMayor');
            $producto->precio_venta_menor = request('precioVentaMenor');
            $producto->cantidad = $request->get('cantidad');
            $producto->unidad = $request->get('unidad');
            $producto->cantidad_inicial = $request->get('cantidadInicial');
            $producto->id_proveedor = $request->get('proveedor');
            $producto->id_categoria = $request->get('categoria');
            $producto->id_sucursal = $request->get('sucursal');

            if($request->hasfile('foto')){
        
                $file =$request->foto;
                
                $producto['ruta_foto']=$request->file('foto')->store('fotos','public');
                
                //$file->move(public_path().'/firmas',$file->getClientOriginalName());
                $producto->foto=$file->getClientOriginalName();
            }

            $producto->save();

            return redirect('producto');
       

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos, $id)
    {
        $producto = DB::table('productos')
        ->select('*')
        ->where('id','=',$id)->first();

        $proveedors = DB::table('productos')
        ->join('proveedors','productos.id_proveedor','=','proveedors.id')
        ->select('*')
        ->where('productos.id','=',$id)->first();

        return view('producto.view',['producto' => $producto,'proveedors' => $proveedors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $productos,$id)
    {
        $producto = DB::table('productos')
        ->select('*')
        ->where('id','=',$id)->first();

        $proveedors = DB::table('productos')
        ->join('proveedors','productos.id_proveedor','=','proveedors.id')
        ->select('*')
        ->where('productos.id','=',$id)->first();

        $proveedor = Proveedor::all();
        return view('producto.edit',['producto' => $producto,'proveedor' => $proveedor,'proveedors' => $proveedors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $productos, $id)
    {
        $producto = Productos::FindOrFail($id);

        $producto->codigo = request('codigo');
        $producto->codigo_barra = request('codigoBarra');
        $producto->nombre = request('nombre');
        $producto->categoria = request('categoria');
        $producto->marca = request('marca');
        $producto->precio_costo = request('precioCosto');
        $producto->precio_venta_mayor = request('precioVentaMayor');
        $producto->precio_venta_menor = request('precioVentaMenor');
        $producto->cantidad = $request->get('cantidad');
        $producto->unidad = $request->get('unidad');
        $producto->cantidad_inicial = $request->get('cantidadInicial');
        $producto->id_proveedor = $request->get('proveedor');
        
        if($request->hasfile('foto')){

            //Storage::disk('public')->delete('/firmas'.$auxiliar->firma);
                 
                $file =$request->foto;
                Storage::delete('public/'.$producto->foto);
                $producto['ruta_foto']=$request->file('foto')->store('fotos','public');
               
        
                $producto->foto=$file->getClientOriginalName();

            //$file->move(public_path().'/firmas',$file->getClientOriginalName());
            //$auxiliar->firma=$file->getClientOriginalName();
        }

        $producto->update();

        return redirect('producto');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos,$id)
    {
        $producto = Productos::FindOrFail($id);
        Storage::delete('public/'.$producto->ruta_foto);
        Productos::destroy($id);
        return redirect('producto');
    }

    public function validar(Sucursal $sucursal)
    {
        $db_handle = new Productos();

        if(!empty($_POST["nombre"])) {
            $user_count = $db_handle->numRows($_POST["nombre"]);
            $contador = $db_handle->cuenta($_POST["nombre"]);
            if($contador < 3){
                echo "<span  class='menor'><h5 class='menor'>Ingrese de 3 a 50 caracteres</h5></span>";
            }else{
                if($user_count>0) {
                    echo "<span  class='estado-no-disponible-usuario'><h5 class='estado-no-disponible-usuario'>Nombre de producto no disponible</h5></span>";
                }else{
                    echo "<span class='estado-disponible-usuario'><h5 class='estado-disponible-usuario'>Nombre disponible</h5></span>";
                }
            }
            
        } 
    }

    public function validarCodigo(Sucursal $sucursal)
    {
        $db_handle = new Productos();

        if(!empty($_POST["codigo"])) {
            $user_count = $db_handle->numRows2($_POST["codigo"]);
            $contador = $db_handle->cuenta2($_POST["codigo"]);
            if($contador < 3){
                echo "<span  class='menor'><h5 class='menor'>Ingrese de 3 a 50 caracteres</h5></span>";
            }else{
                if($user_count>0) {
                    echo "<span  class='estado-no-disponible-usuario'><h5 class='estado-no-disponible-usuario'>Codigo de producto no disponible</h5></span>";
                }else{
                    echo "<span class='estado-disponible-usuario'><h5 class='estado-disponible-usuario'>Codigo disponible</h5></span>";
                }
            }
            
        }
    }

    public function validarCodigoBarra(Sucursal $sucursal)
    {
        $db_handle = new Productos();

        if(!empty($_POST["codigoBarra"])) {
            $user_count = $db_handle->numRows3($_POST["codigoBarra"]);
            $contador = $db_handle->cuenta3($_POST["codigoBarra"]);
            if($contador < 3){
                echo "<span  class='menor'><h5 class='menor'>Ingrese de 3 a 50 caracteres</h5></span>";
            }else{
                if($user_count>0) {
                    echo "<span  class='estado-no-disponible-usuario'><h5 class='estado-no-disponible-usuario'>Codigo Barra de producto no disponible</h5></span>";
                }else{
                    echo "<span class='estado-disponible-usuario'><h5 class='estado-disponible-usuario'>Codigo Barra disponible</h5></span>";
                }
            }
            
        }
    }
} 
