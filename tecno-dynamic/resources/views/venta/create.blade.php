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
                            <label for="nit">NIT</label>
                            <input type="number" list="datalistOptionsNit" placeholder="Escriba para buscar..." keyup
                                name="nit" id="nit" value="{{ old('nit')}}" class="form-control">
                            <datalist id="NitList">
                            </datalist>
                        </div>
                        <script>
                        $(document).ready(function() {
                            $('#nit').keyup(function() {
                                var query = $(this).val();
                                if (query != '') {
                                    var _token = $('input[name="_token"]').val();
                                    $.ajax({
                                        url: '/autocompleteN',
                                        method: 'POST',
                                        data: {
                                            query: query,
                                            _token: _token
                                        },
                                        success: function(data) {
                                            $('#NitList').fadeIn();
                                            $('#NitList').html(data);
                                        }
                                    });
                                }
                            });
                            $(document).on('click', 'li', function() {
                                $('#nit').val($(this).text());
                                $('#NitList').fadeOut();
                            });
                        });
                        </script>
                    </div>
                    <div class="col-6">
                        <label for="nombre_empresa">Cliente</label>
                        <input class="form-control" name="nombre_contacto" keyup list="datalistOptionsName"
                            id="nombre_contacto" placeholder="Escriba para buscar...">
                        <datalist id="countryList">
                        </datalist>

                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nanombre_contactome">Fecha</label>
                            <input class="form-control" type="datetime-local" name="fecha" readonly value="" id="fecha"
                                onblur="validarFecha()">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="direccion">Tipo de Venta</label>
                            <select class="form-control {{$errors->has('tip0_compra')?'is-invalid':'' }}"
                                name="tipo_compra" id="tipo_compra">
                                <option value="Contado">Contado</option>
                                <option valur="Credito">Credito</option>
                            </select>
                            {!! $errors->first('tipo_compra','<div class="invalid-feedback">:message</div>') !!}
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
function validarFecha() {
    const date = new Date(),
        ten = (i) => ((i < 10 ? '0' : '') + i),
        YYYY = date.getFullYear(),
        MTH = ten(date.getMonth() + 1),
        DAY = ten(date.getDate()),
        HH = ten(date.getHours()),
        MM = ten(date.getMinutes()),
        SS = ten(date.getSeconds())
    // MS = ten(date.getMilliseconds())

    document.getElementById("fecha").value = `${YYYY}-${MTH}-${DAY}T${HH}:${MM}`;
}
$("#nit").change(event => {
    console.log
    $.get(`envioNit/${$("#nit").val()}`, function(res, sta) {
        $("#nombre_contacto").empty();
        $("#nombre_contacto").val(res[0].nombre_contacto);
    });
});
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
    $(document).on('click', 'li', function() {
        $('#nombre_contacto').val($(this).text());
        $('#countryList').fadeOut();
    });
});


function validarNombre() {

    if ($("#nombre_contacto").val() == "") {
        $("#estadoNombre").html("<span  class='menor'><h5 class='menor'> </h5></span>");
    } else {
        if ($("#nombre_contacto").val().length < 3) {
            $("#estadoNombre").html("<span  class='menor'><h5 class='menor'>Ingrese de 3 a 50 caracteres</h5></span>");
        } else {
            if ($("#nombre_contacto").val().length > 50) {
                $("#estadoNombre").html(
                    "<span  class='menor'><h5 class='menor'>Ingrese de 3 a 50 caracteres</h5></span>");
            } else {
                var regex = /^[a-zA-Z ]+$/;
                if (!regex.test($("#nombre_contacto").val())) {
                    $("#estadoNombre").html(
                        "<span  class='menor'><h5 class='menor'>Solo se acepta caracteres [A-Z]</h5></span>");
                } else {
                    $("#estadoNombre").html("<span  class='menor'><h5 class='menor'> </h5></span>");
                }

            }

        }

    }
}
</script>

@endsection
@section('scripts')
<script src="{{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
</script>
@endsection