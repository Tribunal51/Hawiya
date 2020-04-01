<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BrandingOrder;
use App\LogodesignOrder; 
use App\SocialMediaOrder; 
use App\PromotionalOrder; 
use App\PackagingOrder; 
use App\StationeryOrder; 
use App\Category;
use App\Traits\GetOrders;

use App\Models\Order\MasterOrder;
use App\Models\Order\MasterOrderMapping;

class CodeController extends Controller
{
    //
    use GetOrders; 
    public function rectifyOrderTokens(Request $request) {
        $orders = $this->getAllOrders();
        $wrong_tokens_list = array();

        foreach($orders as $order) {
            if(!$this->checkTokenFromOrder($order)) {
                $order->order_token = $this->generateTokenFromOrder($order);
                array_push($wrong_tokens_list, $order->order_token);
                if(!$order->save()) {
                    return "Not able to modify order ".$order;
                }
            }
        }
        return sizeof($wrong_tokens_list) > 0 ? $wrong_tokens_list : $orders;
    }

    public function verifyMasterOrderMappings(Request $request) {
        $mappings = MasterOrderMapping::all();
        foreach($mappings as $mapping) {
            $order = $this->getOrderByToken($mapping->order_token);
            if(!$order) {
                $mapping->delete();
            }
        }
        return 1;
    }
}
