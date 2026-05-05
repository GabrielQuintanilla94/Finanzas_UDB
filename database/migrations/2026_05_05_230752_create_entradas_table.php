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
    Schema::create('entradas', function (Blueprint $table) {
        $table->id();
        $table->string('tipo'); // Honorarios, Ventas, etc.
        $table->decimal('monto', 10, 2);
        $table->date('fecha');
        $table->string('factura_ruta')->nullable(); // Para guardar la imagen del recibo
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
