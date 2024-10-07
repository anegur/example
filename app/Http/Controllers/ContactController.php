<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //

    public function ShowContact() {
        return view('contact');  // Отображение формы
    }

    
    public function ValidateForm(Request $request)
    {

        $validated = $request->validate([
            // 'fullName' => 'required|regex:/^[а-яА-Я]+\s[а-яА-Я]+\s[а-яА-Я]+$/u',
            // 'phone' => 'required|regex:/^(\+7|\+3)\d{9,11}$/',
            'fullName' => [
            'required',
            'regex:/^[а-яА-Я]+\s[а-яА-Я]+\s[а-яА-Я]+$/u'
            ],
            'phone' => [
                'required',
                'regex:/^(\+7|\+3)\d{9,11}$/'
            ],
            'birthday' => 'nullable|date', // Если поле не обязательно
            'email' => 'required|email|max:40',
            'message' => 'required|max:100',
            'gender' => 'required',
            'age' => 'required',
        ],[
            'fullName.required' => 'Введите ваше полное имя.',
            'fullName.regex' => 'ФИО должно быть в формате "Фамилия Имя Отчество".',
            'phone.required' => 'Введите номер телефона.',
            'phone.regex' => 'Некорректный номер телефона.',
            'email.required' => 'Введите email.',
            'email.email' => 'Введите корректный email.',
            'email.max' => 'Адрес эл. почты должен быть не более 40 символов',
            'message.required' => 'Введите сообщение.',
            'message.max' => 'Сообщение должно содержать не более 100 символов.',
            'gender.required' => 'Выберите ваш гендер.',
            'age.required' => 'Выберите возраст.',
        ]);


        Mail::to('larinandrey03@gmail.com')->send(new ContactMail($validated));

        return back()->with('success', 'Ваше сообщение отправлено!');
    }
}
