<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\StationeryOrder;

class StationeryOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = StationeryOrder::all();
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
        $order = new StationeryOrder;
        if(!isset($request->user_id) || !isset($request->comment) || !isset($request->logo_photo)) {
            return -2;  // echo "Required fields missing";
        }
        else {
            $order->user_id = $request->user_id;
            $order->comment = $request->comment;
            $order->logo_photo = $request->logo_photo;
            if(!User::find($request->user_id)) {
                return -3;  // echo "User not found";
            }
            if($order->hasFile('logo_photo')) {
                $allowedFileExtension = ['pdf', 'jpg', 'png', 'docx'];
                $file = $order->file('logo_photo');
                
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedFileExtension);
                if($check) {
                    $filename = ltrim($file->store('public/uploads'));
                    $order->logo_photo = $filename;  
                }
                else {
                    return -5;  // echo "File format not supported";
                }
            }
            else {
                return -4;  // echo "Image not found.";
            }
            if($order->save()) {
                return $order->id;  // echo "Order registered successfully";
            }
            else {
                return -1;  // echo "Order could not be registered. Please investigate.";
            }
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
