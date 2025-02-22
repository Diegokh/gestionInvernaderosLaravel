<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('notificacionalertausuario', function (Blueprint $table) {
            $table->unsignedBigInteger('id_Invernadero')->change();
            $table->foreign('id_Invernadero')
                  ->references('id_Invernadero')
                  ->on('invernaderos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notificacionalertausuario', function (Blueprint $table) {
            // Eliminar la clave foránea si se hace rollback
            $table->dropForeign(['id_Invernadero']);
        });
    }
};
