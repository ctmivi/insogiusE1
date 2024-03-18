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
        Schema::create('perfils', function (Blueprint $table) {
            $table->id();
            $table->integer('usuario_id')->unique(); 
            $table->string('foto_perfil')->nullable();
            $table->integer('score');
            $table->integer('coin');
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfils');
    }
};
