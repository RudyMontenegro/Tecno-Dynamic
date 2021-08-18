@extends('layouts.panel')
@section('subtitulo','proveedores')
@section('content')



<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
                <h3 class="mb-0">Lista de transferencias</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url('transferencia/registrarTransferencia') }}" class="btn btn-sm btn-primary">Nueva Transferencia</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Comprobante</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection