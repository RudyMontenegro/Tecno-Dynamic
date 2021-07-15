@extends('layouts.panel')

@section('content')
<div class="card shadow">
<div class="box-header ">
                  <h3 class="text-center">EDITAR CLIENTE</h3>
            </div></br>   
 
<form action="{{ url('cliente/'.$cliente ->id)}}" method="post">
    {{csrf_field()}}
    @method('PUT')
<div class="col-md-11 mx-auto">

 
<div class = 'row'>

    <div class="col-5">
    <label form="nit">NIT</label>
                            <input class="form-control {{$errors->has('id_numero')?'is-invalid':'' }}" type="text" name="nit" id="nit" placeholder="Ingrese el NIT" value="{{ old('nit, $cliente->nit')}}" required>

    </div>  
    <div class="col-5">
    <label form="empresa">Nombre de Empresa</label>
                        <input class="form-control" type="text" name="nombre_empresa" id="nombre_empresa"  Placeholder="Ingrese el nombre de la empresa" value="{{ old('empresa, $cliente->empresa')}}" required>

    </div>  
    <div class="col-5"> 
    <label form="contacto">Nombre de Contacto</label>
                        <input class="form-control" type="text" name="nombre_contacto" id="nombre_contacto"  Placeholder="Ingrese el nombre del contacto" value="{{ old('contacto, $cliente->contacto')}}" required>
    </div>

    <div class="col-5">
    <label form="direccion">Direccion</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" Placeholder="Ingrese la direccion" value="{{ old('direccion, $cliente->direccion')}}" required>

    </div>
    <div class="col-5">
    <label form="telefono">Telefono</label>
                        <input class="form-control" type="number" name="telefono" id="telefono"  Placeholder="Ingrese su telefono" value="{{ old('telefono, $cliente->telefono')}}" required>
                      
    </div>
    <div class="col-5">
    <label form="correo">Correo</label>
                        <input class="form-control" type="email" name="email" id="email" Placeholder="Ingrese su correo"  value="{{ old('correo, $cliente->correo')}}" required>
  
    </div>
    <div class="col-5">
    <label form="web">Sitio Web</label>
                        <input class="form-control" type="email" name="web_site" id="web_site" Placeholder="Ingrese el sitio web"  value="{{ old('web, $cliente->web')}}" required>
                       
    </div>
</div>
                         </br>
                         </br>
                         <div class="form-group">
                        <input type="submit" class="btn btn-success my-2 my-sm-0" value="Agregar">
                        <a href="{{ url('/cliente')}}" class="btn btn-primary my-2 my-sm-0">Atras</a>
                        
                </div>
            </div>
        </div>
    </div>
</form>
@endsection