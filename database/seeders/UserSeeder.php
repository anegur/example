<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создание пользователя с ролью 'recruiter'
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'login' => 'adminlogin',
            'password' => bcrypt('admin'),
        ]);
        $user->assignRole('admin');

        // Создание пользователя с ролью 'applicant'
        $user = User::create([
            'name' => 'user',
            'email' => 'user@mail.ru',
            'login' => 'userlogin',
            'password' => bcrypt('user'),
        ]);
        $user->assignRole('user');
    }
}
