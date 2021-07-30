@extends('layouts.panel')
@section('subtitulo','compra')
@section('content') 
<div class= "card shadow">
  <div class="card-header border-0">
       <div class="col text-right">
       <div class="col text-right">
                <a type="button" class="btn btn-secondary btn-sm" href="{{url('/compra/registrarCompra')}}">Nueva Orden de Compra</a>
                
            </div>     
      </div>
   </div>
</div>

@endsection