<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comprobante');
            $table->string('responsable_transferencia');
            $table->date('fecha');
            $table->string('sucursal_origen');
            $table->string('sucursal_destino');
            $table->unsignedBigInteger('id_sucursal');

            $table->foreign('id_sucursal')
            ->references('id')
            ->on('sucursals')
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
        Schema::dropIfExists('transferencias');
    }
}
