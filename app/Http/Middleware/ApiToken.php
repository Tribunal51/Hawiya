<?php

namespace App\Http\Middleware;

use Closure;

class ApiToken
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
        // return response()->json('Hello');
        // return response()->json($request->api_token);
        $key = \Config::get('values.api_key');
        // return response()->json($key);
        // return response()->json(env('API_KEY'));

        $header = $request->header('Authorization');

        if($header !== $key) {
            return response()->json('Unauthorized', 401);
        }

       
        return $next($request);
    }
}
