<?php

namespace App\Http\Controllers\Web\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    public function showLoginForm(){
        return view('login');
    }

    function postLogin(LoginRequest $request, )
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Log::info('User logged in: ' . $user->id);

            if ($user->roles()->where('role_name', 'admin')->exists()) {
                return redirect()->route('admin.home')->with('success', 'Logged in as admin successfully.');
            } else {
                if ($user->roles()->where('role_name', 'customer')->exists()) {
                    return redirect()->route('products')->with('success', 'Logged in as customer successfully.');
                }
            }
        }

        return redirect()->route('login')->with('error', 'Email or password is incorrect.');
    }

    public function getLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('');
    }
}
