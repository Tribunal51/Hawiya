<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PendingReorder;
use App\Models\User\Address;

use App\Helpers\AppHelper as Helper;

use Validator;

use App\User;
use App\Traits\GetOrders;
use App\Traits\CreateOrder;

use Illuminate\Support\Collection;

class ReordersController extends Controller
{
    //
    use GetOrders;
    use CreateOrder;

    public function getUserReorders(Request $request, $id) {
        $user = User::find($id);
        if(!$user) {
            return -3;  // echo "User not found.";
        }
        $reorders = PendingReorder::all();
        // return $reorders;
        $user_reorders = array();
        foreach($reorders as $reorder) {
            $order = $this->getOrderByToken($reorder->order_token);

            if($order->user_id == $id) {
                array_push($user_reorders, $reorder);
            }
        }
        return $user_reorders;
    }

    public function getReorder(Request $request, $id) {
        $reorder = PendingReorder::find($id);
        if(!$reorder) {
            return -3;  // echo "Reorder not found.";
        }
        return $reorder;
    }

    public function createReorder(Request $request) {
        if(!isset($request->order_token)) {
            return -2;  // echo "Required fields missing.";
        }
        $order = $this->getOrderByToken($request->order_token);
        if(!$order) {
            return -3;  // echo "Order not found.";
        }
        
        // Create Reorder
        $validator = Validator::make($request->all(), [
            'new_quantity' => 'numeric|nullable',
            'new_address_id' => 'numeric|nullable'
        ], [
            'numeric' => -3
        ]);
        if($validator->fails()) {
            return $validator->errors()->first();
        }
        
        
        $reorder = new PendingReorder;
        if(isset($request->new_quantity)) {
            $reorder->new_quantity = $request->new_quantity;
        }
        if(isset($request->new_address_id)) {
            $address = Address::where([
                ['user_id', $order->user_id], 
                ['id', $request->new_address_id]
            ])->get()->first();
            if(!$address) {
                return -4;  // echo "Address ID and User ID not linked.";
            }
            $reorder->new_address_id = $request->new_address_id;
        }
        $reorder->order_token = $request->order_token;
        if(!$reorder->save()) {
            return -1;  // echo "Could not create a reorder.";
        }
        return $reorder->id;   
    }

    public function confirmReorder(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'response' => 'required|boolean',
            'comment' => 'nullable|string'
        ], [
            'required' => -2,
            'status.boolean' => -5
        ]);
        if($validator->fails()) {
            return $validator->errors()->first();
        }
        $reorder = PendingReorder::find($id);
        if(!$reorder) {
            return -3;  // echo "Reorder not found.";
        }
        if($request->response) {
            // Accepted, register the order 
            $order = $this->getOrderByToken($reorder->order_token);
            if(!$order) {
                return -4;  // echo "Original Order not found.";
            }
            if(!$this->createOrderFromReorder($reorder, $order, $request->comment)) {
                return -1;  // echo "New order could not be created.";
            }
        }
    
        // Delete reorder 
        Helper::delete_data_image($reorder->new_quotation);
        if(!$reorder->delete()) {
            return -6;  // echo "Reorder could not be deleted.";
        }
        else {
            return 1;
        }

    }
}
