<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!in_array(Auth::user()->hasRole(), $roles)) {
            if (Auth::user()->hasRole() == 'admin') {
                return redirect()->intended('/dashboard-admin');
            }
            if (Auth::user()->hasRole() == 'kepalabagian') {
                return redirect()->intended('/dashboard/kepalabagian');
            }
            if (Auth::user()->hasRole() == 'pembeli' || Auth::user()->hasRole() == 'ksm') {
                return redirect()->intended('/');
            }
            else {
                return redirect()->route(Auth::user()->hasRole().'.index');
            }
        }

        return $next($request);
    }
}
