<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Commercial\CommercialOrder;
use App\User;
use App\Models\Commercial\CommercialItem;
use App\Helpers\AppHelper as Helper;

class CommercialOrdersController extends Controller
{
    //

    public function index() {
        $orders = CommercialOrder::all();
        return $orders;
    }

    public function show($id) {
        $order = CommercialOrder::find($id);
        if(!$order) {
            return -3;  // echo "Order not found.";
        }

        
    }


    public function store(Request $request) {
        if(
            !isset($request->item_id) || 
            !isset($request->user_id) || 
            !isset($request->shape) || 
            !isset($request->orientation) || 
            !isset($request->size) || 
            !isset($request->paper_thickness) || 
            !isset($request->finishing) || 
            (!isset($request->backside) || !is_bool($request->backside)) || 
            !isset($request->frontside_file))
                return -2;  // echo "Required fields missing.";

        if(!User::find($request->user_id)) {
            return -3;  // echo "User not found.";
        }
        $item = CommercialItem::find($request->item_id);
        if(!$item) {
            return -4;  // echo "Item not found.";
        }
        $allowed_extensions = ['pdf', 'ai', 'epd', 'docx', 'png', 'jpg', 'jpeg', 'svg'];
        if(
            !Helper::check_file($request->frontside_file, $allowed_extensions) || 
            ($request->backside && isset($request->backside_file) && !Helper::check_file($request->backside_file))) {
            return -5;  // echo "Wrong file format.";
        }
        
        $order = new CommercialOrder;
        $order->user_id = $request->user_id;
        $order->commercial_item_id = $item->id;
        $order->item_name = isset($request->item_name) ? $request->item_name : $item->name;
        $order->shape = $request->shape;
        $order->orientation = $request->orientation;
        $order->size = $request->size;
        $order->paper_thickness = $request->paper_thickness;
        $order->finishing = $request->finishing;
        $order->backside = $request->backside;
        $order->frontside_file = Helper::save_file($request->frontside_file);
        $order->backside_file = $request->backside ? Helper::save_file($request->backside_file) : null;
        if(!$order->save()) {
            return -1;  // echo "Some error occured. The order could not be registered.";
        }
        else {
            return $order->id;
        }



    }
}
