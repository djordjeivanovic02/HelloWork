<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::where('email', $request->email)->first();
        if (
            !$user ||
            ($user->email_verified_at == null)
        ) {
            return response()->json(['type' => 'not-verified', 'message' => 'Vaša email adresa nije verifikovana.'], 201);
        }

        return $next($request);
    }
}
