@extends('layouts.panel')
@section('subtitulo','clientes')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
   
  </ol>
</nav>

<div class="box-header ">
                  <h3 class="text-center">INFORMACION PERSONAL</h3>
            </div></br>    
<form action="{{ url('/admin/personas')}}" method="post" enctype="multipart/form-data">
    
<div class="col-md-11 mx-auto">


<div class = 'row'>

    <div class="col-5">
    <label form="id">ID</label>
                            <input class="form-control {{$errors->has('id_numero')?'is-invalid':'' }}" type="text" name="id_numero" id="idhd" placeholder="Ingrese el ID" value="{{ old('id_numero') }}">

    </div>
    <div class="col-5">
    <label form="nit">NIT</label>
                            <input class="form-control {{$errors->has('id_numero')?'is-invalid':'' }}" type="text" name="nit" id="nit" placeholder="Ingrese el ID" value="{{ old('nit') }}">

    </div>  
    <div class="col-5">
    <label form="empresa">Nombre de Empresa</label>
                        <input class="form-control" type="text" name="empresa" id="empresa"  Placeholder="Ingrese el nombre de la empresa" value="{{ old('empresa') }}">

    </div>  
    <div class="col-5"> 
    <label form="contacto">Nombre de Contacto</label>
                        <input class="form-control" type="text" name="contacto" id="contacto"  Placeholder="Ingrese el nombre del contacto" value="{{ old('contacto') }}">
    </div>

    <div class="col-5">
    <label form="direccion">Direccion</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" Placeholder="Ingrese la direccion" value="{{ old('direccion') }}">

    </div>
    <div class="col-5">
    <label form="telefono">Telefono</label>
                        <input class="form-control" type="number" name="telefono" id="telefono"  Placeholder="Ingrese su telefono" value="{{ old('telefono') }}">
                      
    </div>
    <div class="col-5">
    <label form="correo">Correo</label>
                        <input class="form-control" type="email" name="correo" id="correo" Placeholder="Ingrese su correo"  value="{{ old('correo') }}">
  
    </div>
    <div class="col-5">
    <label form="web">Sitio Web</label>
                        <input class="form-control" type="email" name="web" id="web" Placeholder="Ingrese el sitio web"  value="{{ old('web') }}">
                       
    </div>
</div>
                         </br>
                         </br>
                         <div class="form-group">
                        <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Agregar">
                        <a href="{{ url('/cliente')}}" class="btn btn-primary my-2 my-sm-0">Atras</a>
                        
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
