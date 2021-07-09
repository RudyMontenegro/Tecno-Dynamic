@extends('layouts.panel')

@section('subtitulo','PRODUCTOS')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <a class="btn btn-outline-light me-2" href="{{ url('/registrarProducto') }} ">Nuevo Producto</a>
        
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto ">
        
            <table class="table table-hover" border="2" bordercolor="#008000" >
            
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Codigo Barra</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoria</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    
                <tr>
                    @foreach ($producto as $producto)
                    <td>{{$producto->codigo_barra}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->categoria}}</td>
                    <td>
                        
                         <a href="{{url('/registrarUFC/editarUnidad')}}" class="btn btn-warning float-right">
                            Editar
                        </a>

                        <form method="post" action="{{url('/registrarUFC/eliminarUnidad/')}}" style="display:inline">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" onclick="return confirm('¿Esta seguro de Eliminar esta Unidad?');" class="btn btn-danger float-right">Borrar</button>
                        </form> 
                        
                       

                        <a href="{{url('/registrarUFC/editarUnidad')}}" class="btn btn-info float-right">
                            Ver
                        </a>
                    </td>
                
                </tr>
                @endforeach
                    
                </tbody>
            </table>
        </div>
        
    </div>
  

</div>

</div>
@endsection