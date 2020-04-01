<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Commercial\CommercialItem; 
use App\Models\Personal\PersonalItem;
use App\Models\Personal\PersonalSubitem;
use App\Models\Commercial\CommercialOrder;

use Illuminate\Support\Facades\Auth;

use App\Models\PendingReorder;


use App\Traits\GetOrders;
use Validator;

use App\Models\Order\MasterOrder;
use App\Models\Order\MasterOrderMapping;

use App\Helpers\AppHelper as Helper;

class SalesAdminController extends Controller
{
    //
    use GetOrders; 

    public function createUser(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'lang' => 'required|string'
        ]);
        $password = $request->password;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'lang' => $request->lang
        ]);
        if(!$user) {
            return redirect()->back()->with('error', 'User could not be created.');
        }
        return redirect()->back()->with('success', 'User created. Login credentials: Email ('.$user->email.'), Password ('.$password.')');
    }

    public function createPreorderPage(Request $request, $id, $category) {
        $user = User::find($id);
        if(!$id) {
            return redirect()->back()->with('error', 'User not found.');
        }
        switch($category) {
            case 'commercial': $items = CommercialItem::all();
            break;

            case 'personal': $items = PersonalItem::with('subitems')->get();
            break; 
            
            default: $items = array();

        }
        return view('sales.addpreorder', compact('category', 'items', 'user'));
    }

    public function createPreorder(Request $request, $id, $category) {
        // return $request;
        $user = User::find($id);
        if(!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        $this->validate($request, [
            'item_name' => 'required|string',
            'printing' => 'required|string',
            'paper' => 'required|string',
            'finishing' => 'required|string',
            'note' => 'nullable|string',
            'size' => 'required|string',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'date' => 'nullable|date'
        ]);
        switch($category) {
            case 'commercial': 
                $order = new CommercialOrder;
                $order->user_id = $user->id;
                $order->order_number = "COMM".$order->getNextId();
                $order->item_name = $request->item_name; 
                $order->printing = $request->printing;
                $order->paper = $request->paper; 
                $order->finishing = $request->finishing; 
                $order->note = isset($request->note) ? $request->note : null;

                $size_array = preg_split('/[ ,\n\r]/', $request->size, null, PREG_SPLIT_NO_EMPTY);
                $order->size = implode($size_array, ',');

                $order->quantity = $request->quantity;
                $order->price = $request->price;
                if(isset($request->date)) {
                    $order->created_at = $request->date;
                }
                if($order->save()) {
                    return redirect()->back()->with('success', 'Preorder created.');
                }
                else {
                    return redirect()->back()->with('error', 'Preorder could not be created.');
                }
                
            break; 

            case 'personal': 

            break; 

            case 'store': 

            break; 

            case 'design': 

            break;

            default: 
                return redirect()->back()->with('error', 'Invalid Category');
        }
        
        

    }

    public function reordersPage(Request $request) {
        $reorders_all = PendingReorder::all();
        $reorders = array();
        $reorders_pending = array();
        foreach($reorders_all as $reorder) {
            $reorder->order = $this->getOrderByToken($reorder->order_token);
        }
        foreach($reorders_all as $reorder) {
            if($reorder->sales_admin_id !== null) {
                array_push($reorders, $reorder);
            }
            else {
                array_push($reorders_pending, $reorder);
            }
        }
        return view('sales.reorders', compact('reorders', 'reorders_pending'));
    }

    public function reorderPage(Request $request, $id) {
        $reorder = PendingReorder::find($id);
        if(!$reorder) {
            return redirect()->back()->with('error', 'Reorder not found.');
        }
        $order = $this->getOrderByToken($reorder->order_token);
        if($order->style) {
            $order->style = json_encode($order->style);
        }
        // if(!$order) {
        //     return redirect()->back()->with('error', 'Original not found.');
        // }
        $user = Auth::guard()->user();
        $sales_admin = User::find($reorder->sales_admin_id);
        return view('sales.reorder', compact('reorder', 'order', 'user', 'sales_admin'));
    }

    public function updateReorderPage(Request $request, $id) {
        $reorder = PendingReorder::find($id);
        if(!$reorder) {
            return redirect()->back()->with('error', 'Reorder not found.');
        }
        $sales_admin = User::find($reorder->sales_admin_id);
        $order = $this->getOrderByToken($reorder->order_token);
        $user = Auth::guard()->user();
        return view('sales.updatereorder', compact('reorder', 'sales_admin', 'user', 'order'));
    }

    public function updateReorder(Request $request, $id) {
        // return $request;

        $this->validate($request, [
            'sales_admin_id' => 'required|numeric',
            'new_price' => 'nullable|numeric',
            'changeImage' => 'nullable|string',
            'new_quotation' => 'nullable|image'
        ]);
        $reorder = PendingReorder::find($id);
        if(!$reorder) {
            return redirect()->back()->with('error', 'Reorder not found.');
        }
        if(isset($request->new_price)) {
            $reorder->new_price = $request->new_price;
        }
        if(isset($request->changeImage)) {
            $image = Helper::replace_data_image($request->new_quotation, $reorder->new_quotation);
            $reorder->new_quotation = $image;
        }
        $reorder->sales_admin_id = $request->sales_admin_id;
        if(!$reorder->save()) {
            return redirect()->back()->with('error', 'Reorder could not be updated.');  // 
        }  
        else {
            return redirect()->back()->with('success', 'Reorder updated.');
        }      
    }

    public function masterordersPage(Request $request) {
        $masterorders_all = MasterOrder::with('orders')->get();
        // $masterorders_all = $this->convertMasterOrdersWithMappingToTokensArray($masterorders_all);
        $pending_masterorders = array();
        $assigned_masterorders = array();
        foreach($masterorders_all as $masterorder) {
            $masterorder = $this->convertMasterOrderWithMappingToTokensArray($masterorder);
            if($masterorder->delivery_date) {
                array_push($assigned_masterorders, $masterorder);
            }
            else {
                array_push($pending_masterorders, $masterorder);
            }
        }
        return view('sales.masterorders', compact('pending_masterorders', 'assigned_masterorders'));
    }

    public function masterorderPage(Request $request, $id) {
        $masterorder = MasterOrder::with('orders')->find($id);
        if(!$masterorder) {
            return redirect()->back()->with('error', 'Master Order not found.');
        }
        $masterorder = $this->convertMasterOrderWithMappingToTokensArray($masterorder);
        return view('sales.masterorder', compact('masterorder'));
    }


    public function updateMasterOrder(Request $request, $id) {
        // return $request;
        $this->validate($request, [
            'delivery_date' => 'date|required'
        ]);
        $masterorder = MasterOrder::find($id);
        if(!$masterorder) {
            return redirect()->back()->with('error', 'Master order not found.');
        }
        $masterorder->delivery_date = $request->delivery_date;
        if(!$masterorder->save()) {
            return redirect()->back()->with('error', 'Could not update Master Order.');
        }
        return redirect()->back()->with('success', 'Master order updated.');
    }

    public function orderPage(Request $request, $token) {
        $order = $this->getOrderByToken($token);
        if(!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }
        return view('sales.order', compact('order'));
    }
}
