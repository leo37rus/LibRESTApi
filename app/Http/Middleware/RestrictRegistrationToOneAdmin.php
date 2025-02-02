<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictRegistrationToOneAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = DB::table('users')->select('role')->where('id',1)->first();
        if ($user && (int)$user->role === 1){
            // редиректим на главную страницу, если у нас уже есть пользователь с такой ролью
            return redirect("/");
        }
        return $next($request);
    }
}
