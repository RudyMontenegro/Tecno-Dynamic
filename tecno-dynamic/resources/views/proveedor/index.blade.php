@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Proveedores</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('proveedor/create') }}" class="btn btn-sm btn-primary">Nueva Proveedor</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Empresa</th>
                    <th scope="col">NIT</th>
                    <th scope="col">Contacto</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Sitio Web</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                <tr>
                    <th scope="row">
                        {{ $proveedor->nombre_empresa }}
                    </th>
                    <td>
                        {{ $proveedor->nit }}
                    </td>
                    <td>
                        {{ $proveedor->nombre_contacto }}
                    </td>
                    <td>
                        {{ $proveedor->direccion }}
                    </td>
                    <td>
                        {{ $proveedor->telefono }}
                    </td>
                    <td>
                        {{ $proveedor->email }}
                    </td>
                    <td>
                        {{ $proveedor->web_site }}
                    </td>
                    <td>
                        {{ $proveedor->categoria }}
                    </td>
                    <td>
                        <a href="{{ url('/proveedor/'.$proveedor->id.'/edit') }}"
                            class="btn btn-sm btn-primary">Editar</a>
                        <a href="" class="btn btn-sm btn-danger">Eliminar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection