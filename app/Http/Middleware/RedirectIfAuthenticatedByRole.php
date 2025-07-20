<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedByRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $role = auth()->user()->role;

            return redirect(match ($role) {
                'admin' => '/admin/dashboard',
                'petugas' => '/petugas/dashboard',
                'verifikator' => '/verifikator/dashboard',
                default => '/dashboard',
            });
        }

        return $next($request);
    }
}
