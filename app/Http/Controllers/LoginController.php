<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Форма логина/регистрации
    public function showLoginForm()
    {
        return view('auth.login'); // Представление для логина и регистрации
    }

    // Подтверждение логина
    public function loginConfirm(Request $request)
    {
        // Валидация с кастомными сообщениями
        $validator = Validator::make($request->all(), [
            'login' => 'required|string',
            'password' => 'required|string|min:6',
        ], [
            'login.required' => 'Пожалуйста, введите ваш логин.',
            'password.required' => 'Пароль обязателен для ввода.',
            'password.min' => 'Пароль должен содержать не менее 6 символов.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password')); // Возвращаем данные кроме пароля
        }

        // Аутентификация
        $credentials = $request->only('login', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if (!$user) {
                return redirect()->back()->withErrors('Неверные логин или пароль.');
            }

            // Перенаправление в зависимости от роли
            if ($user->hasRole('admin')) {
                return redirect()->route('panel.get_panel');
            }

            return redirect()->route('index');
        }

        // Если аутентификация не удалась
        return redirect()->back()->withErrors([
            'auth_error' => 'Неверные логин или пароль.',
        ])->withInput($request->except('password'));
    }

    // Подтверждение регистрации
    public function registerConfirm(Request $request)
    {
        // Валидация с кастомными сообщениями
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'login' => 'required|string|unique:users,login',
        //     'password' => 'required|string|min:6|confirmed',
        // ], [
        //     'name.required' => 'Пожалуйста, введите полное имя.',
        //     'email.required' => 'Пожалуйста, введите email.',
        //     'email.email' => 'Неверный формат email.',
        //     'email.unique' => 'Пользователь с таким email уже зарегистрирован.',
        //     'login.required' => 'Пожалуйста, введите логин.',
        //     'login.unique' => 'Пользователь с таким логином уже существует.',
        //     'password.required' => 'Пожалуйста, введите пароль.',
        //     'password.min' => 'Пароль должен содержать не менее 6 символов.',
        //     'password.confirmed' => 'Подтверждение пароля не совпадает.',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput($request->except('password'));
        // }

        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'login' => 'required|string|unique:users,login',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // dd($request->validate);

        // Создание пользователя
        $user = User::create([
            'name' => $request->input('fullname'),
            'email' => $request->input('email'),
            'login' => $request->input('login'),
            'password' => bcrypt($request->input('password')),
        ]);

        // $user = User::create([
        //     'name' => 'user',
        //     'email' => 'user@mail.ru',
        //     'login' => 'userlogin',
        //     'password' => bcrypt('user'),
        // ]);
        // $user->assignRole('user');

        // dd($user);

        $user->assignRole('user');
        Auth::login($user, true);

        return redirect()->route('index');
    }

    // Логаут
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

