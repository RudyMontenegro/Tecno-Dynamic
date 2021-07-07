<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comprobante');
            $table->string('proveedor');
            $table->string('responsable_compra');
            $table->date('fecha');
            $table->string('tipo_compra');
            $table->string('observaciones');
            $table->unsignedBigInteger('id_sucursal');
            $table->unsignedBigInteger('id_proveedor');

            $table->foreign('id_sucursal')
            ->references('id')
            ->on('sucursals')
            ->onDelete('cascade');

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
        Schema::dropIfExists('compras');
    }
}
