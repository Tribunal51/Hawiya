<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LogodesignOrder;
use App\BrandingOrder;
use App\SocialMediaOrder;
use App\StationeryOrder;
use App\PackagingOrder;
use App\PromotionalOrder;

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

    public function getUserOrdersSortedByDate($id) {
        $logodesign_orders = LogodesignOrder::where('user_id','=', $id)->get();
        $all_orders = array();
        
        foreach($logodesign_orders as $order) {
            $order->type="logodesign";
            array_push($all_orders, $order);
        }
        
        $branding_orders = BrandingOrder::where('user_id', '=', $id)->get();
        foreach($branding_orders as $order) {
            $order->type="branding";
            array_push($all_orders, $order);
        }
        

        $socialmedia_orders = SocialMediaOrder::where('user_id', '=', $id)->get();
        foreach($socialmedia_orders as $order) {
            $order->type="socialmedia";
            array_push($all_orders, $order);
        }

        $promotional_orders = PromotionalOrder::where('user_id', '=', $id)->get();
        foreach($promotional_orders as $order) {
            $order->type="promotional";
            array_push($all_orders, $order);
        }

        $stationery_orders = StationeryOrder::where('user_id', '=', $id)->get();
        foreach($stationery_orders as $order) {
            $order->type="stationery";
            array_push($all_orders, $order);
        }

        $packaging_orders = PackagingOrder::where('user_id', '=', $id)->get();
        foreach($packaging_orders as $order) {
            $order->type="packaging";
            array_push($all_orders, $order);
        }

        // return $all_orders;
        $sorted = collect($all_orders)->sortBy('created_at')->values();
        return $sorted;
    }

    public function getUserOrders(Request $request) {
        $logodesign_orders = LogodesignOrder::where('user_id','=', $request->user_id)->get();
        $branding_orders = BrandingOrder::where('user_id', '=', $request->user_id)->get();
        $socialmedia_orders = SocialMediaOrder::where('user_id', '=', $request->user_id)->get();
        $promotional_orders = PromotionalOrder::where('user_id', '=', $request->user_id)->get();
        $stationery_orders = StationeryOrder::where('user_id', '=', $request->user_id)->get();
        $packaging_orders = PackagingOrder::where('user_id', '=', $request->user_id)->get();
        $all_orders_array = array(
            'logodesign' => $logodesign_orders,
            'branding' => $branding_orders,
            'social_media' => $socialmedia_orders,
            'promotional' => $promotional_orders,
            'stationery' => $stationery_orders,
            'packaging' => $packaging_orders
        );
        $all_orders = json_encode($all_orders_array);
        return $all_orders;
    }

    public function getAllOrders() {
        $logodesign_orders = LogodesignOrder::all();    // Array of objects, each object is an order
        foreach($logodesign_orders as $order) {
            $order->order_type="logodesign";
        }
        

        $all_orders_array = $logodesign_orders->merge($users);
        // return $all_orders_array;

        $ordered = $all_orders_array->sortBy('created_at')->values();
        return $ordered;
        
    }
}
