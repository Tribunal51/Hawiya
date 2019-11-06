<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\PromotionalOrder;
use App\Category;

class PromotionalOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = PromotionalOrder::get(['id', 'items']);
        foreach($orders as $order) {
            $order->products = explode(",", $order->products);
            //$order->items = $items;
        }
        return $orders;
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
        if(!isset($request->user_id) || !isset($request->items)) {
            return -2;  // echo "Required fields missing";
        }
        if(!User::find($request->user_id)) {
            return -3;  // echo "User does not exist.";
        }
        if(!is_array($request->items)) {
            return -4;  // echo "Items is not an Array.";
        }
        if(sizeof($request->items) <= 0) {
            return -5;  // echo "Empty Array of Items.";
        }

        $order = new PromotionalOrder;
        $order->user_id = $request->user_id;
        $order->products = implode(",", $request->items);
        $order->category_id = Category::where('name', '=', 'Promotional')->first()->id;
        if($order->save()) {
            return $order->id;  // echo "Order registered successfully.";
        }
        else {
            return -1;  // echo "Order could not be registered. Please investigate.";
        }

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
}
