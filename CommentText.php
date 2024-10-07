<?php
use App\Mail\ContactMail;

// ContactMail


// namespace App\Mail;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Mail\Mailable;
// use Illuminate\Mail\Mailables\Content;
// use Illuminate\Mail\Mailables\Envelope;
// use Illuminate\Queue\SerializesModels;

// class ContactMail extends Mailable //xhee lqyw uzit yvjz
// {
//     use Queueable, SerializesModels;

//     /**
//      * Create a new message instance.
//      */

//      public $data;

//      public function __construct($data)
//     {
//         $this->data = $data;
//     }

//     public function build()
//     {
//         return $this->view('emails.contact')
//                     ->with('data', $this->data); // Передаем данные в шаблон
//     }

//     public $senderEmail;

//     // public function __construct($data, $senderEmail)
//     // {
//     //     $this->data = $data;
//     //     $this->senderEmail = $senderEmail; // Сохраняем адрес отправителя
//     // }

    

//     // public function build()
//     // {
//     //     return $this->subject('Новое сообщение с контактов')
//     //                 ->view('emails.contact')
//     //                 ->with([
//     //                     'senderEmail' => $this->senderEmail, // Передаем адрес в представление
//     //                     'data' => $this->data,
//     //                 ]);
//     // }

//     /**
//      * Get the message envelope.
//      */
//     public function envelope(): Envelope
//     {
//         return new Envelope(
//             subject: 'Contact Mail',
//         );
//     }

//     /**
//      * Get the message content definition.
//      */
//     public function content(): Content
//     {
//         return new Content(
//             view: 'emails.contact', // Исправлено на 'emails.contact'
//         );
//     }

//     /**
//      * Get the attachments for the message.
//      *
//      * @return array<int, \Illuminate\Mail\Mailables\Attachment>
//      */
//     public function attachments(): array
//     {
//         return [];
//     }
// }

//ContactControler

 // // Подготовка данных для отправки почты
        // $data = [
        //     'fullName' => $validated['fullName'],
        //     'phone' => $validated['phone'],
        //     'birthday' => $validated['birthday'],
        //     'gender' => $validated['gender'],
        //     'age' => $validated['age'],
        //     'email' => $validated['email'],
        //     'messageContent' => $validated['message'],
        // ];

        // // Отправка email
        // Mail::send('emails.contact', $data, function($message) use ($data) {
        //     $message->to('larinandrey03@gmail.com')
        //             ->subject('Новое сообщение с сайта')
        //             ->from($data['email'], $data['fullName']);
        // });

        // // Возврат ответа с успехом
        // return back()->with('success', 'Ваше сообщение успешно отправлено!');

        // // Получаем данные из запроса
        // $fullName = $validated['fullName'];
        // $phone = $validated['phone'];
        // $birthday = $validated['birthday'];
        // $gender = $validated['gender'];
        // $age = $validated['age'];
        // $email = $validated['email'];
        // $messageContent = $validated['message'];
        
        // // Создаем mailto ссылку
        // $mailtoLink = "mailto:your-email@example.com?subject=Новое сообщение&body=
        // Имя: $fullName\n
        // Телефон: $phone\n
        // Дата рождения: $birthday\n
        // Гендер: $gender\n
        // Возраст: $age\n
        // Email: $email\n
        // Сообщение: $messageContent";

        // // Возвращаем представление с mailto ссылкой
        // return view('contact', ['mailtoLink' => $mailtoLink]);

        // try {
        //     Mail::to('your_email@example.com') // Укажите ваш email для получения
        //         ->send(new ContactMail($validated));

        //     return redirect()->back()->with('success', 'Сообщение отправлено успешно!');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'Ошибка при отправке сообщения: ' . $e->getMessage());
        // }
        // Получаем адрес для отправки на основе .env
    // Отправляем письмо
    // Mail::to($validated['email'])->send(new ContactMail($validated, $request->email));

    //     return redirect()->back()->with('success', 'Ваше сообщение отправлено!');
    // }

    // public function ValidateForm(Request $request)
    // {
    //     $validated = $request->validate( [
    //         'fullName' => 'required', // Убрали regex для теста
    //         'phone' => 'required', // Убрали regex для теста
    //         'email' => 'required|email|max:40',
    //         'message' => 'required|max:100',
    //         'gender' => 'required',
    //         'age' => 'required',
    //     ]);
        
    //     // Отправка email
    //     Mail::to('your_email@example.com')->send(new ContactMail($validated));

    // $validated = $request->validate([
    //     // 'fullName' => 'required|regex:/^[а-яА-Я]+\s[а-яА-Я]+\s[а-яА-Я]+$/u',
    //     // 'phone' => 'required|regex:/^(\+7|\+3)\d{9,11}$/',
    //     'fullName' => [
    //     'required',
    //     'regex:/^[а-яА-Я]+\s[а-яА-Я]+\s[а-яА-Я]+$/u'
    //     ],
    //     'phone' => [
    //         'required',
    //         'regex:/^(\+7|\+3)\d{9,11}$/'
    //     ],
    //     'birthday' => 'nullable|date', // Если поле не обязательно
    //     'email' => 'required|email|max:40',
    //     'message' => 'required|max:100',
    //     'gender' => 'required',
    //     'age' => 'required',
    // ],[
    //     'fullName.required' => 'Введите ваше полное имя.',
    //     'fullName.regex' => 'ФИО должно быть в формате "Фамилия Имя Отчество".',
    //     'phone.required' => 'Введите номер телефона.',
    //     'phone.regex' => 'Некорректный номер телефона.',
    //     'email.required' => 'Введите email.',
    //     'email.email' => 'Введите корректный email.',
    //     'email.max' => 'Адрес эл. почты должен быть не более 40 символов',
    //     'message.required' => 'Введите сообщение.',
    //     'message.max' => 'Сообщение должно содержать не более 100 символов.',
    //     'gender.required' => 'Выберите ваш гендер.',
    //     'age.required' => 'Выберите возраст.',
    // ]);

    // // Получаем данные из запроса
    // $data = [
    //     'fullName' => $validated['fullName'],
    //     'phone' => $validated['phone'],
    //     'birthday' => $validated['birthday'], // Убедитесь, что вы добавили это поле
    //     'gender' => $validated['gender'],
    //     'age' => $validated['age'],
    //     'email' => $validated['email'],
    //     'message' => $validated['message'],
    // ];

    // Mail::to('recipient@example.com')->send(new ContactMail($data));

    // return back()->with('success', 'Ваше сообщение отправлено!');