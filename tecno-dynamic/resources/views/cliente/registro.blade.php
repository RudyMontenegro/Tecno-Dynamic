@extends('layouts.panel')
@section('subtitulo','clientes')
@section('content2')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
   
  </ol>
</nav>

        
<form action="{{ url('/admin/personas')}}" method="post" enctype="multipart/form-data">
    <div class="container ">
        <br/>
        <div class="row">
            <div class="col-md-4 col-md-offset-4"> 
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="panel panel-heading">
                        <label>{{'INFORMACIÓN PERSONAL'}}</label>
                        </br>

                        <label form="id">ID</label>
                        <input class="form-control {{$errors->has('id_numero')?'is-invalid':'' }}" type="text" name="id_numero" id="idhd" placeholder="Ingrese el ID" value="{{ old('id_numero') }}">

                        <label form="nit">NIT</label>
                        <input class="form-control {{$errors->has('id_numero')?'is-invalid':'' }}" type="text" name="nit" id="nit" placeholder="Ingrese el ID" value="{{ old('nit') }}">

                        <label form="empresa">Nombre de Empresa</label>
                        <input class="form-control" type="text" name="empresa" id="empresa"  Placeholder="Ingrese el nombre de la empresa" value="{{ old('empresa') }}">

                        <label form="contacto">Nombre de Contacto</label>
                        <input class="form-control" type="text" name="contacto" id="contacto"  Placeholder="Ingrese el nombre del contacto" value="{{ old('contacto') }}">

                        <label form="direccion">Direccion</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" Placeholder="Ingrese la direccion" value="{{ old('direccion') }}">

                        <label form="telefono">Telefono</label>
                        <input class="form-control" type="number" name="telefono" id="telefono"  Placeholder="Ingrese su telefono" value="{{ old('telefono') }}">
                      
                        <label form="correo">Correo</label>
                        <input class="form-control" type="email" name="correo" id="correo" Placeholder="Ingrese su correo"  value="{{ old('correo') }}">
  
                        <label form="web">Sitio Web</label>
                        <input class="form-control" type="email" name="web" id="web" Placeholder="Ingrese el sitio web"  value="{{ old('web') }}">
                         
                         </br>
                         </br>
                         <a href="{{ url('/cliente')}}" class="btn btn-primary my-2 my-sm-0">Atras</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
