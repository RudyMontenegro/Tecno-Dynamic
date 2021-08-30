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
      <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Empresa</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compras as $compra)
                <tr>
                    <th scope="row">
                        {{ $compra->nombre_empresa }}
                    </th>
                    <td>
                        {{ $compra->nombre_contacto }}
                    </td>
                    <td>
                        {{ $compra->telefono }}
                    </td>
                    <td>
                        {{ $compra->email }}
                    </td>
                    <td>
                        <a href="{{ url('/compra/'.$venta->id.'/show') }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ url('/compra/'.$venta->id.'/edit') }}"
                            class="btn btn-sm btn-primary">Editar</a>
                        <button class="btn btn-sm btn-danger" type="submit" data-toggle="modal"
                            data-target="#exampleModal">Eliminar</button>
                        <!-- modaal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Mensaje de Alerta</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h2 class="text-center">
                                            ¿Esta seguro de eliminar este producto?
                                        </h2>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="{{url('/venta/'.$venta->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger float-right">Borrar</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
   </div>
</div>
 
@endsection