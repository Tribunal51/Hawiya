<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Models\User\RawOrder;
use App\Category;
// use App\Rules\UserExists;

use App\Traits\GetOrders;

class RawOrdersController extends Controller
{
    //
    use GetOrders; 

    public function getUserRawOrders(Request $request, $id) {
        $user = User::find($id);
        if(!$user) {
            return -3;  // echo "User not found.";
        }
        return $user->raw_orders;
    }

    public function createRawOrder(Request $request, $id) {
        $user = User::find($id);
        if(!$user) {
            return -3;  // echo "User not found.";
        }
        // return $request->order;
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'order' => 'required|array',
            'quantity' => 'nullable|numeric',
            'raw_order_id' => 'nullable|numeric'
        ], [
            'required' => -2,
            'numeric' => -4
        ]);
        
        if($validator->fails()) {
            return $validator->errors()->first();
        }
        // return gettype($request->order);
        if(!is_object(json_decode(json_encode($request->order)))) {
            return -5;  // echo "Order not an object.";
        }

        
        $category = Category::find($request->category_id);
        if(!$category) {
            return -6;  // echo "Invalid Category ID.";
        }

        $check = $this->checkOrder(new Request($request->order), $category->id);
        if($check < 0) {
            return $check + (-1)*(100);
        }

        if($request->raw_order_id) {
            $foreign_raw_order = RawOrder::find($request->raw_order_id);
            if(!$foreign_raw_order) {
                return -7;  // echo "Raw Order not found.";
            }
        }

        // $size1 = memory_get_usage();
        // $object = clone (object)$request->order;
        // $size2 = memory_get_usage();
        // return $size2 - $size1;
        // return strlen($request);
        
        // $raw_order = new RawOrder;
        // $raw_order->user_id = $user->id;
        // $raw_order->category_id = $category->id;
        // $raw_order->order = $request->order; 
        // $raw_order->quantity = $request->quantity;
        // $raw_order->raw_order_id = $request->raw_order_id ? $request->raw_order_id : null;
        $raw_order = RawOrder::create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'order' => $request->order, 
            'quantity' => $request->quantity,
            'raw_order_id' => $request->raw_order_id ? $request->raw_order_id : null
        ]);

        if(!$raw_order->save()) {
            return -1;  // echo "Could not create raw order.";
        }
        return $raw_order->id;
    }

    public function editRawOrder(Request $request, $id) {
        $raw_order = RawOrder::find($id);
        if(!$raw_order) {
            return -3;  // echo "Raw Order not found.";
        }
        $validator = Validator::make($request->all(), [
            'quantity' => 'nullable|numeric',
            'order' => 'nullable',
            'raw_order_id' => 'nullable|numeric'
        ], [
            'numeric' => -4
        ]);
        if($validator->fails()) {
            return $validator->errors()->first();
        }
        if($request->order) {
            if(!is_object(json_decode(json_encode($request->order)))) {
                return -5;  // echo "Order is not an object.";
            }
        }

        if($request->raw_order_id) {
            if(!RawOrder::find($request->raw_order_id)) {
                return -6;  // echo "Raw Order not found.";
            }
        }
        
        $raw_order->quantity = $request->quantity ? $request->quantity : $raw_order->quantity;
        $raw_order->order = $request->order ? $request->order : $raw_order->order;
        if(!$raw_order->save()) {
            return -1;  // echo "Could not modify raw order.";
        }
        return 1;
    }

    public function deleteRawOrder(Request $request, $id) {
        $raw_order = RawOrder::find($id);
        if(!$raw_order) {
            return -3;  // echo "Raw Order not found.";
        }
        if(!$raw_order->delete()) {
            return -1;  // echo "Raw Order could not be deleted.";
        }
        return 1;
    }

    public function deleteUserRawOrders(Request $request, $id) {
        $user = User::find($id);
        if(!$user) {
            return -3;  // echo "User not found.";
        }   
        $raw_orders = $user->raw_orders;
        if(sizeof($raw_orders) < 1) {
            return -4;  // echo "User does not have Raw Orders";
        }
        foreach($raw_orders as $raw_order) {
            if(!$raw_order->delete()) {
                return -1;  // echo "Could not delete raw order.";
            }
        }
        return 1;
    }

   

    
}
