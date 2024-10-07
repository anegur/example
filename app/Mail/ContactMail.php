<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data; // Сохраняем данные
    }

    public function build()
    {
        return $this->view('emails.contact') // Указываем шаблон
                    ->with('data', $this->data); // Передаем данные в шаблон
    }
}

