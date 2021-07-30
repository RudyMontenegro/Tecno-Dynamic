<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <! - Las 3 metaetiquetas anteriores * deben * colocarse primero, y cualquier otro contenido * debe * seguirlo. ->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Carousel Template for Bootstrap</title>
 
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 
    <!--  IE10 viewport hack for Surface/desktop Windows 8 bug
    <link href="http://v3.bootcss.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
     HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    [if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container text-center">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Modificar información</button>
</div>
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Modificación de información del usuario</h4>
            </div>
 
            <div class="modal-body">
                <form id="updateform">
                    <div class="form-group">
                        <label for="loginname" class="control-label">nombre de usuario:</label>
                        <input type="text" class="form-control" id="loginname" name="loginname">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email:</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="control-label">teléfono:</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label">Dirección de Envío:</label>
                        <textarea class="form-control" id="address" name="address"></textarea>
                    </div>
                    <div class="text-right">
                        <span id="returnMessage" class="glyphicon"> </span>
                        <button type="button" class="btn btn-default right" data-dismiss="modal">apagar</button>
                        <button id="submitBtn" type="button" class="btn btn-primary">modificar</button>
 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
 


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
                loginname: {
                    message: 'Nombre de usuario es ilegal',
                    validators: {
                        notEmpty: {
                            message: 'El nombre de usuario no puede estar vacío'
                        },
                        stringLength: {
                            min: 3,
                            max: 30,
                            message: 'Ingrese de 3 a 30 caracteres'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_\. \u4e00-\u9fa5 ]+$/,
                            message: 'El nombre de usuario solo puede consistir en letras, números, puntos, guiones bajos y caracteres chinos'
                        }
                    }
                }
                , email: {
                    validators: {
                        notEmpty: {
                            message: 'el correo electrónico no puede estar vacío'
                        },
                        emailAddress: {
                            message: 'Ingrese la dirección de correo electrónico correcta, como: 123@qq.com'
                        }
                    }
                }, phone: {
                    validators: {
                        notEmpty: {
                            message: 'El número de teléfono móvil no puede estar vacío'
                        },
                        regexp: {
                            regexp: "^([0-9]{11})?$",
                            message: 'Formato de número de teléfono incorrecto'
                        }
                    }
                }, address: {
                    validators: {
                        notEmpty: {
                            message: 'La dirección no puede estar vacía'
                        }, stringLength: {
                            min: 8,
                            max: 60,
                            message: 'Ingrese de 5 a 60 caracteres'
                        }
                    }
                }
            }
        });
    });
    $("#submitBtn").click(function () {
        // Realizar validación de formulario
        var bv = form.data('bootstrapValidator');
        bv.validate();
        if (bv.isValid()) {
            console.log(form.serialize());
            // Enviar solicitud ajax
            $.ajax({
                url: 'validator.json',
                async: false,// La sincronización bloqueará la operación
                type: 'POST',//PUT DELETE POST
                data: form.serialize(),
                complete: function (msg) {
                    console.log('terminado');
                },
                success: function (result) {
                    console.log(result);
                    if (result) {
                        window.location.reload();
                    } else {
                        $("#returnMessage").hide().html('<label class = "label label-danger"> ¡Error en el registro de categoria! </label>').show(300);
                    }
                }, error: function () {
                    $("#returnMessage").hide().html('<label class = "label label-danger"> ¡Error en el registro de categoria! </label>').show(300);
                }
            })
        }
    });
 
</script>
</body>
</html>
