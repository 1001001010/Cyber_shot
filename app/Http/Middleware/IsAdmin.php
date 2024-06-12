<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user() and  Auth::user()->is_admin == true) {
            return $next($request);
        }

        return redirect()->back();
    }
}
