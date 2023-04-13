<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personal_id')->constrained();
            $table->string('Area');
            $table->string('Cargo');
            $table->string('Local');
            $table->date('Inicio');
            $table->date('Fin');
            $table->integer('Tipo');
            $table->integer('Estado')->default(1);//ESTADO 1: ACTIVO, ESTADO 2: ELIMINADO;
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
        Schema::dropIfExists('contratos');
    }
}
