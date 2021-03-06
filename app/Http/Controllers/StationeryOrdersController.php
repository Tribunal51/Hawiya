<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\StationeryOrder;
use App\User;
use App\Category;

use App\Helpers\AppHelper as Helper;

class StationeryOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = StationeryOrder::get(['id', 'user_id', 'items', 'comment', 'created_at']);
        foreach($orders as $order) {
            $order->products = explode(',', $order->products);
            $order->order_id = "STAT".$order->id;
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

        if(!isset($request->user_id) || !isset($request->items)) {
            return -2;  // echo "Required fields missing";
        }
        if(!User::find($request->user_id)) {
            return -3;  // echo "User not found.";
        }
        if(!is_array($request->items)) {
            return -4;  // echo "Items is not an array.";
        }
        else if(sizeof($request->items) < 1) {
            return -5;  // echo "Items cannot be an empty array.";
        }
        foreach($request->items as $item) {
            if(!is_string($item)) {
                return -6;  // echo "Item is not a string.";
            }
        }
        $order = new StationeryOrder;
        $order->user_id = $request->user_id;
        $order->products = implode($request->items, ',');

        $category = Category::where('name', '=', 'Stationery')->first();
        $order->category_id = $category->id;
        $order->order_token = $category->token_prefix.$order->getNextId();


        if(isset($request->comment)) {
            $order->comment = $request->comment;
        }
        if($order->save()) {
            return $order->id;  // echo "Order registered successfully.";
        }
        else {
            return -1;  // echo "Error occured. Order could not be registered.";
        }
        
        


        // $order->user_id = $request->user_id;
        // $order->comment = $request->comment;
        // $order->logo_photo = $request->logo_photo;
        // if(!User::find($request->user_id)) {
        //     return -3;  // echo "User not found";
        // }
        // if($order->hasFile('logo_photo')) {
        //     $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx'];
        //     $file = $order->file('logo_photo');
            
        //     $extension = $file->getClientOriginalExtension();
        //     $check = in_array($extension, $allowedFileExtension);
        //     if($check) {
        //         $filename = ltrim($file->store('public/uploads'));
        //         $order->logo_photo = $filename;  
        //     }
        //     else {
        //         return -5;  // echo "File format not supported";
        //     }
        // }
        // else {
        //     return -4;  // echo "Image not found.";
        // }
        // if($order->save()) {
        //     return $order->id;  // echo "Order registered successfully";
        // }
        // else {
        //     return -1;  // echo "Order could not be registered. Please investigate.";
        // }
        
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
