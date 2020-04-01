<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException; 

use App\Models\PendingReorder;
use App\Models\Order\MasterOrder;

class Sales
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
        if(!$user->admin && !$user->sales_admin) {
            throw new AuthorizationException('You are not permitted to view this page.'); 
        }
        $reorders_pending = PendingReorder::where('sales_admin_id', null)->get();
        $masterorders_pending = MasterOrder::where('delivery_date', null)->get();
        view()->share(['reorders_pending'=> $reorders_pending, 'masterorders_pending' => $masterorders_pending]);
        return $next($request);
    }
}
