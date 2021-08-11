<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

<div class="card shadow">
<form action="{{ url('venta') }}" method="post">
            @csrf
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col text-right">
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Nombre del prodcuto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio/Unidad</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                    </table>
                    <table class="table align-items-center" id="tabla">
                        <tbody>
                            <div class="fila-fija">
                                <tr>
                                    <th>
                                        <h4>1</h4>
                                    </th>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Default input">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" value="23" id="example-number-input">
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control"
                                                aria-label="Amount (to the nearest dollar)">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" id="onlyIn" name="onlyIn
                                                aria-label=" Amount (to the nearest dollar)">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
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
                    <button type="submit" class="btn btn-success btn-lg btn-block" id="adicional4x| "
                        name="adicional">Gurdar y añadir</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>

<script>
$(function() {
    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
    $("#adicional").on('click', function() {
        $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
        $(this).val('');
    });

    // Evento que selecciona la fila y la elimina 
    $(document).on("click", ".eliminar", function() {
        var parent = $(this).parents().get(0);
        $(parent).remove();
    });
});
</script>