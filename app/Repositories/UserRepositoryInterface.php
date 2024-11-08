<?php

namespace App\Repositories;

use Illuminate\Http\Request;
interface UserRepositoryInterface
{
    public function getUsers(Request $request);
    public function getUserRegistrationsCount();
    public function findByEmail($email);
    public function createUserSeller(array $data);
    public function createUser(array $data);
    public function validator(array $data);
    public function getUserById($id);
    public function updateUser($id, array $data);
    public function deleteUser($id);
}