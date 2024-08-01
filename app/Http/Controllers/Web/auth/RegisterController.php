<?php

namespace App\Http\Controllers\Web\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RegisterRepositoryInterface;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{
    protected $registerRepository;

    public function __construct(RegisterRepositoryInterface $registerRepository)
    {
        $this->registerRepository = $registerRepository;
    }

    public function store(Request $request)
    {
        $user = $this->registerRepository->register($request->all());
        
        $user->sendEmailVerificationNotification();

        Mail::to($user->email)->send(new UserRegistered($user));
        
        return redirect()->route('admin.users.list')->with('success', 'User registered successfully.');
    }
}
