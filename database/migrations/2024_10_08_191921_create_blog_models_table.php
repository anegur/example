<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id('post_id'); // Идентификатор записи (первичный ключ)
            $table->string('title'); // Заголовок статьи
            $table->text('message'); // Текст сообщения
            $table->string('author'); // Автор статьи
            $table->string('image')->nullable(); // Путь к изображению (может быть null)
            $table->timestamp('created_at')->useCurrent(); // Время создания записи
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog');
    }
}
