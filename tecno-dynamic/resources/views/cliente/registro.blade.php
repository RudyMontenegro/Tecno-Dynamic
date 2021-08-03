@extends('layouts.panel')
@section('subtitulo','clientes')
@section('content')

<div class="card shadow">
<div class="box-header ">
                  <h3 class="text-center">INFORMACION PERSONAL</h3>
            </div></br>  
            <div class="col-md-6 mx-auto " >
              <h2 >
                  @include('Mensaje.nota')
             </h2> 
    </div> 
 
<form action="{{ url('registrarCliente')}}" method="post">
    {{csrf_field()}}
<div class="col-md-11 mx-auto">

  
   <div class = 'row'>

      <div class="col-5">
       <label form="nit">NIT</label>
       <input class="form-control {{$errors->has('nit')?'is-invalid':'' }}" type="text" name="nit" id="nit" 
       placeholder="Ingrese el NIT" value="{{ old('nit') }}">

       {!!  $errors->first('nit','<div class="invalid-feedback">:message</div>') !!}

      </div>  
      <div class="col-5">
       <label form="empresa">Nombre de Empresa</label>
       <input class="form-control {{$errors->has('nombre_empresa')?'is-invalid':'' }}" type="text" name="nombre_empresa" id="nombre_empresa"  
       Placeholder="Ingrese el nombre de la empresa" value="{{ old('empresa') }}">

       {!!  $errors->first('nombre_empresa','<div class="invalid-feedback">:message</div>') !!}

      </div>  
       <div class="col-5"> 
        <label form="contacto">Nombre de Contacto</label>
        <input class="form-control {{$errors->has('nombre_contacto')?'is-invalid':'' }}" type="text" name="nombre_contacto" id="nombre_contacto"  
        Placeholder="Ingrese el nombre del contacto" value="{{ old('contacto') }}">

        {!!  $errors->first('nombre_contacto','<div class="invalid-feedback">:message</div>') !!}

      </div>

      <div class="col-5">
        <label form="direccion">Direccion</label>
        <input class="form-control {{$errors->has('direccion')?'is-invalid':'' }}" type="text" name="direccion" id="direccion" 
        Placeholder="Ingrese la direccion" value="{{ old('direccion') }}">

        {!!  $errors->first('direccion','<div class="invalid-feedback">:message</div>') !!}

      </div>
      <div class="col-5">
       <label form="telefono">Telefono</label>
       <input class="form-control {{$errors->has('telefono')?'is-invalid':'' }}" type="number" name="telefono" id="telefono"  
       Placeholder="Ingrese su telefono" value="{{ old('telefono') }}">

       {!!  $errors->first('telefono','<div class="invalid-feedback">:message</div>') !!}
                      
      </div>
       <div class="col-5">
        <label form="correo">Correo</label>
        <input class="form-control {{$errors->has('email')?'is-invalid':'' }}" type="email" name="email" id="email" 
        Placeholder="Ingrese su correo"  value="{{ old('correo') }}">

        {!!  $errors->first('email','<div class="invalid-feedback">:message</div>') !!}
  
       </div>
        <div class="col-5">
         <label form="web">Sitio Web</label>
         <input class="form-control {{$errors->has('web_site')?'is-invalid':'' }}" type="email" name="web_site" id="web_site" 
         Placeholder="Ingrese el sitio web"  value="{{ old('web') }}">

         {!!  $errors->first('web_site','<div class="invalid-feedback">:message</div>') !!}
                       
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
