<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use Illuminate\Routing\Controller;

class BlogEditorController extends Controller
{
    public function index(){
        return view('admin/blog_editor');
    }

    public function store(Request $request){
        // Валидация встроенными методами Laravel
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'author' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'title.required' => 'Поле "Заголовок" обязательно для заполнения.',
            'title.string' => 'Поле "Заголовок" должно быть строкой.',
            'title.max' => 'Заголовок не должен превышать 255 символов.',
            
            'message.required' => 'Поле "Сообщение" обязательно для заполнения.',
            'message.string' => 'Поле "Сообщение" должно быть строкой.',

            'author.required' => 'Поле "Автор" обязательно для заполнения.',
            'author.string' => 'Поле "Автор" должно быть строкой.',
            'author.max' => 'Имя автора не должно превышать 255 символов.',

            'image.image' => 'Файл должен быть изображением.',
            'image.mimes' => 'Изображение должно быть в формате: jpeg, png, jpg, gif.',
        ]);

        // Создание нового объекта BlogModel
        $blog = new BlogModel();

        // Загрузка изображения
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $blog->image = $path;
        }

        // Сохранение данных в модели
        $blog->title = $validatedData['title'];
        $blog->message = $validatedData['message'];
        $blog->author = $validatedData['author'];
        $blog->created_at = now();

        // Сохранение модели
        $blog->save();

        return view('admin/blog_editor', ['is_post' => true]);
    }
}