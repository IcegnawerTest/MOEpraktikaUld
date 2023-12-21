<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class role_user
{
    public function handle($request, Closure $next, $role)
    {
        if (!$request->user() || $request->user()->role !== $role) {
            return redirect('/');
        }
    
        return $next($request);
    }
}
