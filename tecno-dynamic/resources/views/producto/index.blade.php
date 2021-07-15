@extends('layouts.panel')

@section('subtitulo','PRODUCTOS')
@section('content')


<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">    
            <div class="col text-right">

                <button type="button" class="btn btn-primary btn-sm float-left" data-toggle="modal" data-target="#exampleModal">Nueva Categoria</button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">REGISTRO DE CATEGORIA</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container">
                                <form action="{{url('/producto/registrarCategoria')}}" class="form" method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}

                                    <div class="form-group col-md-12">
                                    
                                            <label for="nombre" class="control-label float-left">{{'Nombre'}}</label>
                                            <input type="text" class="form-control  {{$errors->has('nombre')?'is-invalid':'' }}" name="nombre" id="nombre" 
                                            value="{{ isset($personal->nombre)?$personal->nombre:old('nombre') }}"
                                            >
                                            {!!  $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
                                           
                                    </div>
                                    <div class="form-group col-md-12">
                                            <label for="descripcion"class="control-label float-left">{{'Descripcion'}}</label>
                                            <input type="text" height="100px" class="form-control  {{$errors->has('descripcion')?'is-invalid':'' }}" name="descripcion" id="descripcion" 
                                            value="{{ isset($personal->email)?$personal->email:old('descripcion')  }}"
                                            >
                                        {!!  $errors->first('descripcion','<div class="invalid-feedback">:message</div>') !!}
                                   
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="col5">
                                            <button type="button" class="btn btn-secondary float-left" data-dismiss="modal">Cancelar</button>
                                        </div>  
                                        <div class="col5">
                                            <button id="confirm" type="submit" class="btn btn-success float-right">Añadir</button>
                                        </div>
                                                                  
                                    </div>
                                    <br>
                                    <br>
                                     </form> 
                                
                           
                    </div>
                    </div>
                </div>
                </div>

                <a type="button" class="btn btn-primary btn-sm float-left" href="{{url('/producto/registrarProducto')}}">Nuevo Producto</a>
    
            </div>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">    
                <div class="col text-right">
                    <h1 class="text-primary text-center">CATEGORIAS</h1>
    <div class="table-responsive"> 
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($categoria as $categoria)
                    <td scope="row">{{$categoria->nombre}}</td>
                    <td>{{$categoria->descripcion}}</td>
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
                                            <form method="post" action="{{url('/producto/')}}" style="display:inline">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <button id="confirm" type="submit" class="btn btn-danger float-right">Borrar</button>
                                            </form> 
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                       
                                </div>
                                </div>
                            </div>
                            </div>
                          
                        <a href="{{url('/producto/editar/')}}" class="btn btn-warning float-right">
                                Editar
                        </a>
                    </td>
                
                </tr>
                @endforeach
                    
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
            </div>
        </div>
    </div>

    
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">    
                <div class="col text-right">
                <h1 class="text-primary text-center">PRODUCTOS</h1>
    
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
            <thead class="thead-light">
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
        </table>


                </div>
            </div>
        </div>
    </div>

            
    </div>

</div>
@endsection
