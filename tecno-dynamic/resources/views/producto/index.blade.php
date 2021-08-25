@extends('layouts.panel')

@section('subtitulo','PRODUCTOS')
@section('content')


<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col text-right">
                <a type="button" class="btn btn-primary btn-sm float-left"
                href="{{url('/producto/registrarCategoria')}}">Nueva Categoria</a>

                <a type="button" class="btn btn-primary btn-sm float-left"
                    href="{{url('/producto/registrarProducto')}}">Nuevo Producto</a>

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
                                        <button type="button" class="btn btn-sm btn-danger float-right" data-toggle="modal"
                                            data-target="#exampleModal2">
                                            Borrar
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Mensaje de Alerta
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2 class="text-center">
                                                            ¿Esta seguro de eliminar esta categoria?
                                                        </h2>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="post" action="{{url('/producto/')}}"
                                                            style="display:inline">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button id="confirm" type="submit"
                                                                class="btn btn-sm btn-danger float-right">Borrar</button>
                                                        </form>
                                                        <button type="button" class="btn-sm btn-secondary"
                                                            data-dismiss="modal">Cancelar</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{url('/producto/categoria/editar/'.$categoria->id)}}" class="btn btn-sm btn-warning float-right">
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
                                        <button type="button" class="btn btn-danger btn-sm float-right" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Borrar
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Mensaje de Alerta
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h2 class="text-center">
                                                            ¿Esta seguro de eliminar este producto?
                                                        </h2>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="post" action="{{url('/producto/'.$producto->id)}}"
                                                            style="display:inline">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button id="confirm" type="submit"
                                                                class="btn btn-danger btn-sm float-right">Borrar</button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancelar</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{url('/producto/editar/'.$producto->id)}}"
                                            class="btn btn-warning float-right btn-sm">
                                            Editar
                                        </a>

                                        <a href="{{url('/producto/'.$producto->id)}}" class="btn btn-info float-right btn-sm">
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