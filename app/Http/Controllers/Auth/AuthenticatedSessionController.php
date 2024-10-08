<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (Auth::user()->role == 'admin') {
            return redirect()->intended('/dashboard-admin');
        }
        if (Auth::user()->role == 'kepalabagian') {
            return redirect()->intended('/dashboard/kepalabagian');
        }
        if (Auth::user()->role == 'pembeli' || Auth::user()->role == 'ksm') {
            return redirect()->intended('/');
        }
        // return redirect()->intended(RouteServiceProvider::HOME);
        // return redirect()->intended(RouteServiceProvider::HOME);
        return redirect()->back();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Auth::guard('web')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // // return redirect('/');
        // return redirect()->back();

    $user = Auth::guard('web')->user();

    if ($user->hasRole() == 'admin') {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    } else {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back();
    }
    }
}
