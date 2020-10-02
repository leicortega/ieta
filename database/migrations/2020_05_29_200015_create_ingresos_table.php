<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->enum('estado', ['Bien', 'Mal']);
            $table->float('temperatura');
            $table->enum('contagiados', ['Si', 'No']);
            $table->enum('dolor',['Si', 'No'])->nullable();
            $table->enum('fiebre',['Si', 'No'])->nullable();
            $table->enum('tos',['Si', 'No'])->nullable();
            $table->enum('dificultad',['Si', 'No'])->nullable();
            $table->enum('fatiga',['Si', 'No'])->nullable();
            $table->enum('escalofrio',['Si', 'No'])->nullable();
            $table->enum('musculo',['Si', 'No'])->nullable();

            $table->foreignId('control_ingreso_id')
                ->constrained()
                ->onDelete('cascade');
                
            $table->string('sede', 90);

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
        Schema::dropIfExists('ingresos');
    }
}
