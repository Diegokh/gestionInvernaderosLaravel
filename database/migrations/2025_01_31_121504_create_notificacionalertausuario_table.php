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
        Schema::create('notificacionalertausuario', function (Blueprint $table) {
            $table->id('idNotificacion');
            $table->date('fechaNotificacion');
            $table->time('horaNotificacion');
            $table->integer('idUsuario');
            $table->integer('id_Invernadero');
            $table->integer('idAlerta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacionalertausuario');
    }
};
