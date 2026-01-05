<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileCompleted
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && !Auth::user()->hasCompletedProfile()) {
            return redirect()->route('profile.complete');
        }

        return $next($request);
    }
}
