<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->status === 'suspended') {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'Your account has been suspended. Please contact support.'
                ]);
            }

            if ($user->status === 'inactive') {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'email' => 'Your account is inactive. Please contact support.'
                ]);
            }
        }

        return $next($request);
    }
}
