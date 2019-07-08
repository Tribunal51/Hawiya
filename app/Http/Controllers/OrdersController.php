<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogodesignOrder;
use App\BrandingOrder;

use App\User;

use Illuminate\Support\Collection;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $logodesign_orders = LogodesignOrder::all();
        //$branding_orders = BrandingOrder::all();
        $all_orders_array = array('logodesign' => $logodesign_orders, 'branding' => $branding_orders);
        $all_orders = json_encode($all_orders_array);
        return $all_orders;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getUserOrder(Request $request) {
        $logodesign_orders = LogodesignOrder::where('user_id','=', $request->user_id)->get();
        $users = User::find($request->user_id);
        $all_orders_array = array('users' => $users, 'logodesign' => $logodesign_orders);
        $all_orders = json_encode($all_orders_array);
        return $all_orders;
    }

    public function getAllOrders() {
        $logodesign_orders = LogodesignOrder::all();    // Array of objects, each object is an order
        foreach($logodesign_orders as $order) {
            $order->order_type="logodesign";
        }
        
        $users = User::all();
        foreach($users as $user) {
            $user->order_type="user";
        }
        

        $all_orders_array = $logodesign_orders->merge($users);
        // return $all_orders_array;

        $ordered = $all_orders_array->sortBy('created_at')->values();
        return $ordered;
        
    }
}
