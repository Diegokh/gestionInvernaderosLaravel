<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('invernaderos', function (Blueprint $table) {
            if (!Schema::hasColumn('invernaderos', 'idUsuario')) {
                $table->unsignedBigInteger('idUsuario')->nullable();
                $table->foreign('idUsuario')->references('idUsuario')->on('usuarios');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }


};
