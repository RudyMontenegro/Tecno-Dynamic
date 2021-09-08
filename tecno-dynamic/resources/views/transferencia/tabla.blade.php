    <style>
    #formulario1 {
        margin: 0 auto;
        text-align: center;
        border-radius: 10px;
        border: 1px solid #ffffff;
        width: 800px;

    }
    </style>
<table class="table borderless" id="tabla">
    <thead class="thead-light">
        <tr>
            <th scope="col">Codigo de producto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Unidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead> 
    <tbody>
        <span id="estadoBoton"></span>
        <tr>
            <th>
                <input class="form-control" name="codigoI[]" id="codigoI"  onkeyup="existe()"   
                list="codigo" >
                <datalist id="codigo">
                </datalist>
                <span id="estadoCodigo"></span>
            </th>
            <td>
                <input type="text"  class="form-control  {{$errors->has('nombre')?'is-invalid':'' }}" name="nombre[]"
                    id="nombre" value="{{ isset($transferencia->nombre)?$transferencia->nombre:old('nombre')  }}">
            </td>
            <td>
                <input type="integer"  class="form-control  {{$errors->has('cantidad')?'is-invalid':'' }}" name="cantidad[]"
                    id="cantidad" onkeyup="validarCantidad()"
                    value="{{ isset($transferencia->cantidad)?$transferencia->cantidad:old('cantidad')  }}">
                    <span id="estadoCantidad"></span>
            </td>
            <td>
                <input type="text" class="form-control  {{$errors->has('unidad')?'is-invalid':'' }}" name="unidad[]"
                onkeyup="validarUnidad()"  id="unidad" value="{{ isset($transferencia->unidad)?$transferencia->unidad:old('unidad')  }}"> <span id="estadoUnidad"></span>
            </td>
            <td>
                <div class="input-group">
                    <input type="integer" class="form-control  {{$errors->has('precio')?'is-invalid':'' }}" name="precio[]"
                    onkeyup="validarSubTotal()"   id="precio"  value="{{ isset($transferencia->precio)?$transferencia->precio:old('precio')  }}"><span id="estadoSubTotal"></span>
                </div>
            </td>
            <td>
                <div class="input-group">
                   
                    <input type="number" class="form-control  {{$errors->has('subTotal')?'is-invalid':'' }}"
                        name="subTotal[]" id="subTotal" 
                        value="{{ isset($transferencia->subTotal)?$transferencia->subTotal:old('subTotal')  }}">
                        
                </div>
                
            </td>
            <td class="eliminar" id="deletRow" name="deletRow">
                <button class="btn btn-icon btn-danger"  type="button">
                    <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                </button>
            </td>
        </tr>
    </tbody>
</table>

<button type="button" class="btn btn-success btn-lg btn-block" id="adicional" name="adicional">Añadir</button>
    <script>
    $("#sucursal_origen").change(event => {
        $.get(`envioP/${event.target.value}`, function(res, sta) {
            $("#codigo").empty();
            $("#codigo").append(`<option > Elige el codigo de producto </option>`);
            res.forEach(element => {
                $("#codigo").append(
                    `<option> ${element.codigo}</option>`
                );
            });
        });
    });
        $("#codigoI").change(event => {
                            $.get(`envioN/${$("#codigoI").val()}`, function(res, sta) {
                                $("#nombre").empty();
                                $("#nombre").val(res[0].nombre);
                            });
                        });

      
        
    </script>

    <script>

    function limpiar(){
        $("#codigoI").val('');
        $("#nombre").val('');
        $("#cantidad").val('');
        $("#unidad").val('');
        $("#precio").val('');
        $("#subTotal").val('');
    }

        var bb= 0;
    $(function() {
       
            $("#adicional").on('click', function() {
                if(!($("#codigoI").val() == "") || !($("#nombre").val() == "") || !($("#cantidad").val() == "") || !($("#unidad").val() == "") || !($("#precio").val() == "") || !($("#subTotal").val() == "")){
                        $("#tabla tbody tr:eq(0)").clone().appendTo("#tabla");
                        limpiar();
                        bb = bb +1;
                        $('#deletRow').show();
                }else{
                    $("#estadoBoton").html("<span  class='menor'><h5 class='menor'>Llene todos los campos</h5></span>");
                }
                    });
        
        
        $(document).on("click", ".eliminar", function() {
            if(bb>0){
            var parent = $(this).parents().get(0);
            $(parent).remove();
            bb = bb-1;
            }
        });
    });
    var res = 0;
    function calcular() {
        try {
            var a = $("input[id=cantidad]").val();
            var b = $("input[id=precio]").val();
            res = (a * b) + res;
            document.getElementById("subTotal").value = a * b;
            document.getElementById("Total").value = res;
        } catch (e) {
        }

    }

    function validarUnidad() {
        var re = new RegExp("^[a-zA-Z ]+$");
        if($("#unidad").val() == ""){
            $("#estadoUnidad").html("<span  class='menor'><h5 class='menor'> </h5></span>");
        }else{
            if($("#unidad").val().length < 3){
                $("#estadoUnidad").html("<span  class='menor'><h5 class='menor'>Ingrese de 3 a 50 caracteres</h5></span>");
            }else{
                if($("#unidad").val().length > 50){
                    $("#estadoUnidad").html("<span  class='menor'><h5 class='menor'>Ingrese de 3 a 50 caracteres</h5></span>");
                }else{
                    if(!re.test($("#unidad").val()) ||  $("#unidad").val() == '-'){
                        $("#estadoUnidad").html("<span  class='menor'><h5 class='menor'>Solo se acepta caracteres [A-Z]</h5></span>");
                    }else{
                        $("#estadoUnidad").html("<span  class='menor'><h5 class='menor'> </h5></span>");
                    }
                }
            }
            
        }
    }

    function validarCantidad() {
        var re = new RegExp("^[0-9]+$");
        if($("#cantidad").val() == ""){
            $("#estadoCantidad").html("<span  class='menor'><h5 class='menor'> </h5></span>");
        }else{
            if($("#cantidad").val() <= 0){
                $("#estadoCantidad").html("<span  class='menor'><h5 class='menor'>Cantidad debe ser mayor a 0</h5></span>");
            }else{
                if(!re.test($("#cantidad").val()) || $("#cantidad").val() == 'e' ||  $("#cantidad").val() == '-'){
                    $("#estadoCantidad").html("<span  class='menor'><h5 class='menor'>Cantidad ingresada incorrecta</h5></span>");
                }else{
                    $("#estadoCantidad").html("<span  class='menor'><h5 class='menor'> </h5></span>");
                }
            }
        }
    }
    function validarSubTotal() {
        var re = new RegExp("^[0-9]+$");
        
        if($("#precio").val() == ""){
            $("#estadoSubTotal").html("<span  class='menor'><h5 class='menor'> </h5></span>");
        }else{
            if($("#precio").val() <= 0){
                $("#estadoSubTotal").html("<span  class='menor'><h5 class='menor'>Cantidad debe ser mayor a 0</h5></span>");
            }else{
                if(!re.test($("#precio").val()) || $("#precio").val() == 'e' ||  $("#precio").val() == '-'){
                    $("#estadoSubTotal").html("<span  class='menor'><h5 class='menor'>Cantidad ingresada incorrecta</h5></span>");
                }else{
                    $("#estadoSubTotal").html("<span  class='menor'><h5 class='menor'> </h5></span>");
                    calcular();
                }
            }
        }
    }

    function existe(){
        var e = document.getElementById("sucursal_origen");
        var str = e.options[e.selectedIndex].text;
        if(str == "Elige una Sucursal de Origen"){
            $("#estadoCodigo").html("<span  class='menor'><h5 class='menor'>Seleccione una sucursal de origen </h5></span>");
        }else{
                $("#nombre").val('');
                validarNombre();
            
        }
    }

    function validarNombre() {
        var cod = document.getElementById("sucursal_origen").value;
        jQuery.ajax({
            url: "/transferencia/llenar",
            data:{
                "_token": "{{ csrf_token() }}",
                "codigoI": $("#codigoI").val(),
                "sucursal":cod,
            },
            asycn:false,
            type: "POST",
            success:function(data){
                $("#estadoCodigo").html(data);
                $("#loaderIcon").hide();
                
            },
            error:function (){
                console.log('no da');
            }
            });
    }


    function addItem(){
        if($("#codigoI").val() == "" || $("#nombre").val() == "" || $("#cantidad").val() == "" || $("#unidad").val() == "" || $("#precio").val() == "" || $("#subTotal").val() == ""){

        }
    }
    </script>