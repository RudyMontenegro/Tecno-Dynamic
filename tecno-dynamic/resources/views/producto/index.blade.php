@extends('layouts.panel')

@section('subtitulo','PRODUCTOS')
@section('content')


<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col text-right">

                <button type="button" class="btn btn-primary btn-sm float-left" data-toggle="modal"
                    data-target="#exampleModal">Nueva Categoria</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="exampleModalLabel">REGISTRO DE CATEGORIA</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="container">
                                <form id="updateform" action="{{url('/producto/registrarCategoria')}}" class="form"
                                    method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}

                                    <div class="form-group col-md-12">

                                        <label for="Nombre" class="control-label float-left">{{'Nombre'}}</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre"
                                            value="{{ isset($personal->nombre)?$personal->nombre:old('nombre') }}">
                                        <p class="help-block"></p>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="descripcion"
                                            class="control-label float-left">{{'Descripcion'}}</label>
                                        <input type="text" height="100px" class="form-control" name="descripcion"
                                            id="descripcion"
                                            value="{{ isset($personal->email)?$personal->email:old('descripcion')  }}">
                                        <p class="help-block"></p>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <span id="returnMessage" class="glyphicon"> </span>
                                        <div class="col5">
                                            <button type="button" class="btn btn-secondary float-left"
                                                data-dismiss="modal">Cancelar</button>
                                        </div>
                                        <div class="col5">
                                            <button id="submitBtn" type="submit"
                                                class="btn btn-success float-right">Guardar</button>
                                        </div>

                                    </div>
                                    <br>
                                    <br>
                                     </form> 
                                    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
                                    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                                    <script src="https://cdn.bootcss.com/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
                
                                    <style type="text/css">
                                    .has-error .form-control-fields {
                                        color: #E74C3C;
                                    }
                                    .has-success .form-control-fields {
                                        color: #18BCA0;
                                    }
                                    </style>

                                    <script type='text/javascript'>
                                        var form = $('#updateform');
                                        $(document).ready(function () {
                                    
                                            form.bootstrapValidator({
                                                message: 'El valor de entrada es ilegal',
                                                feedbackIcons: {
                                                    valid: 'glyphicon glyphicon-ok',
                                                    invalid: 'glyphicon glyphicon-remove',
                                                    validating: 'glyphicon glyphicon-refresh'
                                                },
                                                fields: {
                                                    nombre: {
                                                        message: 'Nombre de usuario es ilegal',
                                                        validators: {
                                                            notEmpty: {
                                                                message: 'Campo requerido'
                                                            },
                                                            stringLength: {
                                                                min: 3,
                                                                max: 50,
                                                                message: 'Ingrese de 3 a 50 caracteres'
                                                            },
                                                            regexp: {
                                                                regexp: /^[a-zA-Z0-9_\. \u4e00-\u9fa5 ]+$/,
                                                                message: 'El nombre de usuario solo puede consistir en letras, números, puntos, guiones bajos y caracteres chinos'
                                                            }
                                                        }
                                                    }
                                                    , descripcion: {
                                                        validators: {
                                                            notEmpty: {
                                                                message: 'Campo requerido'
                                                            },
                                                            stringLength: {
                                                                min: 3,
                                                                max: 50,
                                                                message: 'Ingrese de 3 a 50 caracteres'
                                                            },
                                                            regexp: {
                                                                regexp: /^[a-zA-Z0-9_\. \u4e00-\u9fa5 ]+$/,
                                                                message: 'El nombre de usuario solo puede consistir en letras, números, puntos, guiones bajos y caracteres chinos'
                                                            }
                                                        }
                                                    }
                                                }
                                            },
                                            descripcion: {
                                                validators: {
                                                    notEmpty: {
                                                        message: 'Campo requerido'
                                                    },
                                                    stringLength: {
                                                        min: 3,
                                                        max: 50,
                                                        message: 'Ingrese de 3 a 50 caracteres'
                                                    },
                                                    regexp: {
                                                        regexp: /^[a-zA-Z0-9_\. \u4e00-\u9fa5 ]+$/,
                                                        message: 'El nombre de usuario solo puede consistir en letras, números, puntos, guiones bajos y caracteres chinos'
                                                    }
                                                }
                                            }
                                        }
                                    });
                                });
                                $("#submitBtn").click(function() {
                                    // Realizar validación de formulario
                                    var bv = form.data('bootstrapValidator');
                                    bv.validate();
                                    if (bv.isValid()) {
                                        console.log(form.serialize());
                                        // Enviar solicitud ajax
                                        $.ajax({
                                            url: '/producto/registrarCategoria',
                                            async: false, // La sincronización bloqueará la operación
                                            type: 'POST', //PUT DELETE POST
                                            data: form.serialize(),
                                            complete: function(msg) {
                                                console.log('terminado');
                                            },
                                            success: function(result) {
                                                console.log(result);
                                                if (result) {
                                                    window.location.reload();
                                                } else {
                                                    $("#returnMessage").hide().html(
                                                        '<label class = "label label-danger"> ¡Error en el registro de categoria! </label>'
                                                        ).show(300);
                                                }
                                            },
                                            error: function() {
                                                $("#returnMessage").hide().html(
                                                    '<label class = "label label-danger"> ¡Error en el registro de categoria! </label>'
                                                    ).show(300);
                                            }
                                        })
                                    }
                                });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

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

                                        <a href="{{url('/producto/editar/')}}" class="btn btn-sm btn-warning float-right">
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
                                            class="btn btn-warning float-right">
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