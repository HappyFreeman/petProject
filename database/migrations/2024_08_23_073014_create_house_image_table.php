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
    { // php artisan make:migration create_house_image_table
        Schema::create('house_image', function (Blueprint $table) {
            $table->foreignId('house_id')->references('id')->on('houses')->cascadeOnDelete();
            $table->foreignId('image_id')->references('id')->on('images')->cascadeOnDelete();
            $table->primary(['house_id', 'image_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_image');
    }
};
