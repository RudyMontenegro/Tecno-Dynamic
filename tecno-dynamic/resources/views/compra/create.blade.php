@extends('layouts.panel')
@section('subtitulo','compras')
@section('content')
 
<div class="card shadow" style="background-color:#4F9BF6; color: white; font color: yellow !important">
   <div class="card-header border-0">
       <div class="row align-items-center">
              <div class="col">
                  <h3 class="mb-0">Nueva Orden de Compra</h3>
               </div>

         </div>
    </div>  

    <div class="card-body">
 
       <form action="{{ url('registrarCompra')}}" method="post">
         {{csrf_field()}}
          <div class="col-md-12 mx-auto">

  
            <div class = 'row'>
                 <div class="col-6">
                      <label form="comprobante">Comprobante</label>
                      <input class="form-control {{$errors->has('nit')?'is-invalid':'' }}" type="text" name="comprobante" id="comprobante" 
                             placeholder="Ingrese el comprobante" value="{{ old('nit') }}">

                       {!!  $errors->first('nit','<div class="invalid-feedback">:message</div>') !!}
                 </div>  

                 <div class="col-6">
                        <label form="proveedor">Proveedor</label>
                       <select name="proveedor" id="proveedor" class="form-control  {{$errors->has('proveedor')?'is-invalid':'' }}">
                             <option selected disabled>Elige un Proveedor</option>
                            @foreach ($proveedor as $proveedor)
                            <option {{ old('proveedor') == $proveedor->id ? "selected" : "" }} value="{{$proveedor->id}}">{{$proveedor->nombre_empresa}}</option>
                            @endforeach
                       </select>
                     {!!  $errors->first('proveedor','<div class="invalid-feedback">:message</div>') !!}
                       <div class="col-5">
                       </div>
                 </div> 
            </div>
            <div class="row">
                 <div class="col-6"> 
                     <label form="responsable_compra">Responsable de la compra</label>
                      <input class="form-control {{$errors->has('responsable_compra')?'is-invalid':'' }}" type="text" name="responsable_compra" id="responsable_compra"  
                             Placeholder="Nombre del responsable" value="{{ old('responsable_compra') }}">

                     {!!  $errors->first('nombre_contacto','<div class="invalid-feedback">:message</div>') !!}
                 </div>

                 <div class="col-6">
                    <div class="form-group">
                         <label form="fecha" class="form-control-label">Fecha</label>
                         <input class="form-control" type="date" value="2018-11-23" id="fecha">
                   </div>
                 </div>
             </div>
       
          <div class="row">
                 <div class="col-6">
                        <label form="tipo_compra">Tipo de compra</label>
                        <select class="form-control {{$errors->has('tip0_compra')?'is-invalid':'' }}" name="tipo_compra" id="tipo_compra">
                            <option value="Contado">Contado</option>
                            <option valur="Credito">Credito</option>
                     {!!  $errors->first('tipo_compra','<div class="invalid-feedback">:message</div>') !!}
                        </select>             
                 </div>
                 <div class="col-6">
                         <label form="observaciones">Observaciones</label>
                         <input class="form-control {{$errors->has('observaciones')?'is-invalid':'' }}" type="text" name="observaciones" id="observaciones" 
                                Placeholder="Observaciones"  value="{{ old('observaciones') }}">

                      {!!  $errors->first('email','<div class="invalid-feedback">:message</div>') !!}
                 </div> 
            </div>  
        </div>
              </br>  
               @include('compra.table.table')
              </br>
            <div class="col-md-12 mx-auto ">
              <div class="row">
                  <div class="col-6">
                        <div class="form-group">
                            <label for="email">Total</label>
                                 <div class="input-group">
                                     <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Bs.</span>
                                     </div>
                                     <input type="text" class="form-control" placeholder="100" aria-label="Username"
                                            aria-describedby="basic-addon1">
                                 </div>
                        </div>
                    </div>
                
                    <div class="col-6">
                        <div class="form-group">
                            <label for="web_site">ID Sucursal</label>
                            <input type="text" name="web_site" class="form-control" type="url" placeholder="001-cbba"
                                readonly>
                        </div>
                    </div>
                </div>
                         <div class="form-group">
                        <input type="submit" class="btn btn-success my-2 my-sm-0" value="Agregar">
                        <a href="{{ url('/compra')}}" class="btn btn-primary my-2 my-sm-0">Atras</a>
                        
                </div>
              </div>
            </div>
        </form>
    </div>   
@endsection

<script>
			
    		$(function(){
				// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
				$("#adicional").on('click', function(){
					$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
				});
			 
				// Evento que selecciona la fila y la elimina 
				$(document).on("click",".eliminar",function(){
					var parent = $(this).parents().get(0);
					$(parent).remove();
				});
			});
		</script>