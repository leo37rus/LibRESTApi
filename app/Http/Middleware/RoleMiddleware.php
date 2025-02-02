<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $token = $request->bearerToken();

        $user = User::query()->where('remember_token', $token)->first();
        if (!$token || !$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        Auth::login($user);

        if (!Auth::check() || Auth::user()->role !== $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
