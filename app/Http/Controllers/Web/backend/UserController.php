<?php

namespace App\Http\Controllers\Web\backend;

use App\Http\Controllers\Controller;
use App\Repositories\RoleRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;


class UserController extends Controller
{
    protected $userRepository, $roleRepository;
    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index(Request $request){
        $users = $this->userRepository->getUsers($request);
        $roles = $this->roleRepository->getAllRoles();


        return view("backend.users.list", compact('users', 'roles'));
    }
    public function showCreateForm(){
        return view("backend.users.add");
    }

    public function create(Request $request)
    {
        $this->userRepository->validator($request->all())->validate();
        $this->userRepository->createUserSeller($request->all());

        return redirect()->route('admin.users.list')->with('success', 'Create new employee success.Email sent successfully.');
    }

    public function show($id)
    {
        $user = $this->userRepository->getUserById($id);
        return view('backend.users.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->userRepository->updateUser($id, $request->all());

        return redirect()->route('admin.users.list')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $this->userRepository->deleteUser($id);

        return redirect()->route('admin.users.list')->with('success', 'User deleted successfully.');
    }

}
