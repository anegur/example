<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'blog'; // Указание таблицы
    protected $primaryKey = 'post_id'; // Первичный ключ

    public $timestamps = false; // Отключение автоматической работы с timestamp

    // Перечень полей, доступных для массового заполнения
    protected $fillable = ['title', 'message', 'author', 'image', 'created_at'];

    // // Связь "один ко многим" с комментариями
    // public function comments()
    // {
    //     return $this->hasMany('App\Models\CommentModel', 'post_id', 'post_id')->orderBy('created_at', 'desc');
    // }
}
