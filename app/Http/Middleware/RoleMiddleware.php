<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();

        $roleIds = [
            'user' => 1,
            'seller' => 2,
            'admin' => 3,
        ];

        if (!$user || !$user->roles()->where('role_id', $roleIds[$role])->exists()) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
