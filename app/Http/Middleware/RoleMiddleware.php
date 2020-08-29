<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->isAdmin() == 2) {
            if($role = $request->route()->getName() == "admin") {

                // dd($role);
                return $next($request);
            }
        }
        return response('error, link hanya bisa diakses oleh admin!');
    }
}
