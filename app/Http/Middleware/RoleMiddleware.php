<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  $role_names
     * @return mixed
     */
    public function handle($request, Closure $next, $role_names)
    {
        if (!User::hasRoles($role_names))
        {
            return abort(404);
            //return redirect()->to('/login')->with('error', 'Access Denied');
        }
        return $next($request);
    }
}
