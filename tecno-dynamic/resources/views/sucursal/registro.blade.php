@extends('layouts.panel')
@section('subtitulo','sucursal')
@section('content2')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">REGISTRAR NUEVA SUCURSAL</div>

                <div class="card-body">
                <header class="container-fluid" style="height: 720px; background-color: #0D6EFD ">
        
            <div class="col-12 align-self-center text-center placeholder-center">

                <form action="{{ url('registrar') }}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        {{csrf_field()}}
                        <div class="col-md-4 col-md-offset-4 mt-md-5 ">
                            <div class="box box-primary">
                                <div class="panel panel-heading ">

                                    </br>
                                    <label form="id">ID</label>
                                    <input class="form-control {{$errors->has('id_numero')?'is-invalid':'' }}" type="text" name="id_numero" id="idhd"
                                        placeholder="Ingrese el ID" value="{{ old('id_numero') }}">
                                        
                                    <br>

                                    <label form="NombreSucursal">Nombre de Sucursal</label>
                                    <input class="form-control {{$errors->has('targetaLogica')?'is-invalid':'' }}" type="text" name="nombre" id="nombre"
                                        Placeholder="Ingrese el nombre de la sucursal" value="{{ old('nombre') }}">
                                        
                                    <br>

                                    <label form="Responsable">Responsable</label>
                                    <input class="form-control {{$errors->has('tipoEntrada')?'is-invalid':'' }}" type="text" name="responsable" id="responsable"
                                        Placeholder="Ingrese el nombre del responsable" value="{{ old('responsable') }}">
                                        
                                    <button type="submit" class="btn btn-success mb-5" value="Agregar"
                                        class>Registrar</button>
                                    <a href="{{ url('/') }}" class="btn btn-primary mb-5">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection