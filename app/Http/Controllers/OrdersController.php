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
use App\Traits\GetOrders;

use Illuminate\Support\Collection;

class OrdersController extends Controller 
{

    use GetOrders;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
        $logodesign_orders = LogodesignOrder::all();
        $branding_orders = BrandingOrder::all();
        $socialmedia_orders = SocialMediaOrder::all();
        $packaging_orders = PackagingOrder::all();
        $promotional_orders = PromotionalOrder::all();

        $all_orders_array = array(
            'logodesign' => $logodesign_orders, 
            'branding' => $branding_orders,
            'social_media' => $socialmedia_orders,
            'packaging' => $packaging_orders,
            'promotional' => $promotional_orders
        );
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

        return $this->getUserOrdersSortedByDate($id);
    }

    public function getUserOrders($id) {
        return $this->getUserOrders($id);
    }

    public function getAllOrders() {
        return $this->getAllOrders();
        
    }

    public function getAllOrdersSortedByDate() {
        return $this->getAllOrdersSortedByDate();
    }
}
