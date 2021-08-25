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
                        <input class="form-control" id="search" type="text" placeholder="Default input"
                            aria-label="default input example">
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