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
                        
                          
                          <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#exampleModal">
                            Borrar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Mensaje de Alerta</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h2 class="text-center">
                                        ¿Esta seguro de eliminar este producto?
                                    </h2>
                                </div>
                                <div class="modal-footer">
                                            <form method="post" action="{{url('/producto/'.$producto->id)}}" style="display:inline">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button id="confirm" type="submit" class="btn btn-danger float-right">Borrar</button>
                                            </form> 
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                       
                                </div>
                                </div>
                            </div>
                            </div>
                          
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
