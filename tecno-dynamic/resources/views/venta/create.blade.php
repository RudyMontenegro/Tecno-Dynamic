@extends('layouts.panel')
@section('subtitulo','proveedores')
@section('content')

<head>
    <title>Ajax Autocomplete Textbox in Laravel using JQuery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


</head>

<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nueva Venta</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('proveedor') }}" class="btn btn-sm btn-danger">Canselar y volver</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{ csrf_field() }}
        <div class="col-md-12 mx-auto ">
            <div class="row">


                <div class="col-6">
                    <div class="form-group">

                        <label for="nombre_empresa">Cliente</label>
                        <input class="form-control" name="nombre_contacto" id="nombre_contacto" list="datalistOptions"
                            id="exampleDataList" placeholder="Type to search...">
                        <datalist id="countryList">
                        </datalist>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="nit">Nit</label>
                        <input class="form-control" name="nombre_contacto" id="nombre_contacto" list="datalistOptions2"
                            id="exampleDataList" placeholder="123456"   readonly >

                        <datalist id="countryList">
                        </datalist>

                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="nanombre_contactome">Fecha</label>
                        <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00"
                            id="example-datetime-local-input">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="direccion">Tipo de Venta</label>
                        <input type="text" name="tipo_venta" class="form-control" placeholder="Efectivo"
                            value="{{ old('tipo_venta')}}" required>
                    </div>
                </div>

            </div>
            @include('venta.table.table')
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
                </div>
                <div class="form-group">
                    <label for="telefono">Observaciones</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="web_site">ID Sucursal</label>
                            <input type="text" name="web_site" class="form-control" type="url" placeholder="001-cbba"
                                readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nit">Responsable de venta</label>
                            <input type="text" name="web_site" class="form-control" type="url" placeholder="001-cbba"
                                readonly value="{{ auth()->user()->name }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </div>

        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#nombre_contacto').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '/autocomplete',
                    method: 'POST',
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#countryList').fadeIn();
                        $('#countryList').html(data);
                    }
                });

            }
        });
    });
    </script>


    @endsection