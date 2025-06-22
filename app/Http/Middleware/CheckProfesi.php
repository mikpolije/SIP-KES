<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProfesi
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$allowedProfesi): Response
    {
        $user = auth()->user();

        if (!$user || !in_array(strtolower($user->profesi), $allowedProfesi)) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }
}
