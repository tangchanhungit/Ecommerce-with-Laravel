<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = $request->user();

        if ($user->status == 0) {
            Auth::logout();
            return redirect()->route('password.form')->withErrors(['status' => 'Your account is inactive. Please contact support.']);
        }

        if ($user->hasRole($role)) {
            return $next($request);
        }

        return redirect()->route('home')->withErrors(['error' => 'Unauthorized access']);
    }

    
}
