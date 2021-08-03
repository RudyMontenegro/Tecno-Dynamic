@extends('layouts.panel')
@section('subtitulo','compra')
@section('content')

<div class="card shadow">
   <div class="box-header border-0">
                  <h3 class="text-center">NUEVA ORDEN DE COMPRA</h3>
            </div></br>  
            <div class="col-md-6 mx-auto " >
              <h2 >
                  @include('Mensaje.nota')
             </h2> 
    </div> 
 
    <form action="{{ url('registrarCompra')}}" method="post">
      {{csrf_field()}}
     <div class="col-md-11 mx-auto">

  
       <div class = 'row'>
              <div class="col-5">
                <label form="comprobante">Comprobante</label>
                 <input class="form-control {{$errors->has('nit')?'is-invalid':'' }}" type="text" name="comprobante" id="comprobante" 
                   placeholder="Ingrese el comprobante" value="{{ old('nit') }}">

                {!!  $errors->first('nit','<div class="invalid-feedback">:message</div>') !!}
              </div>  

             <div class="col-5">
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
          <div class="col-5"> 
             <label form="responsable_compra">Responsable de la compra</label>
               <input class="form-control {{$errors->has('responsable_compra')?'is-invalid':'' }}" type="text" name="responsable_compra" id="responsable_compra"  
                 Placeholder="Nombre del responsable" value="{{ old('responsable_compra') }}">

            {!!  $errors->first('nombre_contacto','<div class="invalid-feedback">:message</div>') !!}
          </div>

           <div class="col-5">
             <div class="form-group">
                <label for="fecha" class="form-control-label">Fecha</label>
                  <input class="form-control" type="date" value="2018-11-23" id="fecha">
              </div>
           </div>
          </div>
       
          <div class="row">
            <div class="col-5">
                <label form="tipo_compra">Tipo de compra</label>
                  <select class="form-control {{$errors->has('tip0_compra')?'is-invalid':'' }}" name="tipo_compra" id="tipo_compra">
                    <option value="Contado">Contado</option>
                   <option valur="Credito">Credito</option>
            {!!  $errors->first('tipo_compra','<div class="invalid-feedback">:message</div>') !!}
                  </select>             
             </div>

           <div class="col-5">
              <label form="observaciones">Observaciones</label>
              <input class="form-control {{$errors->has('observaciones')?'is-invalid':'' }}" type="text" name="observaciones" id="observaciones" 
               Placeholder="Observaciones"  value="{{ old('observaciones') }}">

           {!!  $errors->first('email','<div class="invalid-feedback">:message</div>') !!}
          </div> 
        </div>         
    </form>
  </div>   
</br>
</div>

<div class="card shadow">
<div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">DETALLE DE COMPRA</h3>
            </div>
        </div>
    </div>
    <form action="{{ url('registrarCompra')}}" method="post">
      {{csrf_field()}}
         <div class="col-md-11 mx-auto">
                    <div class="row">
                        <div class="col-5">
                          <div class="form-group">
                            <label for="">Codigo de Producto</label>
                            <input type="text" name="" class="form-control" placeholder="Cod_Nro"
                                value="{{ old('name')}}" required>
                          </div>
                        </div>
                      <div class="col-5">
                         <div class="form-group">
                            <label for="nit">Nombre de producto</label>
                            <input type="text" name="nit" class="form-control" placeholder="Nombre de Producto"
                                value="{{ old('description')}}" required>
                         </div>
                      </div>
                   </div>
                   <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="nanombre_contactome">Cantidad</label>
                            <input class="form-control" type="number" value="1" id="example-number-input">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="direccion">Unidad</label>
                            <input class="form-control" type="number" value="1" id="example-number-input">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="telefono">Precio/Unidad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Bs.</span>
                                </div>
                                <input type="text" class="form-control" placeholder="20" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="email">Sub-Total</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Bs.</span>
                                </div>
                                <input type="text" class="form-control" placeholder="100" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <<div class="box-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered" id="dynamic_field">
                                     <tr>
                                      <td> <h4>Añadir nuevo requisito </h4></td>
                                      <td><button type="button" name="add" id="add" class="btn btn-primary "> <i class="fa fa-plus"></i>  </button></td>
                                    </tr>
                                 </table>
                                     </div>
                                </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
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
    </div>
     </form>
    </div>   
</div>
@endsection


@push('scripts')

<script src="/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>


<script>  
                    //Date picker
                    $('#datepicker').datepicker({
                    startDate: '+5d',
                    
                    autoclose: true});

                    $('#datepicker2').datepicker({
                    startDate: '+5d',

                    autoclose: true});
            
            </script> 
            <script>
             
             $(document).ready(function(){
                            var i = 1;

                            $('#add').click(function () {
                                i++;
                                $('#dynamic_field').append('<tr id="row'+i+'">' +
                                                            '<td><input autocomplete="off" type="text" name="requisito[]" placeholder="Ingrese requisito" class="form-control name_list" /></td>' +
                                                            '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +
                                                            '</tr>');
                            });
                            
                            $(document).on('click', '.btn_remove', function () {
                                var id = $(this).attr('id');
                            $('#row'+ id).remove();
                            });   
                        })

            </script>

@endpush

