@extends('layouts.panel')

@section('subtitulo','PRODUCTOS')
@section('content')
<form action="{{url('/personalAcademico')}}" class="form-horizontal" method="post" enctype="multipart/form-data">

    {{ csrf_field()}}
   <h1 class="text-center">REGISTRO DE NUEVO PRODUCTO</h1> 

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
        value="{{ isset($personal->apellido)?$personal->apellido:old('nombre') }}"
        >
        {!!  $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-5">
        <label for="categoria"class="control-label">{{'Categoria'}}</label>
        <input type="text" class="form-control  {{$errors->has('categoria')?'is-invalid':'' }}" name="categoria" id="categoria" 
        value="{{ isset($personal->apellido)?$personal->apellido:old('categoria') }}"
        >
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
        <input type="text" class="form-control  {{$errors->has('precioCosto')?'is-invalid':'' }}" name="precioCosto" id="precioCosto" 
        value="{{ isset($personal->codigoSis)?$personal->codigoSis:old('precioCosto') }}"
        >
        {!!  $errors->first('precioCosto','<div class="invalid-feedback">:message</div>') !!}
    </div>
       
</div>
<div class="row">
    <div class="col-5">
        <label for="precioVentaMayor"class="control-label">{{'Precio Venta Mayor'}}</label>
        <input type="text" class="form-control  {{$errors->has('precioVentaMayor')?'is-invalid':'' }}" name="precioVentaMayor" id="precioVentaMayor" 
        value="{{ isset($personal->telefono)?$personal->telefono:old('precioVentaMayor')  }}"
        >
        {!!  $errors->first('precioVentaMayor','<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-5">
        <label for="precioVentaMenor"class="control-label">{{'Precio Venta Menor'}}</label>
        <input type="text" class="form-control  {{$errors->has('precioVentaMenor')?'is-invalid':'' }}" name="precioVentaMenor" id="precioVentaMenor" 
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
            value="{{ isset($personal->password)?$personal->password:old('cantidad') }}"
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


@endsection