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
        Schema::table('houses', function (Blueprint $table) {
            $table->dropColumn('image'); // удаляем старое поле для хранение изображения (по хорошему нужно перенести данные)
            $table->foreignId('image_id')
                ->nullable()
                ->after('area') // после какого поля
                ->references('id') // на какое поле
                ->on('images') // какую таблицу
                ->nullOnDelete()
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('houses', function (Blueprint $table) { // возвращаем всё как было (правда сами изображения не вернём мы их пропили)
            $table->dropColumn('image_id');
            $table->string('image')->nullable()->after('area');
        });
    }
};
