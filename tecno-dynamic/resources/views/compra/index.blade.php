@extends('layouts.panel')
@section('subtitulo','compras')
@section('content') 
<div class= "card shadow">
     <div class="card-header border-0">
             <div class="col align-items-center">
                <div class="col">
                    <h3>Lista de Compras</h3>
                    </div>    
                <div class="col text-right">
                   <a href="{{url('/compra/registrarCompra')}}" class="btn btn-sm btn-primary">Nueva Orden de Compra</a>
                </div> 
             </div>
   </div>
   <div class="table-responsive">
      <!-- Projects table -->
   </div>
</div>

@endsection