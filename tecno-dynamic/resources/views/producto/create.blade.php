@extends('layouts.panel')

@section('subtitulo',' ')
@section('content')



<div class="card shadow">
    <div class="card-header border-0">
         <h1 class="text-center">REGISTRO DE NUEVO PRODUCTO</h1>
         
    </div>
    <div class="col-md-6 mx-auto " >
            <h2 >
             @include('Mensaje.nota')
         </h2> 
    </div>
     

    <script>
        function comprobarNombre() {
            $("#loaderIcon").show();
            
            jQuery.ajax({
            url: "/producto/validar",
            data:{
                "_token": "{{ csrf_token() }}",
                "nombre": $("#nombre").val(),
            },
            asycn:false,
            type: "POST",
            success:function(data){
                $("#estadoProducto").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){
                console.log('no da');
            }
            });
        }
    </script>
    <style>
        .estado-no-disponible-usuario {
            color:#D60202;
        }
        .estado-disponible-usuario {
            color:#2FC332;
        }
        .menor{
            color:#D60202;
        }
    </style>

<form action="{{url('/producto/registrarProducto')}}" class="form" method="post" enctype="multipart/form-data">

    {{ csrf_field()}}
   

   <div class="col-md-11 mx-auto "> 

<div class="row">
    <div class="col-5">

        <label for="codigo" class="control-label">{{'Codigo'}}</label>
        <input type="text" class="form-control  {{$errors->has('codigo')?'is-invalid':'' }}" name="codigo" id="codigo" 
        value="{{ isset($personal->nombre)?$personal->nombre:old('codigo') }}"
        >
        {!!  $errors->first('codigo','<div class="invalid-feedback">:message</div>') !!}
       

    </div> 
    <div class="col-5">
        <label for="codigoBarra"class="control-label">{{'Codigo Barra'}}</label>
        <input type="text" class="form-control  {{$errors->has('codigoBarra')?'is-invalid':'' }}" name="codigoBarra" id="codigoBarra" 
        value="{{ isset($personal->email)?$personal->email:old('codigoBarra')  }}"
        >
    {!!  $errors->first('codigoBarra','<div class="invalid-feedback">:message</div>') !!}
    </div>
   
</div>
<div class="row"> 
    <div class="col-5">
        <label for="nombre"class="control-label">{{'Nombre'}}</label>
        <input type="text" class="form-control  {{$errors->has('nombre')?'is-invalid':'' }}" name="nombre" id="nombre" 
        value="{{ isset($personal->apellido)?$personal->apellido:old('nombre') }}" onblur="comprobarNombre()"
        ><span id="estadoProducto"></span>
        {!!  $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-5">
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria" class="form-control  {{$errors->has('categoria')?'is-invalid':'' }}">
        <option selected disabled>Elige una Categoria</option>
        @foreach ($categoria as $categoria)
            <option {{ old('categoria') == $categoria->id ? "selected" : "" }} value="{{$categoria->id}}">{{$categoria->nombre}}</option>
        @endforeach
        </select>
        {!!  $errors->first('categoria','<div class="invalid-feedback">:message</div>') !!}
    </div>
                   
    
</div>
<div class="row">
    <div class="col-5">
        <label for="marca"class="control-label">{{'Marca'}}</label>
        <input type="text" class="form-control  {{$errors->has('marca')?'is-invalid':'' }}" name="marca" id="marca" 
        value="{{ isset($personal->codigoSis)?$personal->codigoSis:old('marca') }}"
        >
        {!!  $errors->first('marca','<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-5">
        <label for="precioCosto"class="control-label">{{'Precio Costo'}}</label>
        <input type="number" step="0.01" class="form-control  {{$errors->has('precioCosto')?'is-invalid':'' }}" name="precioCosto" id="precioCosto" 
        value="{{ isset($personal->codigoSis)?$personal->codigoSis:old('precioCosto') }}"
        >
        {!!  $errors->first('precioCosto','<div class="invalid-feedback">:message</div>') !!}
    </div>
       
</div>
<div class="row">
    <div class="col-5">
        <label for="precioVentaMayor"class="control-label">{{'Precio Venta Mayor'}}</label>
        <input type="number" step="0.01"class="form-control  {{$errors->has('precioVentaMayor')?'is-invalid':'' }}" name="precioVentaMayor" id="precioVentaMayor" 
        value="{{ isset($personal->telefono)?$personal->telefono:old('precioVentaMayor')  }}"
        >
        {!!  $errors->first('precioVentaMayor','<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-5">
        <label for="precioVentaMenor"class="control-label">{{'Precio Venta Menor'}}</label>
        <input type="number" step="0.01" class="form-control  {{$errors->has('precioVentaMenor')?'is-invalid':'' }}" name="precioVentaMenor" id="precioVentaMenor" 
        value="{{ isset($personal->telefono)?$personal->telefono:old('precioVentaMenor')  }}"
        >
        {!!  $errors->first('precioVentaMenor','<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>  
<div class="row">
    <div class="col-5">
            <label for="cantidad"class="control-label">{{'Cantidad'}}</label>
            <input type="text" class="form-control  {{$errors->has('cantidad')?'is-invalid':'' }}" name="cantidad" id="cantidad" 
            value="{{ isset($personal->password)?$personal->password:old('cantidad') }}"
            >
            {!!  $errors->first('cantidad','<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-5">
            <label for="unidad"class="control-label">{{'Unidad'}}</label>
            <input type="text" class="form-control  {{$errors->has('unidad')?'is-invalid':'' }}" name="unidad" id="unidad" 
            value="{{ isset($personal->password)?$personal->password:old('unidad') }}"
            >
            {!!  $errors->first('unidad','<div class="invalid-feedback">:message</div>') !!}
        </div>
</div> 
<div class="row">
    <div class="col-5">
            <label for="cantidadInicial"class="control-label">{{'Cantidad Inicial'}}</label>
            <input type="text" class="form-control  {{$errors->has('cantidadInicial')?'is-invalid':'' }}" name="cantidadInicial" id="cantidadInicial" 
            value="{{ isset($personal->password)?$personal->password:old('cantidadInicial') }}"
            >
            {!!  $errors->first('cantidadInicial','<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-5">
            <label for="foto"class="control-label">{{'Foto'}}</label>
            <input type="file" class="form-control  {{$errors->has('foto')?'is-invalid':'' }}" name="foto" id="foto" 
            value="{{ isset($personal->password)?$personal->password:old('foto') }}"
            >
            {!!  $errors->first('foto','<div class="invalid-feedback">:message</div>') !!}
        </div>
</div>  
<div class="row">
    <div class="col-5">
        <label for="proveedor">Proveedor</label>
        <select name="proveedor" id="proveedor" class="form-control  {{$errors->has('proveedor')?'is-invalid':'' }}">
        <option selected disabled>Elige un Proveedor</option>
        @foreach ($proveedor as $proveedor)
            <option {{ old('proveedor') == $proveedor->id ? "selected" : "" }} value="{{$proveedor->id}}">{{$proveedor->nombre_empresa}}</option>
        @endforeach
        </select>
        {!!  $errors->first('proveedor','<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-5">
        <label for="sucursal">Sucursal</label>
        <select name="sucursal" id="sucursal" class="form-control  {{$errors->has('sucursal')?'is-invalid':'' }}">
        <option selected disabled>Elige una Sucursal</option>
        @foreach ($sucursal as $sucursal)
            <option {{ old('sucursal') == $sucursal->id ? "selected" : "" }} value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
        @endforeach
        </select>
        {!!  $errors->first('sucursal','<div class="invalid-feedback">:message</div>') !!}
    </div>
       
</div> 
<br>
<div class="row">
    
    <div class="col-5">  
        <a href="{{url('producto')}}"class="btn btn-primary">Regresar</a>
    </div>
    <div class="col-5">       
        <input type="submit" class="btn btn-success float-right" value="Guardar">
    </div>
</div>
</div>
</form>
<br>

</div>

@endsection