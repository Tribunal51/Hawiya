<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogoDesignOrder;
use App\Http\Resources\LogoDesignOrderPOST;

class LogoDesignOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo_design_orders = LogoDesignOrder::all();
        return $logo_design_orders;
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
        $new_order = new LogoDesignOrder;
        $new_order->user_id = $request->user_id;    //If user not present, then null
        $new_order->package = $request->package;
        // $new_order->logotype = $request->logotype;

        $new_order->style = $request->style;
        // $new_order->style_modern_classic = $request->style['modern_classic'];
        // $new_order->style_mature_youthful = $request->style['mature_youthful'];
        // $new_order->style_feminine_masculine = $request->style['feminine_masculine'];
        // $new_order->style_playful_sophisticated = $request->style['playful_sophisticated'];
        // $new_order->style_economical_luxury = $request->style['economical_luxury'];
        // $new_order->style_geometric_organic = $request->style['geometric_organic'];
        // $new_order->style_abstract_literal = $request->style['abstract_literal'];

        $new_order->color = implode(",",$request->color);
        $new_order->logotype = implode(",", $request->logotype);

        $new_order->brand_name = $request->brand_name;
        $new_order->tagline = $request->tagline;
        $new_order->business_field = $request->business_field;
        $new_order->description = $request->description;

        if(!isset($new_order->user_id) || !isset($new_order->package) || !isset($new_order->logotype) || !isset($new_order->brand_name) || !isset($new_order->business_field) || !isset($new_order->description)) {
            return -2; //echo "Required fields missing"
        } else if(!User::find($new_order->user_id)) {
            return -3; //echo "User does not exist"
        } else if($new_order -> save()) {
            $new_order_response = new LogoDesignOrderPOST($new_order);
            return $new_order_response; //echo {user_id, order_number}
        }
        else {
            return -1; //echo "Error occured";
        }

        

        // if($new_order -> save()) {
        //     $new_order_response = new LogoDesignOrderPOST($new_order);
        //     return $new_order_response;
        // } 
        // else {
        //     return "FAILED";
        // }

        // return $new_order;
        
        
       
        
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
