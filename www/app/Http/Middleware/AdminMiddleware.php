<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
  public function handle($request, Closure $next)
{
    if (!auth()->check()) {
        return redirect('/login');
    }

    // Sprawdź typ wartości
    if ((int) auth()->user()->is_admin !== 1) {
        abort(403);
    }

    return $next($request);
}
}
