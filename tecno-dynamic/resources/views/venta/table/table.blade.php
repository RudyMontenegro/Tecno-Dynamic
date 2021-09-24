<link href="{{ asset('css/venta/table.css') }}" rel="stylesheet">
<div class="table-responsive">
    <table class="table" id="tabla">
        <thead class="thead-light">
            <tr>
                <th scope="col">Codigo de producto | </th>
                <th scope="col">Nombre | </th>
                <th scope="col">Unidad | </th>
                <th scope="col">Cantidad | </th>
                <th scope="col">Precio | </th>
                <th scope="col">Subtotal | </th>
                <th scope="col">Eliminar | </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>
                    <input class="form-control" name="codigoI[]" id="codigoI" onkeyup="SucursalExiste()"   list="codigo">
                    <datalist id="codigoDatalist">
                    </datalist>
                    <span id="estadoCodigo"></span>
                    <span id="estadoCodigoI"></span>
                </th>
                <td>
                    <input type="text" class="form-control" name="nombre[]" id="nombre">
                </td>
                <td>
                    <input type="text" class="form-control" name="unidad[]" id="unidad">
                </td>
                <td>
                    <input type="number" class="form-control" name="cantidad[]" onBlur="calcular()" id="cantidad">
                </td>
                <td>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Bs.</span>
                        </div>
                        <input type="number" class="form-control" onBlur="calcular()" name="precio[]" id="precio">
                    </div>
                </td>
                <td>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Bs.</span>
                        </div>
                        <input type="number" class="form-control" name="subTotal[]" id="subTotal">
                    </div>

                </td>
                <td class="eliminar" id="deletRow" name="deletRow">
                    <button class="btn btn-icon btn-danger" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-success btn-lg btn-block" id="adicional" name="adicional">Añadir</button>
</div>
<script src="{{ asset('js/venta/table.js') }}"></script>
