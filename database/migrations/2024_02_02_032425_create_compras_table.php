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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('id_producto')->nullable()->constrained('productos');
            $table->foreignId('id_usuario')->constrained('users');
            $table->timestamp('fecha_compra')->useCurrent();
            $table->decimal('total', 10, 2);
            $table->unsignedTinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
