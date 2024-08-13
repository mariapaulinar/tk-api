<?php

use App\Repositories\V1\UserRepository;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('user:admin {password}', function(string $password) {
    if(!$password) {
        return $this->comment('No ingresaste un password. Intenta nuevamente.');
    }
    $userRepository = app()->make(UserRepository::class);
    $data = [
        'email' => 'admin@marcgo.com',
        'name' => 'Admin',
        'password' => Hash::make($password)
    ];
    $userRepository->create($data);
    $this->comment('Usuario creado!');
});
