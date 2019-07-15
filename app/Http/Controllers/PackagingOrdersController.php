<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PackagingOrder;
use App\PackagingProduct;

use App\User;

class PackagingOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = PackagingOrder::with('products')->get();
        // return $orders;

        $orders = PackagingOrder::get(['id','user_id']);
        
        foreach($orders as $order) {
            $products = PackagingProduct::where('order_id', $order->id)->get(['name','amount','size','color']);
            $order->products = $products;
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
        if(!isset($request->user_id) || !isset($request->products)) {
            return -2;  // echo "Required fields missing.";
        }
        if(!User::find($request->user_id)) {
            return -3;  // echo "User does not exist.";
        }
        if(!is_array($request->products)) {
            return -4;  // echo "Products field not an array.";
        }

        $order = PackagingOrder::create([
            'user_id' => $request->user_id
        ]);

        $products = $request->products;
        foreach($products as $product) {
            if(!isset($product['name']) || !isset($product['size']) || !isset($product['amount']) || !isset($product['color'])) {
                return -5;  // echo "Required fields missing for Product";
            }           
            $new_product = new PackagingProduct;
            $new_product->order_id = $order->id;
            $new_product->name = $product['name'];
            $new_product->size = $product['size'];
            $new_product->amount = $product['amount'];
            $new_product->color = $product['color'];
            if(!$new_product->save()) {
                return -6;  // echo "Could not save a product";
            }
        }
        if($order) {
            return $order->id;  // echo "Order Registered successfully";
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
