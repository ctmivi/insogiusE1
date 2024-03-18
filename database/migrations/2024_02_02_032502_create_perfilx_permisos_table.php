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
        Schema::create('perfilx_permisos', function (Blueprint $table) {
            $table->foreignId('id_perfil')->constrained('perfils');
            $table->foreignId('id_permiso')->constrained('permisos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfilx_permisos');
    }
};
