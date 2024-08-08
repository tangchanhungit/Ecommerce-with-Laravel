<?php

namespace App\Repositories;


use App\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;


class UserRepository implements UserRepositoryInterface
{
    public function getUsers(Request $request)
    {
        $search = $request->input('search');
        $roleId = $request->input('role');
        $status = $request->input('status');

        $query = User::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($roleId) {
            $query->whereHas('roles', function($q) use ($roleId) {
                $q->where('roles.id', $roleId);
            });
        }

        if ($status !== null) {
            $query->where('status', $status);
        }

        return $query->paginate(10);
    }

    public function getUserRegistrationsCount()
    {
        return User::whereDate('created_at', now()->toDateString())->count();
    }

    public function createUserSeller(array $data)
    {
        $password = Str::random(10);

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($password),
            'status' => '0',
        ]);

        $user->roles()->attach(2);

        return $user;
    }

    public function createUser(array $data)
    {

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 1,
        ]);

        $user->roles()->attach(3);

        return $user;
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    public function getUserById($id)
    {
        return User::with('roles')->findOrFail($id);
    }

    public function updateUser($id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->delete();
    }
    public function findByEmail($email)
    {
        return User::where('email',$email)->first();
    }
}
