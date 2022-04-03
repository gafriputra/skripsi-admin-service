<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // jika dia login dan rolesnya admin
        if (Auth::user() && Auth::user()->roles == 'ADMIN') {
            // lanjutkan request
            return $next($request);
        }
        // buang ke halaman adwal
        return redirect('/');
    }
}
