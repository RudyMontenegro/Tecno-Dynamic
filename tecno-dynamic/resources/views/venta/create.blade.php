@extends('layouts.panel')
@section('subtitulo','proveedores')
@section('content')
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
        <form action="{{ url('proveedor') }}" method="post">
            @csrf

            <div class="col-md-12 mx-auto ">

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="nombre_empresa">Cliente</label>
                            <select class="form-control">
                                <option>Default select</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="nit">Responsable de venta</label>
                            <select class="form-control">
                                <option>Default select</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="nanombre_contactome">Fecha</label>
                            <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00"
                                id="example-datetime-local-input">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="direccion">Tipo de Venta</label>
                            <select class="form-control">
                                <option>Default select</option>
                            </select>
                        </div>
                    </div>
                </div>
                </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="telefono">Observaciones</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <
        </form>
    </div>
</div>
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Destalles de Venta(Opcional)</h3>
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
                    <div class="col-5">
                        <div class="form-group">
                            <label for="nombre_empresa">Codigo de Cliente</label>
                            <input type="text" name="nombre_empresa" class="form-control" placeholder="VTDfix"
                                value="{{ old('name')}}" required>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="nit">Nombre de producto</label>
                            <input type="text" name="nit" class="form-control" placeholder="123123"
                                value="{{ old('description')}}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="nanombre_contactome">Cantidad</label>
                            <input class="form-control" type="number" value="1" id="example-number-input">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="direccion">Unidad</label>
                            <input class="form-control" type="number" value="1" id="example-number-input">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="telefono">Precio/Unidad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Bs.</span>
                                </div>
                                <input type="text" class="form-control" placeholder="20" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="email">Sub-Total</label>
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
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="web_site">ID Sucursal</label>
                            <input type="text" name="web_site" class="form-control" type="url" placeholder="001-cbba"
                                readonly>
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