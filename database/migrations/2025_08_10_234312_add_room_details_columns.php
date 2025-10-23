<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->unsignedInteger('size_m2')->nullable()->after('image');
            $table->string('bed_type')->nullable()->after('size_m2');
            $table->enum('bathroom_type', ['privado', 'compartido'])->nullable()->after('bed_type');
            $table->json('views')->nullable()->after('bathroom_type');
            $table->json('bathroom_items_private')->nullable()->after('views');
            $table->json('bathroom_items_shared')->nullable()->after('bathroom_items_private');
            $table->json('services')->nullable()->after('bathroom_items_shared');
            $table->string('smoke_policy')->nullable()->after('services');
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
