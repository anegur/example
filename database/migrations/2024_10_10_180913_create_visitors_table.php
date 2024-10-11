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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->timestamp('visited_at');  // Дата и время посещения
            $table->string('web_page');       // URL посещенной страницы
            $table->ipAddress('ip_address');  // IP-адрес
            $table->string('host_name');      // Имя хоста
            $table->string('browser_name');   // Название браузера
            $table->timestamps();             // Время создания и обновления записи
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
