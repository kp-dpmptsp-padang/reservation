<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserRoleEnum;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check() || (Auth::user()->role !== UserRoleEnum::from($role) && Auth::user()->role !== UserRoleEnum::SUPER_ADMIN)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}