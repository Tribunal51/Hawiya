<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogoDesignOrder;
use App\User;
use App\Http\Resources\LogoDesignOrderPOST;
use Illuminate\Support\Facades\Input;

class LogoDesignOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo_design_orders = LogoDesignOrder::get(['id', 'user_id', 'package', 'style', 'color', 'logotype', 'brand_name', 'tagline', 'business_field','subject', 'description', 'font', 'branding']);
        
        foreach($logo_design_orders as $order) {
            $order->color = explode(',', $order->color); // In case the string needs to be split into an array of strings
        }
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
        if(!isset($request->user_id) 
        || !isset($request->package) 
        || !isset($request->logotype) 
        || !isset($request->color) 
        || !isset($request->brand_name) 
        || !isset($request->business_field) 
        || !isset($request->description)
        || !isset($request->font) 
        || !isset($request->branding)
        || !isset($request->subject)) {
            return -2; //echo "Required fields missing"
        }

        if(!User::find($request->user_id)) {
            return -3;  // echo 'User not found.';
        }
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

        $new_order->color = isset($request->color) ? implode(",",$request->color) : null;
        $new_order->logotype = isset($request->logotype) ? implode(",", $request->logotype) : null;

        $new_order->brand_name = $request->brand_name;
        $new_order->tagline = $request->tagline;
        $new_order->business_field = $request->business_field;
        $new_order->description = $request->description;
        $new_order->font = $request->font;
        $new_order->branding = $request->branding;
        $new_order->subject = $request->subject;

        if($new_order -> save()) {
            return $new_order->id;
            //return $new_order->id; //echo order_number 
            //return $new_order_response; //echo {user_id, order_number}
        }
        else {
            return -1; //echo "Error occured";
        }

        
        
        // if($new_order -> save()) {
        //     return $new_order->id;
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
        $order = LogoDesignOrder::find($id);
        if(!$order) {
            return -2;  // echo "Order not found.";
        }
        return $order;
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
    public function update(Request $request)
    {
        if(!isset($request->id)) {
            return -2; // echo "Required fields missing";
        }
        if(isset($request->user_id) && !User::find($request->user_id)) {
            return -3; // echo "User does not exist";
        }
        if(LogoDesignOrder::find($request->id)) {

            $order = LogoDesignOrder::find($request->id);
            $order->user_id = $request->user_id ? $request->user_id : $order->user_id;
            $order->package = $request->package ? $request->package : $order->package;
            $order->style = $request->style? $request->style : $order->style;
            $order->color = $request->color ? implode(",", $request->color) : $order->color;
            $order->logotype = $request->logotype ? implode(",", $request->logotype) : $order->logotype;
            $order->brand_name = $request->brand_name ? $request->brand_name : $order->brand_name;
            $order->tagline = $request->tagline ? $request->tagline : $order->tagline;
            $order->business_field = $request->business_field ? $request->business_field : $order->business_field;
            $order->description = $request->description ? $request->description : $order->description;          
            
            if($order->save()) {
                return $order->id; // echo "Order updated";
            }
            else {
                return -1; // echo "Order could not be updated";
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(!isset($request->id)) {
            return -2; // echo "Required fields missing";
        }

        if(LogoDesignOrder::find($request->id)) {
            $order_to_delete = LogoDesignOrder::find($request->id);
            if($order_to_delete -> delete()) {
                return 1; //echo "Order deleted"
            }
            else {
                return -1; // echo "Order could not be deleted. Please investigate.
            }
        }
        else {
            return -3; // echo "Order not found."
        }
    }
}
