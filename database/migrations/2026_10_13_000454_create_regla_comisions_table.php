<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
{
    Schema::create('reglas_comision', function (Blueprint $table) {
        $table->id();
        $table->decimal('umbral', 10, 2);
        $table->decimal('porcentaje', 5, 2);
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('regla_comisions');
    }
};
