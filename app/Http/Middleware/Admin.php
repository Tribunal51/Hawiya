<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Access\AuthorizationException;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(!$user->admin) {
            throw new AuthorizationException('You do not have permission to view this page.');
        }
        
        return $next($request);
    }
}
