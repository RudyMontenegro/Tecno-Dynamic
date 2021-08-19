<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="card shadow">
    <form>
        @csrf
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col text-right">
                    <div class="table-responsive">

                        <!-- Projects table -->
                        <table class="table align-items-center" id="tabla">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Codigo de producto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio/Unidad</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="fila-fija">
                                    <tr>
                                        <th>
                                            <input name="codigo_producto" id="codigo_producto" type="text"
                                                class="form-control">
                                        </th>
                                        <td>
                                            <input type="text"
                                                class="form-control  {{$errors->has('nombre')?'is-invalid':'' }}"
                                                name="nombre[]" id="nombre"
                                                value="{{ isset($transferencia->nombre)?$transferencia->nombre:old('nombre')  }}">
                                        </td>
                                        <td>
                                            <input type="number" onBlur="calcular()"
                                                class="form-control  {{$errors->has('cantidad')?'is-invalid':'' }}"
                                                name="cantidad[]" id="cantidad"
                                                value="{{ isset($transferencia->cantidad)?$transferencia->cantidad:old('cantidad')  }}">
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Bs</span>
                                                </div>
                                                <input type="number" onBlur="calcular()"
                                                    class="form-control  {{$errors->has('precio')?'is-invalid':'' }}"
                                                    name="precio[]" id="precio"
                                                    value="{{ isset($transferencia->precio)?$transferencia->precio:old('precio')  }}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Bs</span>
                                                </div>

                                                <input type="number"
                                                    class="form-control  {{$errors->has('sub_total')?'is-invalid':'' }}"
                                                    name="sub_total[]" id="sub_total"
                                                    value="{{ isset($transferencia->sub_total)?$transferencia->sub_total:old('sub_total')  }}">
                                        </td>
                                        <td class="eliminar" id="deletRow" name="deletRow">
                                            <button class="btn btn-icon btn-danger " type="button">
                                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                </div>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success btn-lg btn-block btnenviar" id="adicional"
                            name="adicional">Añadir</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">
function calcular() {
    try {
        var a = $("input[id=cantidad]").val();
        var b = $("input[id=precio]").val();
        document.getElementById("sub_total").value = a * b;
    } catch (e) {

    }
}
function limpiarCampos() {
    $("#codigo_producto").val('');
    $("#nombre").val('');
    $("#sub_total").val('');
    $("#cantidad").val('');
    $("#precio").val('');

}
$(".btnenviar").click(function(e) {
    e.preventDefault(); //evitar recargar la pagina..
    $("#tabla tbody tr:eq(0)").clone().appendTo("#tabla").removeClass('fila-fija');
    // $(this).val(''); // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla

    $(document).on("click", ".eliminar", function() {
        var parent = $(this).parents().get(0);
        $(parent).remove();
    }); // Evento que selecciona la fila y la elimina 
    limpiarCampos();
});
</script>