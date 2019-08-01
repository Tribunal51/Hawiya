<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BrandingOrder;
use App\User;

use App\Helpers\AppHelper as Helper;

class BrandingOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branding_orders = BrandingOrder::all();
        foreach($branding_orders as $order) {
            $filename = $order->logo_photo;
            $order->logo_photo = "http://hawiya.net/storage/uploads/".$filename;
        }
        return $branding_orders;
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
        $order = new BrandingOrder;
        $order->user_id = $request->user_id;
        $order->package = $request->package;
        $order->comment = $request->comment;
        $order->logo_photo = $request->logo_photo;
       //return $request;
        
        if(!isset($order->user_id) || !isset($order->package) || !isset($order->comment) || !isset($request->logo_photo)) {
            return -2;  //echo "Required fields missing";
        }
        else {
            if(!User::find($order->user_id)) {
                return -3;  // echo "User not found.";
            }
            

            if(Helper::check_file($request->logo_photo)) {
                $filename = Helper::save_file($request->logo_photo);
                $order->logo_photo = $filename;
            }
            else {
                return -4;  // echo "Wrong File format"
            }

            if($order->save()) {
                return $order->id;  // echo "Order Registered Successfully.";
            }
            else {
                return -1;  // echo "Order could not be registered. Please investigate.";
            }
            
            // if($request->hasFile('logo_photo')) {
            //     $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx'];
            //     $file = $request->file('logo_photo');
            //     return $file;
            //     $filename = $file->getClientOriginalName();
            //     $extension = $file->getClientOriginalExtension();
            //     $check = in_array($extension, $allowedFileExtension);
            //     if($check) {
            //         $filename = ltrim($file->store('public/uploads'));
            //         $order->logo_photo = $filename;
            //         if($order->save()) {
            //             return $order->id;  // echo "Order registered";
            //         }
            //         else {
            //             return -1;  // echo "Order could not be registered. Please investigate.";
            //         }
            //     }
            //     else {
            //         return -5;  // echo "Wrong file format";
            //     }
            // }
            // else {
            //     return -4; // echo "File not found"
            // }
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


