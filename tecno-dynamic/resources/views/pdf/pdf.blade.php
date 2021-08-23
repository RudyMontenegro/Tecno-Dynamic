@extends('pdf.plantilla')
@section('seccion')
<header>
    <style>
    .titulo {
        text-align: center;
        font: 1rem;
    }
    </style>
    <div class="titulo">
        <h3>
            Lista de clientes
        </h3>

        <p class="fs-10">.fs-6 text</p>
    </div>
</header>
<div class="container">
    <div class="box-body">
        <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 1px;
        }
        </style>

        <table style="width: 10%">

            <thead>
                <tr>
                    <th scope="col">NIT</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Web</th>
                </tr>

                @foreach ($clientes as $cliente)
                <tr>
                    <td> {{ $cliente->nit }}</td>
                    <td> {{ $cliente->nombre_contacto }}</td>
                    <td>
                        {{ $cliente->nombre_empresa }}
                    </td>
                    <td>
                        {{ $cliente->direccion }}
                    </td>
                    <td>
                        {{ $cliente->telefono }}
                    </td>
                    <td>
                        {{ $cliente->email }}
                    </td>
                    <td>
                        {{ $cliente->web_site }}
                    </td>
                </tr>
                @endforeach

        </table>




    </div>
</div>



@endsection