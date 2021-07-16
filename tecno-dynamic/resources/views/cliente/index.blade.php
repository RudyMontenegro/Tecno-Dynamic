@extends('layouts.panel')
@section('subtitulo','clientes')
@section('content') 
<div class= "card shadow">
<div class="card-header border-0">
       <div class="col text-right">
                <a type="button" class="btn btn-secondary btn-sm" href="{{url('/cliente/registrarCliente')}}">Nuevo Cliente</a>
                <a type="button" class="btn btn-secondary btn-sm" href="{{url('')}}">Ventas Encabezado</a>
                <a type="button" class="btn btn-secondary btn-sm" href="{{url('')}}">Cuentas por cobrar</a>
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
                    <th scope="col">Direccion</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <th scope="row">
                         {{ $cliente->nombre_empresa }}
                    </th>
                    <td>
                        {{ $cliente->nombre_contacto }}
                    </td>
                    <td>
                        {{ $cliente->telefono }}
                    </td>
                    <td>
                         {{ $cliente->direccion }}
                    </td>
                    <td>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        ¿Esta seguro de eliminar este cliente?
                                    </h2>
                                </div>
                                <div class="modal-footer">
                                            <form method="post" action="{{url('/cliente/'.$cliente->id)}}" style="display:inline">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button id="confirm" type="submit" class="btn btn-danger float-right">Eliminar</button>
                                            </form> 
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                       
                                </div>
                                </div>
                            </div>
                            </div>

                    <form action="{{url('/cliente/'.$cliente->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('/cliente/editar/'.$cliente->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal" type="submit">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
