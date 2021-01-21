<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_materias', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->longText('descripcion');
            $table->string('adjunto');
            $table->enum('entregado', [0, 1])->default(0);
            $table->dateTime('fecha_entrega')->nullable();
            $table->string('adjunto_entregado')->nullable();
            $table->float('calificacion')->nullable();

            $table->foreignId('materias_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('estudiantes_id')
                ->constrained()
                ->nullOnDelete();

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
        Schema::dropIfExists('detalle_materias');
    }
}
