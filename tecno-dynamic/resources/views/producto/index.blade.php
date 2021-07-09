@extends('layouts.panel')

@section('subtitulo','PRODUCTOS')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <a type="button" class="btn btn-secondary btn-sm" href="{{url('/registrarProducto')}}">Nuevo Producto</a>

  </ol>
</nav>
<div class="table-responsive">
        
            <table class="table align-items-center table-flush"  >
            
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
@endsection