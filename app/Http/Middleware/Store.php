<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

use App\Models\Store\StoreOrder;

class Store
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
        if(!$user->admin && !$user->store_admin) {
            throw new AuthorizationException('You are not permitted to view this page.');
        }
        $orders = StoreOrder::where('store_admin_id', $user->id)->get();
        $pending_orders = array();
        $assigned_orders = array();
        foreach($orders as $order) {
            if(!$order->delivery_date) {
                array_push($pending_orders, $order);
            }
            else {
                array_push($assigned_orders, $order);
            }
        }
        view()->share(['pending_orders' => $pending_orders, 'assigned_orders' => $assigned_orders]);
        return $next($request);
    }

    

    

   
}
