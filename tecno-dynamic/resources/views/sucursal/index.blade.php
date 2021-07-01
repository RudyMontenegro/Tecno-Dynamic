@extends('layouts.panel')

@section('subtitulo','sucursal')
@section('content2')
<div class="container">
    <div class="row justify-content-center">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <a class="btn btn-outline-light me-2" href="{{ url('/registrar') }} ">Nueva Sucursal</a>
        
    </div>
</div>
@endsection
