<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LogodesignOrder;
use App\BrandingOrder;
use App\SocialMediaOrder;
use App\StationeryOrder;
use App\PackagingOrder;
use App\PromotionalOrder;

use App\Models\PendingReorder;

use App\Helpers\AppHelper as Helper;

use App\Notifications\OrderRegistered;

use Validator;

use App\Models\Commercial\CommercialOrder;

use App\User;
use App\Traits\GetOrders;
use App\Traits\CreateOrder;

use App\Models\Order\MasterOrder; 
use App\Models\Order\MasterOrderMapping;

use App\Models\User\RawOrder;

use Illuminate\Support\Collection;

class OrdersController extends Controller 
{

    use GetOrders;
    use CreateOrder;
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
        $stationery_orders = StationeyOrder::all();
        $packaging_orders = PackagingOrder::all();
        $promotional_orders = PromotionalOrder::all();
        $commercial_orders = CommercialOrder::all();
        $all_orders_array = array(
            'logodesign' => $logodesign_orders, 
            'branding' => $branding_orders,
            'social_media' => $socialmedia_orders,
            'packaging' => $packaging_orders,
            'stationery' => $stationery_orders,
            'promotional' => $promotional_orders,
            'commercial' => $commercial_orders
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

    

    public function getOrderByOrderToken(Request $request, $token) {
        // return $request;
        
        if(!isset($token)) {
            return -2;  // echo "Required fields missing.";
        }
        $order = $this->getOrderByToken($token);
        if(!$order) {
            return -3;  // echo "Order not found.";
        }
        // return $order;
        
        
        // foreach($order->getRelations() as $relation => $items) {
            
        //     foreach($items as $item) {
        //         unset($item->id);
        //         $order->{$relation}()->create($item->toArray());
        //     }
            
        // }
        
        if(isset($order->posts)) {
            $order->load('posts');
        }
        return $order;

        
    }

    public function getOrderDetailsByToken(Request $request, $token) {
        $order = $this->getOrderByToken($token);
        
        if(!$order) {
            return -3;  // echo "Order not found.";
        }
        // return $order;
        // $address = Address::find($order->address_id);
        // return $order;
        
        
        if($order->products) {
            
            $products = $this->getProductsInfo($order->products);
            
            unset($order->products);
            $order->products = $products;
        }
        $payment_method = null;
        $master_order_mapping = MasterOrderMapping::where('order_token', $token)->first();
        if($master_order_mapping) {
            $master_order = MasterOrder::find($master_order_mapping->order_id);
            // return $master_order_mapping;
            $payment_method = $master_order ? $master_order->payment_method : null;
        }
        $order_details = json_encode([
            'order_token' => $order->order_token,
            'created_at' => date($order->created_at),
            'user_id' => $order->user_id,
            'category_id' => $order->category_id,
            'delivery_date' => $order->delivery_date,
            'main_category_name' => $order->category->main_category->name,
            'category_name' => $order->category->name,
            'status' => $order->status, 
            'price' => $order->price, 
            'quantity' => $order->quantity,
            'address' => $order->address,
            'item_name' => $order->item_name, 
            'package' => $order->package,
            'products' => $order->products,
            'payment_method' => $payment_method
        ]);

        return $order_details;
    }

    public function createMasterOrder(Request $request) {
        // return "ok";
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'commercial' => 'nullable|array',
            'socialmedia' => 'nullable|array',
            'branding' => 'nullable|array',
            'logodesign' => 'nullable|array',
            'stationery' => 'nullable|array',
            'promotional' => 'nullable|array',
            'packaging' => 'nullable|array',
            'fast_delivery' => 'nullable|boolean',
            'total_price' => 'required|string',
            'payment_method' => 'required|string',
            'order_comment' => 'nullable|string',
            'address_id' => 'nullable|numeric'
        ], [
            'required' => -2,
            'array' => -4,
            'fast_delivery.boolean' => -5,
            'address_id.numeric' => -6
        ]);
        if($validator->fails()) {
            return $validator->errors()->first();
        }
        $user = User::find($request->user_id);
        if(!$user) {
            return -3;  // echo "User not found.";
        }   
        if($request->address_id) {

            $address = Address::find($request->address_id);
            if(!$address) {
                return -7;  
            }
            if($address->user_id !== $user->id) {
                return -8;
            }
        }

        // $tokens_array = array();
        // $initial_response = $this->checkMasterOrderRequest($request);
        // if($initial_response < 0) {
        //     return $initial_response;
        // }

        $tokens_array = array();
        
        if(isset($request->logodesign)) {
            foreach($request->logodesign as $key => $logodesign_order_request) {
                $test_request = new Request($logodesign_order_request);
                $response = $this->createLogodesignOrder($test_request);
                if($response > 0) {
                    $order = LogodesignOrder::find($response);
                    array_push($tokens_array, $order->order_token);
                }
                else {
                    $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                    if(sizeof($faulty_tokens) > 0) {
                        $flag = -1000;
                        echo $faulty_tokens;
                    }
                    return -100 - $key*10 + $response;
                }
            }
            
        }

        if(isset($request->branding)) {
            foreach($request->branding as $key => $branding_order_request) {
                $test_request = new Request($branding_order_request);
                // return $branding_order_request;
                $response = $this->createBrandingOrder($test_request);
                if($response > 0) {
                    $order = BrandingOrder::find($response);
                    array_push($tokens_array, $order->order_token);
                }
                else {
                    $flag = 0;
                    $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                    if(sizeof($faulty_tokens) > 0) {
                        $flag = -2000;
                        echo $faulty_tokens;
                    }
                    return -200 - $key*10 + $response + $flag;
                }
            }
        }

        if(isset($request->socialmedia)) {
            foreach($request->socialmedia as $key => $socialmedia_order_request) {
                $test_request = new Request($socialmedia_order_request);
                $response = $this->createSocialmediaOrder($test_request);
                if($response > 0) {
                    $order = SocialMediaOrder::find($response);
                    array_push($tokens_array, $order->order_token);
                }
                else {
                    echo json_encode($tokens_array);
                    $flag = 0;
                    $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                    if(sizeof($faulty_tokens) > 0) {
                        $flag = -3000;
                        echo $faulty_tokens;
                    }
                    return -300 - $key*10 + $response + $flag;
                }
            }
        }

        if(isset($request->stationery)) {
            foreach($request->stationery as $key => $stationery_order_request) {
                $test_request = new Request($stationery_order_request);
                $response = $this->createStationeryOrder($test_request);
                if($response > 0) {
                    $order = StationeryOrder::find($response);
                    array_push($tokens_array, $order->order_token);
                }
                else {
                    echo json_encode($tokens_array);
                    $flag = 0;
                    $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                    if(sizeof($faulty_tokens) > 0) {
                        $flag = -4000;
                        echo $faulty_tokens;
                    }
                    return -400 - $key*10 + $response + $flag;
                }
            }
        }

        if(isset($request->packaging)) {
            foreach($request->packaging as $key => $packaging_order_request) {
                $test_request = new Request($packaging_order_request);
                // return $branding_order_request;
                $response = $this->createPackagingOrder($test_request);
                if($response > 0) {
                    $order = PackagingOrder::find($response);
                    array_push($tokens_array, $order->order_token);
                }
                else {
                    echo json_encode($tokens_array);
                    $flag = 0;
                    $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                    if(sizeof($faulty_tokens) > 0) {
                        $flag = -5000;
                        echo $faulty_tokens;
                    }
                    return -500 - $key*10 + $response + $flag;
                }
            }
        }

        if(isset($request->promotional)) {
            foreach($request->promotional as $key => $promotional_order_request) {
                $test_request = new Request($promotional_order_request);
                // return $branding_order_request;
                $response = $this->createPromotionalOrder($test_request);
                if($response > 0) {
                    $order = PromotionalOrder::find($response);
                    array_push($tokens_array, $order->order_token);
                }
                else {
                    echo json_encode($tokens_array);
                    $flag = 0;
                    $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                    if(sizeof($faulty_tokens) > 0) {
                        $flag = -6000;
                        echo $faulty_tokens;
                    }
                    return -600 - $key*10 + $response + $flag;
                }
            }
        }

        if(isset($request->commercial)) {
            foreach($request->commercial as $key => $commercial_order_request) {
                $test_request = new Request($commercial_order_request);
                // return $branding_order_request;
                $response = $this->createCommercialOrder($test_request);
                if($response > 0) {
                    $order = CommercialOrder::find($response);
                    array_push($tokens_array, $order->order_token);
                }
                else {
                    echo json_encode($tokens_array);
                    $flag = 0;
                    $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                    if(sizeof($faulty_tokens) > 0) {
                        $flag = -7000;
                        echo $faulty_tokens;
                    }
                    return -700 - $key*10 + $response + $flag;
                }
            }
        }

        if(sizeof($tokens_array) < 1) {
            return -9;  // echo "Empty Orders.";
        }

        $master_order = new MasterOrder;
        
        $master_order = MasterOrder::create([
            'user_id' => $user->id,
            'total_price' => $request->total_price, 
            'fast_delivery' => $request->fast_delivery, 
            'order_comment' => $request->order_comment,
            'address_id' => $request->address_id,
            'payment_method' => $request->payment_method
        ]);
        if(!$master_order) {
            $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
            if(sizeof($faulty_tokens) > 0) {
                echo $faulty_tokens;
                return -11; // echo "Could not create master order, and all orders could not be deleted.";
            }
            return -10;    // echo "Could not create master order, and all orders deleted.";
        }

        foreach($tokens_array as $token) {
            $master_order_mapping = MasterOrderMapping::create([
                'order_id' => $master_order->id,
                'order_token' => $token
            ]);
            if(!$master_order_mapping) {
                return -12; // echo "Could not create one or more master order mapping.";
            }
        }

        return $master_order->id;


        

        

    }

    public function getMasterOrder(Request $request, $id) {
        $master_order = MasterOrder::find($id);
        if(!$master_order) {
            return -3;  // echo "Master order not found.";
        }
        $master_order->load('orders');
        $tokens_array = array();
        foreach($master_order->orders as $order) {
            array_push($tokens_array, $order->order_token);
        }
        unset($master_order->orders);
        $master_order->orders = $tokens_array;
        $user = User::find($master_order->user_id);
        // $master_order->email = $user->email;
        return $master_order;
    }

    public function getAllMasterOrders(Request $request) {
        $masterorders = MasterOrder::all();
        
        foreach($masterorders as $masterorder) {
            $tokens_array = array();
            $masterorder->load('orders');
            foreach($masterorder->orders as $order) {
                array_push($tokens_array, $order->order_token);
            }
            unset($masterorder->orders);
            $masterorder->orders = $tokens_array;
        }
        return $masterorders;
    }

    public function getUserMasterOrders(Request $request, $id) {
        $user = User::find($id);
        if(!$user) {
            return -3;  // echo "User not found.";
        }
        $masterorders = $user->orders;
        foreach($masterorders as $masterorder) {
            $tokens_array = $this->pluckTokensFromOrderMappingArray($masterorder->orders);
            unset($masterorder->orders);
            $masterorder->orders = $tokens_array;
        }
        
        return $masterorders;

    }

    public function createMasterOrderFromUserRawOrders(Request $request, $id) {
        // return "ok";
        $response_array = array();
        $validator = Validator::make($request->all(), [
            'fast_delivery' => 'nullable|boolean',
            'total_price' => 'required|string',
            'payment_method' => 'required|string',
            'order_comment' => 'nullable|string',
            'address_id' => 'nullable|numeric'
        ], [
            'required' => -2,
            'fast_delivery.boolean' => -4,
            'address_id.numeric' => -5
        ]);
        if($validator->fails()) {
            $error_code = $validator->errors()->first();
            $response_array[0] = $error_code;
            return $response_array;
        }
        $user = User::find($id);
        if(!$user) {
            $response_array[0] = -3;
            return $response_array;  // echo "User not found.";
        }   
        if($request->address_id) {

            $address = Address::find($request->address_id);
            if(!$address) {
                $response_array[0] = -6;
                return $response_array;  // echo "Address not found.";
            }
            if($address->user_id !== $user->id) {
                $response_array[0] = -7;
                return $response_array;  // echo "Address not registered under this user.";
            }
        }

        $raw_orders = $user->raw_orders;
        
        if(sizeof($raw_orders) < 1) {
            $response_array[0] = -8;
            return $response_array;  // echo "User does not have any raw orders.";
        }

        $unlinked_orders = array();
        $linked_orders = array();
        foreach($raw_orders as $raw_order) {
            if($raw_order->raw_order_id !== null) {
                array_push($linked_orders, $raw_order);
            }
            else {
                array_push($unlinked_orders, $raw_order);
            }
        }
        $raw_orders = array_merge($unlinked_orders, $linked_orders);
        // return $raw_orders;

        $tokens_array = array();
        foreach($raw_orders as  $raw_order) {
            
            switch($raw_order->category->name) {
                case 'Logo Design': 
                    $test_request = new Request((array)$raw_order->order);
                    // echo gettype($test_request);
                    $response = $this->createLogodesignOrder($test_request);
                    if($response > 0) {
                        $order = LogodesignOrder::find($response);
                        $raw_order->order_token = $order->order_token;
                        $raw_order->save();
                        array_push($tokens_array, $order->order_token);
                    }
                    else {
                        $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                        if(sizeof($faulty_tokens) > 0) {
                            echo $faulty_tokens;
                        }
                        $response_array[0] = $raw_order->id;
                        $response_array[1] = $response;
                        return $response_array;
                    }
                break;

                case 'Branding': 
                    $test_request = new Request((array)$raw_order->order);
                    // return $branding_order_request;
                    // echo gettype($test_request);
                    $response = $this->createBrandingOrder($test_request);
                    if($response > 0) {
                        $order = BrandingOrder::find($response);
                        $raw_order->order_token = $order->order_token;
                        $raw_order->save();
                        array_push($tokens_array, $order->order_token);
                    }
                    else {
                        $flag = 0;
                        $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                        if(sizeof($faulty_tokens) > 0) {
                           
                            echo $faulty_tokens;
                            
                        }
                        $response_array[0] = $raw_order->id;
                        $response_array[1] = $response;
                        return $response_array;
                    }
                break;

                case 'Social Media': 
                    $test_request = new Request((array)$raw_order->order);
                    
                    // return $test_request;
                    // echo gettype($test_request);
                    $response = $this->createSocialmediaOrder($test_request);
                    if($response > 0) {
                        $order = SocialMediaOrder::find($response);
                        $raw_order->order_token = $order->order_token;
                        $raw_order->save();
                        array_push($tokens_array, $order->order_token);
                    }
                    else {
                        // echo json_encode($tokens_array);
                        $flag = 0;
                        $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                        if(sizeof($faulty_tokens) > 0) {
                            echo $faulty_tokens;
                        }
                        $response_array[0] = $raw_order->id;
                        $response_array[1] = $response;
                        return $response_array;
                    }
                break;

                case 'Stationery': 
                    $test_request = new Request((array)$raw_order->order);
                    // echo gettype($test_request);
                    $response = $this->createStationeryOrder($test_request);
                    if($response > 0) {
                        $order = StationeryOrder::find($response);
                        if($raw_order->raw_order_id) {
                            $sub_raw_order = RawOrder::find($raw_order->raw_order_id);
                            $sub_order = $this->getOrderByToken($sub_raw_order->order_token);
                            $order->logodesign_order_id = $sub_order->id;
                            $order->save();
                        }
                        $raw_order->order_token = $order->order_token;
                        $raw_order->save();
                        array_push($tokens_array, $order->order_token);
                    }
                    else {
                        // echo json_encode($tokens_array);
                        $flag = 0;
                        $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                        if(sizeof($faulty_tokens) > 0) {
                            // $flag = -4000;
                            echo $faulty_tokens;
                        }
                        $response_array[0] = $raw_order->id;
                        $response_array[1] = $response; 
                        return $response_array;
                    }
                break;

                case 'Packaging':
                    $test_request = new Request((array)$raw_order->order);
                    // echo gettype($test_request);
                    $response = $this->createPackagingOrder($test_request);
                    if($response > 0) {
                        $order = PackagingOrder::find($response);
                        if($raw_order->raw_order_id) {
                            $sub_raw_order = RawOrder::find($raw_order->raw_order_id);
                            $sub_order = $this->getOrderByToken($sub_raw_order->order_token);
                            $order->logodesign_order_id = $sub_order->id;
                            $order->save();
                        }
                        $raw_order->order_token = $order->order_token;
                        $raw_order->save();
                        array_push($tokens_array, $order->order_token);
                    }
                    else {
                        echo json_encode($tokens_array);
                        $flag = 0;
                        $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                        if(sizeof($faulty_tokens) > 0) {
                            // $flag = -5000;
                            echo $faulty_tokens;
                        }
                        $response_array[0] = $raw_order->id;
                        $response_array[1] = $response;
                        return $response_array;
                    }
                break;

                case 'Promotional': 
                    $test_request = new Request((array)$raw_order->order);
                    // echo gettype($test_request);
                    $response = $this->createPromotionalOrder($test_request);
                    if($response > 0) {
                        $order = PromotionalOrder::find($response);
                        if($raw_order->raw_order_id) {
                            $sub_raw_order = RawOrder::find($raw_order->raw_order_id);
                            $sub_order = $this->getOrderByToken($sub_raw_order->order_token);
                            $order->logodesign_order_id = $sub_order->id;
                            $order->save();
                        }
                        $raw_order->order_token = $order->order_token;
                        $raw_order->save();
                        array_push($tokens_array, $order->order_token);
                    }
                    else {
                        echo json_encode($tokens_array);
                        $flag = 0;
                        $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                        if(sizeof($faulty_tokens) > 0) {
                            // $flag = -6000;
                            echo $faulty_tokens;
                        }
                        $response_array[0] = $raw_order->id;
                        $response_array[1] = $response;
                        return $response_array;
                    }
                break;

                case 'Commercial': 
                    $test_request = new Request((array)$raw_order->order);
                    // echo gettype($test_request);
                    $response = $this->createCommercialOrder($test_request);
                    if($response > 0) {
                        $order = CommercialOrder::find($response);
                        $raw_order->order_token = $order->order_token;
                        $raw_order->save();
                        array_push($tokens_array, $order->order_token);
                    }
                    else {
                        // echo json_encode($tokens_array);
                        $flag = 0;
                        $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
                        if(sizeof($faulty_tokens) > 0) {
                            // $flag = -7000;
                            echo $faulty_tokens;
                        }
                        $response_array[0] = $raw_order->id;
                        $response_array[1] = $response;
                        return $response_array;
                    }
                break;

                default: 

                break; 
            }
        }

        if(sizeof($tokens_array) < 1) {
            $response_array[0] = -9;
            return $response_array; // echo "Empty Orders";
        }

        foreach($raw_orders as $raw_order) {
            if($raw_order->order_token === null) {
                return array(-14);  // echo "Could not confirm one or more raw orders. Master Order not created.";
            }
        }
        

        $master_order = new MasterOrder;
        
        $master_order = MasterOrder::create([
            'user_id' => $user->id,
            'total_price' => $request->total_price, 
            'fast_delivery' => $request->fast_delivery, 
            'order_comment' => $request->order_comment,
            'address_id' => $request->address_id,
            'payment_method' => $request->payment_method
        ]);
        if(!$master_order) {
            $faulty_tokens = $this->deleteOrdersFromTokensArray($tokens_array);
            if(sizeof($faulty_tokens) > 0) {
                echo $faulty_tokens;
                $response_array[0] = -10;
                return $response_array;
                // return -12; // echo "Could not create master order, and all orders could not be deleted.";
            }
            return array(-11);
            // return -11;    // echo "Could not create master order, and all orders deleted.";
        }

        foreach($tokens_array as $token) {
            $master_order_mapping = MasterOrderMapping::create([
                'order_id' => $master_order->id,
                'order_token' => $token
            ]);
            if(!$master_order_mapping) {
                return array(-12); // echo "Could not create one or more master order mapping.";
            }
        }

        foreach($raw_orders as $raw_order) {
            if(!$raw_order->delete()) {
                return array(-13);  // echo "Master order created, but could not delete one or more raw orders.";
            }
        }

        $all_orders = $this->getAllOrdersFromMasterOrder($master_order);
        // return $master_order->user;
        $master_order->user->notify(new OrderRegistered($all_orders, $master_order));
        // return $all_orders;
        return array($master_order->id);
    }

    public function getOrdersFromMasterOrder(Request $request, $id) {
        $master_order = MasterOrder::find($id);
        return $this->getAllOrdersFromMasterOrder($master_order);
    }

    

    

}
