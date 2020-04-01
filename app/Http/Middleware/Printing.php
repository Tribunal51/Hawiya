<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

class Printing
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
        $user = Auth::guard()->user();
        if(!$user) {
            return redirect('/login');
        }
        if(!$user->admin && !$user->printing_admin) {
            throw new AuthorizationException('You are not permitted to view this page.');
        }
        return $next($request);
    }
}
