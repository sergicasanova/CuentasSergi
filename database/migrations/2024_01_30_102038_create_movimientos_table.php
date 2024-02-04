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
        Schema::create('movimientos', function(Blueprint $table) {
            $table->id();
            $table->foreignId('cuentas_bancarias_id')->constrained('cuentas_bancarias');
            $table->float('cantidad');
            $table->string('concepto');
            $table->enum('tipo', ['ingreso', 'gasto']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
