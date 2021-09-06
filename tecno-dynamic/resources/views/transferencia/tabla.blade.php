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
        <tr>
            <th>
                <input class="form-control" name="codigoI[]" id="codigoI"
                list="codigo" >
                <datalist id="codigo">
                    <option >Seleccione una sucursal de origen</option>
                </datalist>
            </th>
            <td>
                <input type="text"  class="form-control  {{$errors->has('nombre')?'is-invalid':'' }}" name="nombre[]"
                    id="nombre" value="{{ isset($transferencia->nombre)?$transferencia->nombre:old('nombre')  }}">
            </td>
            <td>
                <input type="number"  class="form-control  {{$errors->has('cantidad')?'is-invalid':'' }}" name="cantidad[]"
                    id="cantidad" onkeyup="validarCantidad()"
                    value="{{ isset($transferencia->cantidad)?$transferencia->cantidad:old('cantidad')  }}">
                    <span id="estadoCantidad"></span>
            </td>
            <td>
                <input type="text" class="form-control  {{$errors->has('unidad')?'is-invalid':'' }}" name="unidad[]"
                    id="unidad" value="{{ isset($transferencia->unidad)?$transferencia->unidad:old('unidad')  }}">
            </td>
            <td>
                <div class="input-group">
                    <input type="number" class="form-control  {{$errors->has('precio')?'is-invalid':'' }}" name="precio[]"
                    onkeyup="validarSubTotal()"   id="precio" onkeyup="calcular()" value="{{ isset($transferencia->precio)?$transferencia->precio:old('precio')  }}"><span id="estadoSubTotal"></span>
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
                    `<option value=${element.codigo}> ${element.codigo} </option>`
                );
            });
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

        $("#tabla tbody tr:eq(0)").clone().appendTo("#tabla");
        limpiar();
        bb = bb +1;
        $('#deletRow').show();
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

function validarCantidad() {
    var re = new RegExp("^[0-9]+$");
    if($("#cantidad").val() == ""){
        $("#estadoCantidad").html("<span  class='menor'><h5 class='menor'> </h5></span>");
    }else{
        if($("#cantidad").val() <= 0){
            $("#estadoCantidad").html("<span  class='menor'><h5 class='menor'>Cantidad debe ser mayor a 0</h5></span>");
        }else{
            if(!re.test($("#cantidad").val())){
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
            if(!re.test($("#precio").val())){
                $("#estadoSubTotal").html("<span  class='menor'><h5 class='menor'>Cantidad ingresada incorrecta</h5></span>");
            }else{
                $("#estadoSubTotal").html("<span  class='menor'><h5 class='menor'> </h5></span>");
            }
        }
    }
}

</script>