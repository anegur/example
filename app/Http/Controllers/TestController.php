<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    // public function ShowTest() 
    // {
    //     return view('test'); //, compact('tests')
    // }

    public function ShowTest() {
        return view('test');  // Отображение формы
    }

    public function ValidateForm(Request $request)
    {
        // Валидация данных формы
        $validated = $request->validate([
            'name' => 'required|regex:/^[а-яА-Я]+\s[а-яА-Я]+\s[а-яА-Я]+$/u',
            'group' => 'required',
            'question1' => 'required|array|max:3',
            'question2' => 'required',
            'question3' => 'required|numeric',
        ], [
            'name.required' => 'Поле ФИО обязательно.',
            'name.regex' => 'ФИО должно быть в формате "Фамилия Имя Отчество".',
            'group.required' => 'Выберите свою группу.',
            'question1.required' => 'Выберите хотя бы один вариант в первом вопросе.',
            'question1.max' => 'Вы должны выбрать до трёх вариантов ответа в первом вопросе.',
            'question2.required' => 'Выберите вариант во втором вопросе.',
            'question3.required' => 'Заполните поле ответа на третий вопрос.',
            'question3.numeric' => 'Ответ на третий вопрос должен быть числом.',
        ]);

        // Обработка данных после валидации
        return redirect()->back()->with('success', 'Форма успешно отправлена!');
    }
}
