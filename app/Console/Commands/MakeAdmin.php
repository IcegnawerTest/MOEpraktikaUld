<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MakeAdmin extends Command
{
    protected $signature = 'make:admin';
    protected $description = 'Создание аккаунта администратора';

    public function handle()
    {
        $role = 'admin';
        $name = $this->ask('Введите имя администратора');
        $email = $this->ask('Введите почту администратора');
        $password = $this->secret('Введите пароль от 8 символов');

        $validator= Validator::make(['name' => $name, 'email' => $email, 'password' => $password], [
            'name' => 'required|max:50|min:2',
            'email' => 'required|email',
            'password' => 'required|max:20|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors->all() as $error){
                $this->info($error);
            }
        }
        else {
        $user = User::create([
            'role' => $role,
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        $this->info('Аккаунт создан.');
        }
    }
}
