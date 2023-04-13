<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('Nombres');
            $table->string('Apellidos');
            $table->string('DNI')->unique();
            $table->string('Correo');
            $table->string('fechaNacimiento');
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
        Schema::dropIfExists('personals');
    }
}
