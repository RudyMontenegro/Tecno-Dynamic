@extends('layouts.panel')
@section('subtitulo','proveedores')
@section('content')
<div class="card shadow" style="background-color:#11cdef; color: white; font color: yellow !important">
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
        <form action="{{ url('proveedor') }}" method="post">
            @csrf

            <div class="col-md-12 mx-auto ">

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nombre_empresa">Cliente</label>
                            <input type="text" name="nombre_empresa" class="form-control" value="{{ old('name')}}"
                                required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nit">Nit</label>
                            <input type="text" name="nombre_empresa" class="form-control" value="{{ old('name')}}"
                                required>
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
                            <select class="form-control">
                                <option>Default select</option>
                            </select>
                        </div>
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
        </form>
    </div>
</div>
@endsection