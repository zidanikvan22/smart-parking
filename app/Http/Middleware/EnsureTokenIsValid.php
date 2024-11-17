<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        if (!auth()->check()) {
            return redirect('login');
        }

        // Asumsikan role disimpan di kolom 'role' pada model User
        if (auth()->user()->role !== $roles) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
