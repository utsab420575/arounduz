<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        // Check user status before authentication
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->status === 'suspended') {
                throw ValidationException::withMessages([
                    'email' => 'Your account has been suspended. Please contact support.',
                ]);
            }

            if ($user->status === 'inactive') {
                throw ValidationException::withMessages([
                    'email' => 'Your account is inactive. Please contact support.',
                ]);
            }
        }

        $request->authenticate();

        $request->session()->regenerate();

        // Redirect to dashboard (profile completion will be handled there)
        return redirect()->intended(route('dashboard', absolute: false));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
