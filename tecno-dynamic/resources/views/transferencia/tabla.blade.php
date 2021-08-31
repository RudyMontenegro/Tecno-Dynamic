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
                <select name="codigo" id="codigo" class="form-control  {{$errors->has('codigo')?'is-invalid':'' }}">
                    <option selected disabled>Seleccione un sucursal de origen</option>
                </select>
            </th>
            <td>
                <input type="text"  class="form-control  {{$errors->has('nombre')?'is-invalid':'' }}" name="nombre[]"
                    id="nombre" value="{{ isset($transferencia->nombre)?$transferencia->nombre:old('nombre')  }}">
            </td>
            <td>
                <input type="text" onBlur="calcular()" class="form-control  {{$errors->has('cantidad')?'is-invalid':'' }}" name="cantidad[]"
                    id="cantidad"
                    value="{{ isset($transferencia->cantidad)?$transferencia->cantidad:old('cantidad')  }}">
            </td>
            <td>
                <input type="text" class="form-control  {{$errors->has('unidad')?'is-invalid':'' }}" name="unidad[]"
                    id="unidad" value="{{ isset($transferencia->unidad)?$transferencia->unidad:old('unidad')  }}">
            </td>
            <td>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Bs</span>
                    </div>
                    <input type="text" class="form-control  {{$errors->has('precio')?'is-invalid':'' }}" name="precio[]"
                        id="precio" onBlur="calcular()" value="{{ isset($transferencia->precio)?$transferencia->precio:old('precio')  }}">
                </div>
            </td>
            <td>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Bs</span>
                    </div>
                    <input type="text" class="form-control  {{$errors->has('subTotal')?'is-invalid':'' }}"
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
                `<option value=${element.id}> ${element.codigo} </option>`
            );
        });
    });
});
</script>

<script>
    var bb= 0;
$(function() {
    $("#adicional").on('click', function() {

        $("#tabla tbody tr:eq(0)").clone().appendTo("#tabla").find('input').val(' ');
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
</script>