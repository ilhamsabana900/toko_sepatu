<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Cek apakah pengguna sudah login dan apakah dia admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request); // Lanjutkan jika admin
        }

        // Jika bukan admin, redirect ke halaman home atau dashboard user
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
