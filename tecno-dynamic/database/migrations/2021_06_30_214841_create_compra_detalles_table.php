<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_producto');
            $table->string('nombre');
            $table->bigInteger('cantidad');
            $table->string('unidad');
            $table->decimal('precio', 8, 2);
            $table->decimal('sub_total', 8, 2);
            $table->unsignedBigInteger('id_compra');

            $table->foreign('id_compra')
            ->references('id')
            ->on('compras')
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
        Schema::dropIfExists('compra_detalles');
    }
}
