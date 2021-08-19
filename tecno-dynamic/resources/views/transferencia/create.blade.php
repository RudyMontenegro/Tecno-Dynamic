@extends('layouts.panel')

@section('subtitulo','transferencia')
@section('content')

<div class="card shadow" style="background-color:#11cdef; color: white; font color: yellow !important">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nueva Transferencia</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('transferencia') }}" class="btn btn-sm btn-danger">Canselar y volver</a>
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
        <form action="{{ url('transferencia/registrarTransferencia') }}" method="post">

            {{ csrf_field()}}

            <div class="col-md-12 mx-auto ">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="comprobante">Comprobante</label>
                            <input type="text" name="comprobante" id="comprobante" class="form-control"
                                value="{{ old('comprobante')}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="responsable">Responsable Transferencia</label>
                            <input type="text" name="responsable" id="responsable" class="form-control"
                                value="{{ old('responsable')}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nanombre_contactome">Fecha</label>
                            <input class="form-control" type="datetime-local" name="fecha"
                                id="example-datetime-local-input">
                        </div>
                    </div>
                    <div class="col-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="sucursal_origen">Sucursal Origen</label>
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
                    <div class="col-6">
                        <label for="sucursal_destino">Sucursal Destino</label>
                        <select name="sucursal_destino" id="sucursal_destino"
                            class="form-control  {{$errors->has('sucursal_destino')?'is-invalid':'' }}">
                            <option selected disabled>Elige una Sucursal de Destino</option>

                        </select>
                        {!! $errors->first('sucursal_origen','<div class="invalid-feedback">:message</div>') !!}

                    </div>
                </div>
                <br>
            </div>

            <script>
            $("#sucursal_origen").change(event => {
                $.get(`envio/${event.target.value}`, function(res, sta) {
                    $("#sucursal_destino").empty();
                    $("#sucursal_destino").append(`<option > Elige una Sucursal de Destino </option>`);
                    res.forEach(element => {
                        $("#sucursal_destino").append(
                            `<option value=${element.id}> ${element.nombre} </option>`);
                    });
                });
            });
            </script>
            <div class="col-md-12 mx-auto ">
                @include('transferencia.tabla')

                <br>
                <br>
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>

@endsection