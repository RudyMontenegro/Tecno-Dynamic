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
                                            <input name="nombre" id="nombre" type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input name="cantidad" id="cantidad" onBlur="calcular()"
                                                class="form-control" type="number" id="example-number-input">
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Bs</span>
                                                </div>
                                                <input type="number" name="precio" id="precio" onBlur="calcular()"
                                                    class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Bs</span>
                                                </div>
                                                <input type="number" name="sub_total" id="sub_total"
                                                    class="form-control">
                                            </div>
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
                            name="adicional">Gurdar y añadir</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">
function calcular() {
    try {
        var a = $("input[name=cantidad]").val();
        var b = $("input[name=precio]").val();
        document.getElementById("sub_total").value = a * b;
    } catch (e) {

    }
}

function limpiarCampos() {
    $("#codigo_producto").val('');
    $("#nombre").val('');
    //  $("#sub_total").val('');
    $("#cantidad").val('');
    $("#precio").val('');

}
$(".btnenviar").click(function(e) {

    $("#tabla tbody tr:eq(0)").clone().appendTo("#tabla").removeClass('fila-fija');
    // $(this).val(''); // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla

    $(document).on("click", ".eliminar", function() {
        var parent = $(this).parents().get(0);
        $(parent).remove();
    }); // Evento que selecciona la fila y la elimina 

    e.preventDefault(); //evitar recargar la pagina..
    var codigo_producto = $("input[name=codigo_producto]").val();
    var nombre = $("input[name=nombre]").val();
    var cantidad = $("input[name=cantidad]").val();
    var precio = $("input[name=precio]").val();
    var sub_total = $("input[name=sub_total]").val();
    $.ajax({
        type: 'POST',
        url: '/venta',
        data: {
            "_token": "{{ csrf_token() }}",
            codigo_producto: codigo_producto,
            nombre:nombre,
            cantidad:cantidad,
            precio:precio,
            sub_total:sub_total
        },
    });
    limpiarCampos();
    calcular();
});
</script>