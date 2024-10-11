<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
{
    $user = Auth::user();
    if (!$user || !$user->hasRole('admin')) {
        return redirect('/login')->withErrors('У вас нет доступа к этой странице.');
    }

    return $next($request);
}
}
