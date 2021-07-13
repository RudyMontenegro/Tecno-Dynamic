<?php

namespace App\Http\Controllers;

use App\Productos;
use App\Proveedor;
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
        return view('producto.index',['producto'=>$producto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor = Proveedor::all();
        return view('producto.create',['proveedor'=>$proveedor]);
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
*/

        $producto = new Productos();

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
        Productos::destroy($id);
        return redirect('producto');
    }
}
