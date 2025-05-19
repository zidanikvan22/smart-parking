<?php

// app/Http/Middleware/CheckOnboarding.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOnboarding
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Jika user belum menyelesaikan onboarding dan tidak sedang di route onboarding
        if ($user && !$user->onboarding_completed && !$request->is('onboarding*')) {
            return redirect()->route('onboarding.show');
        }

        return $next($request);
    }
}
