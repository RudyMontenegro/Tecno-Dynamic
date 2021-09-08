@extends('layouts.panel')
@section('subtitulo','proveedores')
@section('content')
<head>
    <title>Ajax Autocomplete Textbox in Laravel using JQuery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<form action="{{ url('venta') }}" method="post">
    @csrf
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
            <div class="col-md-12 mx-auto ">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nombre_empresa">Cliente</label>
                            <input class="form-control" name="nombre_contacto" keyup id="nombre_contacto"
                                list="datalistOptions" id="exampleDataList" placeholder="Escriba para buscar...">
                            <datalist id="countryList">
                            </datalist>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nit">Nit</label>
                            <input type="text" name="nit" id="nit" class="form-control" value="{{ old('name')}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nanombre_contactome">Fecha</label>
                            <input class="form-control" type="datetime-local" name="fecha" value="" id="fecha">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="direccion">Tipo de Venta</label>
                            <input type="text" name="tipo_venta" class="form-control" placeholder="Efectivo"
                                value="{{ old('tipo_venta')}}" >
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nanombre_contactome">Sucursal
                            </label>
                            <select name="sucursal_origen" id="sucursal_origen"
                                class="form-control  {{$errors->has('sucursal_origen')?'is-invalid':'' }}">
                                <option selected disabled>Elige una Sucursal de Origen</option>
                                @foreach ($sucursal as $origen)
                                <option {{ old('origen') == $origen->id ? "selected" : "" }} value="{{$origen->id}}">
                                    {{$origen->nombre}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('sucursal_origen','<div class="invalid-feedback">:message</div>') !!}

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="direccion">Comprobante</label>
                            <input type="text" name="comprobante" class="form-control" value="{{ old('tipo_venta')}}"
                                required>
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
                                    <input type="number" class="form-control" id="total" name="total">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Observaciones</label>
                        <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nit">Responsable de venta</label>
                                <input type="text" name="responsable_venta" class="form-control" type="url"
                                    placeholder="001-cbba" readonly value="{{ auth()->user()->name }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btnenviarEnc">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
</form>
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
                 //  console.log(data);
                }
            });
        }
    });
    $(document).on('click', 'li', function() {
        $('#nombre_contacto').val($(this).text());
        $('#countryList').fadeOut();
    });
});
$("#nombre_contacto").change(event => {
                            $.get(`autocompleteNit/${$("#nombre_contacto").val()}`, function(res, sta) {
                                $("#nit").empty();
                                $("#nit").val(res[0].nit);
                            });
});






$("#nombre_contacto").change(event => {
    $nit = $('#nit');
    const $nombre = $('#nombre_contacto');
    $('#specialty').change(() => {
        const nombreID = $nombre.val();
        console.log(nombreID);
        const url = `/specialties/${specialtyId}/doctors`;
        $.getJSON(url, onDoctorsLoaded);
    });
});
</script>
@endsection