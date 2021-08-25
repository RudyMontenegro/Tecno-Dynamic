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
        $producto = Productos::all();
        $categoria = Categoria::all();
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
        /*
        $campos=[
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'apellido' => 'required|regex:/^[\pL\s\-]+$/u|max:50',
            'codigoSis' => 'required|numeric|unique:App\PersonalAcademico,codigoSis',
            'email' => 'required|email:rfc,dns|max:30|unique:App\PersonalAcademico,email',
            'telefono' => 'required|numeric|digits_between:7,8',
            'password' => 'required|min:8|max:20',
            'rol' => 'required',
            'unidad' => 'required',
            'facultad' => 'required',
            'carrera' => 'required',
            
        ];

        $Mensaje = [
                
            "required"=>'El campo es requerido',
            "rol.required"=>'Seleccione un cargo',
            "unidad.required"=>'Seleccione una unidad',
            "facultad.required"=>'Seleccione una facultad',
            "carrera.required"=>'Seleccione una carrera',
            "nombre.regex"=>'Solo se acepta caracteres A-Z',
            "apellido.regex"=>'Solo se acepta caracteres A-Z,chale',
            "password.min"=>'Solo se acepta 8 caracteres como minimo',
            "nombre.max"=>'Solo se acepta 50 caracteres como maximo',
            "apellido.max"=>'Solo se acepta 50 caracteres como maximo',
            "email.max"=>'Solo se acepta 30 caracteres como maximo',
            "telefono.digits_between"=>'El numero no existe',
            "password.max"=>'Solo se acepta 20 caracteres como maximo',
            "numeric"=>'Solo se acepta números',
            "codigoSis.unique"=>'Codigo Sis ya registrado',
            "email.unique"=>'Correo ya registrado',
            "email"=>'El correo no existe',
                   ];
        $this->validate($request,$campos,$Mensaje);
                   regex:/^[\pL\s\-]+$/u

*/

            $campos=[
                'codigo' => 'required|unique:productos,codigo|max:50|min:3',
                'codigoBarra' => 'required|unique:productos,codigo_barra|max:50|min:3',
                'nombre' => 'required|unique:productos,nombre|max:50|min:3',
                'categoria' => 'required',
                'marca' => 'required',
                'precioCosto' => 'required',
                'precioVentaMayor' => 'required',
                'precioVentaMenor' => 'required',
                'cantidad' => 'required',
                'unidad' => 'required',
                'cantidadInicial' => 'required',
                'proveedor' => 'required',
                'foto' => 'required',
            ];

            $Mensaje = [
                
                "required"=>'El campo es requerido',
                "proveedor.required"=>'Seleccione un proveedor',
                "categoria.required"=>'Seleccione una categoria',
                "foto.required"=>'Seleccione una imagen',
                "nombre.regex"=>'Solo se acepta caracteres A-Z',
                "min"=>'Solo se acepta 3 caracteres como minimo',
                "max"=>'Solo se acepta 50 caracteres como maximo',
                "numeric"=>'Solo se acepta números',
                "codigo.unique"=>'Codigo de producto ya registrado',
                "codigoBarra.unique"=>'Codigo barra de producto ya registrado',
                "nombre.unique"=>'Nombre de producto ya registrado',
                "email.unique"=>'Correo ya registrado',
                "email"=>'El correo no existe',
            ];
 
            $this->validate($request,$campos,$Mensaje);

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
} 
