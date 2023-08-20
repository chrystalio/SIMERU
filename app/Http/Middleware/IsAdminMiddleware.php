<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role()->first()->name === 'System Administrator') {
            return $next($request);
        }

        abort(403, 'Unauthorized'); // Redirect or show an error for unauthorized access
    }
}
