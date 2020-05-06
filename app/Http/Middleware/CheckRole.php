<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;

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
        $userRole = Role::where('id', $request->user()->privilege)->get()[0]->name;
        foreach ($roles as $role) {
            if ($userRole == $role) {
                return $next($request);
            }
        }
        return redirect(route('home'));
    }
}
