@extends('layouts.panel')
@section('subtitulo','clientes')
@section('content') 
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <a type="button" class="btn btn-secondary btn-sm" href="{{url('/registrarCliente')}}">Nuevo Cliente</a>


    <a type="button" class="btn btn-secondary btn-sm" href="{{url('/')}}">Ventas Realizadas</a>
    <a type="button" class="btn btn-secondary btn-sm" href="{{url('/')}}">Cuentas po Cobrar</a>
  </ol>
</nav>

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
                        <a href="" class="btn btn-sm btn-primary">Editar</a>
                        <a href="" class="btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
