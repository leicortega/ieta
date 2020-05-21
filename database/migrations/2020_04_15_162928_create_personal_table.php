<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('identificacion');
            $table->string('name');
            $table->string('sede');
            $table->string('cargo');
            $table->enum('estado', ['activo', 'inactivo']);
            $table->string('email')->unique();
            $table->string('rh', 6);
            $table->string('pin');
            $table->string('qr');
            $table->string('foto');
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
        Schema::dropIfExists('personal');
    }
}
