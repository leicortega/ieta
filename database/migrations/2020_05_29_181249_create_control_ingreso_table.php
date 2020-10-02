<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_ingresos', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->bigInteger('identificacion')->unique();
            $table->bigInteger('telefono');
            $table->integer('edad');
            $table->string('email')->unique()->nullable();
            $table->enum('tipo', ['Funcionario', 'Cliente']);
            $table->string('direccion',30)->nullable();
            $table->string('barrio',30)->nullable();
            $table->enum('transporte', ['vehiculo particular', 'servicio publico', 'bicicleta', 'a pie'])->nullable();
            $table->string('tiempo', 30)->nullable();
            $table->enum('diabetes', ['Si', 'No'])->nullable();
            $table->enum('cardio_vascular', ['Si', 'No'])->nullable();
            $table->enum('pulmonar', ['Si', 'No'])->nullable();
            $table->enum('obesidad', ['Si', 'No'])->nullable();
            $table->bigInteger('personas_convive')->nullable();
            $table->string('rango', 20)->nullable();
            $table->enum('campo_salud', ['Si', 'No'])->nullable();
            $table->enum('enfermedad_inmunosupresora', ['Si', 'No'])->nullable();
            $table->enum('hipertension', ['Si', 'No'])->nullable();
            $table->enum('enfermedad_pulmonar', ['Si', 'No'])->nullable();


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
        Schema::dropIfExists('control_ingreso');
    }
}
