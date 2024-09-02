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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // название | string notnull name
            $table->integer('days');
            $table->integer('area');
            $table->string('image')->nullable();
            $table->timestamps();
        });
        /*
        когда попадет в продакшен и появится надобность менять таблицу то
        php artisan make:migration update_houses --table=houses
        и
        не забыть поменять метод down. типа
        Schema::table('houses', function (Blueprint $table) {
            $table->dropColumn(['перечислить,' 'поля', 'которые добавлю']);
        });
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
