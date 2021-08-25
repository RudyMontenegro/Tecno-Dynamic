<style>
    #formulario1{
        margin: 0 auto;
        text-align: center;
        border-radius: 10px;
        border: 1px solid #ffffff;
        width: 800px;
    }
</style>

<div class="card shadow" >
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col text-right">
                <div class="table-responsive">
                    <!-- Projects table -->
                    <div id="tabla2">
                        <div class="eliminar" id="deletRow" name="deletRow">
                            <h1 class="text-center">Producto</h1>
                            <button class="btn btn-icon btn-danger " type="button" >
                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                            </button>   
                        </div>
                        
                        <div class="row" id="formulario1">
                            <div class="col-6">
                                <label for="codigo"class="control-label text-darker float-left">{{'Codigo Producto'}}</label>
                                <select name="codigo" id="codigo" class="form-control  {{$errors->has('codigo')?'is-invalid':'' }}">
                                    <option selected disabled>Seleccione un sucursal de origen</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="nombre"class="control-label text-darker float-left">{{'Nombre'}}</label>
                                <input type="text" class="form-control  {{$errors->has('nombre')?'is-invalid':'' }}" name="nombre[]" id="nombre" 
                                value="{{ isset($transferencia->nombre)?$transferencia->nombre:old('nombre')  }}"
                                >
                            </div>
                        </div>
                        <div class="row" id="formulario1">
                            <div class="col-4">
                                <label for="cantidad"class="control-label text-darker float-left">{{'Cantidad'}}</label>
                                <input type="text" class="form-control  {{$errors->has('cantidad')?'is-invalid':'' }}" name="cantidad[]" id="cantidad" 
                                value="{{ isset($transferencia->cantidad)?$transferencia->cantidad:old('cantidad')  }}"
                                >
                            </div>
                            <div class="col-4">
                                <label for="unidad"class="control-label text-darker float-left">{{'Unidad'}}</label>
                                <input type="text" class="form-control  {{$errors->has('unidad')?'is-invalid':'' }}" name="unidad[]" id="unidad" 
                                value="{{ isset($transferencia->unidad)?$transferencia->unidad:old('unidad')  }}"
                                >
                            </div>
                            <div class="col-4">
                                <label for="precio"class="control-label text-darker float-left">{{'Precio'}}</label>
                                <input type="text" class="form-control  {{$errors->has('precio')?'is-invalid':'' }}" name="precio[]" id="precio" 
                                value="{{ isset($transferencia->precio)?$transferencia->precio:old('precio')  }}"
                                >
                            </div>
                        </div>
                        <div class="row" id="formulario1">
                            <div class="col-4">
                                <label for="subTotal"class="control-label text-darker float-left">{{'Sub Total'}}</label>
                                <input type="text" class="form-control  {{$errors->has('subTotal')?'is-invalid':'' }}" name="subTotal[]" id="subTotal" 
                                value="{{ isset($transferencia->subTotal)?$transferencia->subTotal:old('subTotal')  }}"
                                >
                            </div>
                            <div class="col-4">
                                
                            </div>
                            <div class="col-4">
                                
                            </div>
                        </div>
                    </div>
                    <script>
                        $("#sucursal_origen").change(event => {
                            $.get(`envioP/${event.target.value}`, function(res, sta){
                                $("#codigo").empty();
                                $("#codigo").append(`<option > Elige el codigo de producto </option>`);
                                res.forEach(element => {
                                    $("#codigo").append(`<option value=${element.id}> ${element.codigo} </option>`);
                                });
                            });
                        });
                    </script>
                    <br>
                    <div id="formulario1">
                            <button type="button" class="btn btn-success btn-lg btn-block" id="adicional"
                                                                            name="adicional">Añadir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                        

<script>
$(function() {
    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
    $("#adicional").on('click', function() {
        $("#tabla2").clone().appendTo("#tabla2").find('input').val("");  
    });
    // Evento que selecciona la fila y la elimina 
    $(document).on("click", ".eliminar", function() {
        var parent = $(this).parents().get(0);
        $(parent).remove();
    });
});
</script>