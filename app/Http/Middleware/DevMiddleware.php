<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DevMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        // Pastikan user login dan punya role admin
        if (!$user || !$user->roles->contains('name', 'admin')) {
            abort(403, 'Unauthorized. Only developers/admins can access this.');
        }

        return $next($request);
    }
}
