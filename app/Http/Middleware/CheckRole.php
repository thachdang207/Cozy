<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $roleIds = ['admin' => 1, 'staff' => 2];
        $allowedRoleIds = [];
        foreach ($roles as $role) {
            if (isset($roleIds[$role])) {
                $allowedRoleIds[] = $roleIds[$role];
            }
        }
        $allowedRoleIds = array_unique($allowedRoleIds);

        if (Auth::check()) {
            if (in_array(Auth::user()->role_id, $allowedRoleIds)) {
                return $next($request);
            }
        }

        return redirect('/');
    }
}
