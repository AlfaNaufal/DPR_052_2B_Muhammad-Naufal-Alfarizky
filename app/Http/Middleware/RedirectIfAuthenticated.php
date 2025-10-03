<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            // Memeriksa apakah pengguna saat ini sudah login menggunakan guard yang sedang dicek.
            if (Auth::guard($guard)->check()) {

                // Jika sudah login, ambil data pengguna yang sedang aktif.
                $user = Auth::user();

                // Jika role nya adlaah Admin
                if ($user->role === 'Admin') {
                    // Maka akan diarahkan ke halaman dashboard admin
                    return redirect()->route('admin.dashboard');
                }
                
                // Jika role nya adalah Public
                if ($user->role === 'Public') {
                    // Maka akan diarahkan ke halaman dashboard public
                    return redirect()->route('public.dashboard');
                }
            }
        }

        return $next($request);
    }
}
