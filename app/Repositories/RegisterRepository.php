<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;

class RegisterRepository implements RegisterRepositoryInterface
{
    public function register(array $data)
    {
        $this->validate($data);

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->roles()->attach(3);

        Mail::to($user->email)->send(new UserRegistered($user));

        return $user;
    }

    protected function validate(array $data)
    {
        Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();
    }
}
