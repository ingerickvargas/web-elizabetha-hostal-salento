<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->unsignedInteger('size_m2')->nullable();               // Tamaño (m²)
            $table->string('bed_type')->nullable();                       // Ej: 1 cama doble / 2 camas individuales
            $table->enum('bathroom_type', ['privado', 'compartido'])->nullable();
            $table->json('views')->nullable();                            // Vistas (array)
            $table->json('bathroom_items_private')->nullable();           // Ítems si es baño privado
            $table->json('bathroom_items_shared')->nullable();            // Ítems si es baño compartido
            $table->json('services')->nullable();                         // Servicios generales (WiFi, TV, etc)
            $table->string('smoke_policy')->nullable();                   // Política de humo
        });
    }

    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn([
                'size_m2',
                'bed_type',
                'bathroom_type',
                'views',
                'bathroom_items_private',
                'bathroom_items_shared',
                'services',
                'smoke_policy',
            ]);
        });
    }
};
