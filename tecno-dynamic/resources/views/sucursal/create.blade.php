@extends('layouts.panel')

@section('subtitulo','sucursal')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="card shadow">
    <div class="card-header border-0">
         <h1 class="text-center">REGISTRO DE NUEVA SUCURSAL</h1>
         
    </div>
    <div class="col-md-6 mx-auto " >
            <h2 >
             @include('Mensaje.nota')
         </h2> 
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
        function comprobarSucursal() {
            $("#loaderIcon").show();
            
            jQuery.ajax({
            url: "/sucursal/validar",
            data:{
                "_token": "{{ csrf_token() }}",
                "nombre": $("#nombre").val(),
            },
            asycn:false,
            type: "POST",
            success:function(data){
                $("#estadoSucursal").html(data);
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
        </style>
<form action="{{url('/sucursal/registrarSucursal')}}" class="form" method="post" enctype="multipart/form-data">

    {{ csrf_field()}}
   

   <div class="col-md-11 mx-auto "> 

<div class="row">
    <div class="col-3">
    </div>    
    <div class="col-6">
        <label for="nombre"class="control-label">{{'Nombre'}}</label>
        <input type="text" class="form-control  {{$errors->has('nombre')?'is-invalid':'' }}" name="nombre" id="nombre" 
        value="{{ isset($sucursal->nombre)?$sucursal->nombre:old('nombre')  }}" onBlur="comprobarSucursal()" 
        >
        <span id="estadoSucursal"></span>
    {!!  $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="row">
    <div class="col-3">
    </div>    
    <div class="col-6">

        <label for="responsable" class="control-label">{{'Responsable'}}</label>
        <input type="text" class="form-control  {{$errors->has('responsable')?'is-invalid':'' }}" name="responsable" id="responsable" 
        value="{{ isset($sucursal->responsable)?$sucursal->responsable:old('responsable') }}"
        >
        {!!  $errors->first('responsable','<div class="invalid-feedback">:message</div>') !!}
       

    </div> 
</div>  

<br>
<br>
<div class="row">
    <div class="col-3">
    </div>   
    <div class="col-5">  
        <a href="{{url('sucursal')}}"class="btn btn-primary">Regresar</a>
    </div>
    <div class="col-1">       
        <input type="submit" class="btn btn-success float-right"  value="Guardar">
    </div>
</div>
</div>

</form>


<br>

</div>


@endsection