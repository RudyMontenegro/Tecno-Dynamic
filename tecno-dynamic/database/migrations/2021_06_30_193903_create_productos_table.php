<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo');
            $table->string('codigo_barra');
            $table->string('nombre');
            $table->string('categoria');
            $table->string('marca');
            $table->decimal('precio_costo', 8, 2);
            $table->decimal('precio_venta_mayor', 8, 2);
            $table->decimal('precio_venta_menor', 8, 2);
            $table->bigInteger('cantidad');
            $table->string('unidad');
            $table->bigInteger('cantidad_inicial');
            $table->unsignedBigInteger('id_proveedor');
            $table->string('foto');

            $table->foreign('id_proveedor')
            ->references('id')
            ->on('proveedors')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
