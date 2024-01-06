<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckStatusMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->status == 0){
            Auth::logout();
            return redirect('/login')->with('error-info', 'Your Account is not activated yet.');
        }
        return $next($request);
    }
}
