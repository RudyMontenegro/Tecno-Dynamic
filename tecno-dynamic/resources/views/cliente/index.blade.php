@extends('layouts.panel')
@section('subtitulo','clientes')
@section('content') 
<div class= "card shadow">
<div class="card-header border-0">
       <div class="col text-right">
                <a type="button" class="btn btn-secondary btn-sm" href="{{url('/cliente/registrarCliente')}}">Nuevo Cliente</a>
                <a type="button" class="btn btn-secondary btn-sm" href="{{url('')}}">Ventas Realizadas</a>
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
                    <form action="{{url('/cliente/'.$cliente->id) }}" method="POST">
                        @csrf
                        <a href="{{ url('/cliente/'.$cliente->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="" class="btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
