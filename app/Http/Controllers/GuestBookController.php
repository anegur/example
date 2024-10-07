<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $messages = $this->getMessages();
        // return view('gb', ['messages' => $messages]);
           
        return view('guest_book', ['messages' => $messages]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валидация данных с формы
        // $data = $request->validate([
        //     'surname' => 'required|string|max:255',
        //     'name' => 'required|string|max:255',
        //     'patronymic' => 'required|string|max:255',
        //     'email' => 'required|email',
        //     'message' => 'required|string',
        // ]);

        $data = $request->validate([
            // 'fullName' => 'required|regex:/^[а-яА-Я]+\s[а-яА-Я]+\s[а-яА-Я]+$/u',
            // 'phone' => 'required|regex:/^(\+7|\+3)\d{9,11}$/',
            'fullname' => [
            'required',
            'regex:/^[а-яА-Я]+\s[а-яА-Я]+\s[а-яА-Я]+$/u'
            ],
            'email' => 'required|email|max:40',
            'message' => 'required|max:400',
        ],[
            'fullname.required' => 'Введите ваше полное имя.',
            'fullname.regex' => 'ФИО должно быть в формате "Фамилия Имя Отчество".',
            'email.required' => 'Введите email.',
            'email.email' => 'Введите корректный email.',
            'email.max' => 'Адрес эл. почты должен быть не более 40 символов',
            'message.required' => 'Введите сообщение.',
            'message.max' => 'Сообщение должно содержать не более 400 символов.',
        ]);

        // Формирование строки для записи в файл
        $datetime = now()->format('Y-m-d H:i:s'); // Получаем текущую дату и время
        $fullname = $data['fullname']; // Используем значение из объединенного поля 'fullname'
        $email = $data['email'];
        $message = $data['message'];

        // Собираем строку для файла
        $entry = "{$datetime};{$fullname};{$email};{$message}\n";

        // Записываем в файл
        file_put_contents(storage_path('app/public/uploads/messages.inc'), $entry, FILE_APPEND);

        // Перенаправляем обратно с успешным сообщением
        return redirect()->back()->with('success', 'Сообщение успешно добавлено!');
    }

    private function getMessages() {
        $messages = [];
        $messages_file = file(storage_path('app/public/uploads/messages.inc'));
        foreach ($messages_file as $message) {
            $data = explode(';', trim($message));
            if (count($data) === 4) {
                $messages[] = [
                    'datetime' => $data[0],
                    'fullname' => $data[1],
                    'email' => $data[2],
                    'message' => $data[3]
                ];
            }
        }
        return array_reverse($messages);
    }
}
