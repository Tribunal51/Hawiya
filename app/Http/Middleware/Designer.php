<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class Designer
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
        if(!$user->admin && !$user->designer) {
            throw new AuthorizationException('You do not have permission to access this page.');
        }
        return $next($request);
    }
}
