@extends('layouts.panel')
@section('subtitulo','clientes')
@section('content2')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <a type="button" class="btn btn-secondary btn-sm" href="{{url('/')}}">Inicio</a>
    <a type="button" class="btn btn-secondary btn-sm" href="{{url('/registrarCliente')}}">Nuevo Cliente</a>


    <a type="button" class="btn btn-secondary btn-sm" href="{{url('/')}}">Ventas Realizadas</a>
    <a type="button" class="btn btn-secondary btn-sm" href="{{url('/')}}">Cuentas po Cobrar</a>
  </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>

        
    </div>
</div>
@endsection
