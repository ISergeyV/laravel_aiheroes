<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Эта команда создает таблицу `menu_items` в вашей базе данных.
     */
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Текст ссылки, например, "Services"
            $table->string('url'); // URL, куда ведет ссылка, например, "/services" или "/orange-county-tile-handyman"
            $table->integer('order')->default(0); // Порядок сортировки для выстраивания пунктов по порядку

            // Это самое важное поле для вложенности.
            // Оно будет хранить ID родительского пункта меню.
            // Для пунктов верхнего уровня (как "Home" или "Services") оно будет NULL.
            // Для "Tile" оно будет содержать ID пункта "Services".
            $table->foreignId('parent_id')->nullable()->constrained('menu_items')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Эта команда удалит таблицу, если вы решите отменить миграцию.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
