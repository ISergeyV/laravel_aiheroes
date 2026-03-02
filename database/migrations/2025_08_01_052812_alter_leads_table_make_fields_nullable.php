<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * Этот метод будет выполнен, когда мы запустим `php artisan migrate`.
     */
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            // Мы изменяем существующие колонки, делая их nullable.
            // Метод ->change() требует пакет doctrine/dbal.
            $table->string('client_full_name')->nullable()->change();
            $table->string('client_phone')->nullable(false)->change();
            $table->string('service_type')->nullable()->change();
            $table->string('urgency_level')->nullable()->change();
            $table->text('job_description')->nullable()->change();
            $table->string('company_website')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     * Этот метод позволит нам "откатить" изменения, если что-то пойдет не так.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            // Возвращаем колонки в их исходное, НЕ nullable состояние.
            // Внимание: откат миграции может вызвать ошибку, если в базе уже есть
            // записи с пустыми (NULL) значениями в этих полях.
            $table->string('client_full_name')->nullable(false)->change();
            $table->string('client_phone')->nullable()->change();
            $table->string('service_type')->nullable(false)->change();
            $table->string('urgency_level')->nullable(false)->change();
            $table->text('job_description')->nullable(false)->change();
            $table->string('company_website')->nullable(false)->change();
        });
    }
};
