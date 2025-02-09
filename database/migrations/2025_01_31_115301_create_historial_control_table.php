<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('historial_control', function (Blueprint $table) {
            $table->id('idHistorial');
            $table->string('accionHistorial');
            $table->date('fechaHistorial');
            $table->time('horaHistorial');
            $table->integer('id_Dispositivo');
            $table->integer('id_Invernadero');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_control');
    }
};
