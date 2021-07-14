@extends('layouts.panel')

@section('subtitulo','PRODUCTOS')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">    
            <div class="col text-right">
                <a type="button" class="btn btn-secondary btn-sm" href="{{url('/registrarProducto')}}">Nuevo Producto</a>
            </div>
        </div>
    </div>
    <div class="table-responsive"> 
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
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
                    <td scope="row">{{$producto->codigo_barra}}</td>
                    <td>{{$producto->nombre}}</td>
                    <td>{{$producto->categoria}}</td>
                    <td>
                        
                         

                        <form method="post" action="{{url('/producto/'.$producto->id)}}" style="display:inline">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" onclick="return confirm('¿Esta seguro de Eliminar esta Unidad?');" class="btn btn-danger float-right">Borrar</button>
                        </form> 
                        
                        <a href="{{url('/producto/editar/'.$producto->id)}}" class="btn btn-warning float-right">
                                Editar
                        </a>

                        <a href="{{url('/producto/'.$producto->id)}}" class="btn btn-info float-right">
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
