<?php 

namespace App\Traits;
use App\Helpers\AppHelper as Helper;
use App\LogoDesignOrder; 
use App\BrandingOrder;
use App\SocialMediaOrder; 
use App\StationeryOrder;
use App\PackagingOrder; 
use App\PromotionalOrder;
use App\Category;

use App\Models\Commercial\CommercialOrder;
use App\Models\Personal\PersonalOrder;

trait GetOrders {

    public function getAllDesignOrders() {
        $logodesign_orders = LogodesignOrder::all();    // Array of objects, each object is an order
        foreach($logodesign_orders as $order) {
            $order->order_type="logodesign";
        }

        $branding_orders = BrandingOrder::all();
        foreach($branding_orders as $order) {
            $order->order_type="branding";
        }

        $socialmedia_orders = SocialMediaOrder::all();
        foreach($socialmedia_orders as $order) {
            $order->order_type="socialmedia";
        }

        $packaging_orders = PackagingOrder::all();
        foreach($packaging_orders as $order) {
            $order->order_type = "packaging";
        }

        $promotional_orders = PromotionalOrder::all();
        foreach($promotional_orders as $order) {
            $order->order_type = "promotional";
        }

        $stationery_orders = StationeryOrder::all();
        foreach($stationery_orders as $order) {
            $order->order_type = "stationery";
        }
        $all_orders_array = $logodesign_orders
            ->merge($branding_orders)
            ->merge($socialmedia_orders)
            ->merge($packaging_orders)
            ->merge($promotional_orders)
            ->merge($stationery_orders);
        //$all_orders_array = array_merge($logodesign_orders, $branding_orders, $socialmedia_orders, $packaging_orders, $promotional_orders, $stationery_orders);
        // return $all_orders_array;

        $ordered = $all_orders_array->sortBy('created_at')->values();
        return $ordered;
        
    }

    public function getUserOrdersForDesign($id) {
        // Object with key-value pairs 

        $logodesign_orders = LogodesignOrder::where('user_id','=', $id)->get();
        $branding_orders = BrandingOrder::where('user_id', '=', $id)->get();
        $socialmedia_orders = SocialMediaOrder::where('user_id', '=', $id)->get();
        $promotional_orders = PromotionalOrder::where('user_id', '=', $id)->get();
        $stationery_orders = StationeryOrder::where('user_id', '=', $id)->get();
        $packaging_orders = PackagingOrder::where('user_id', '=', $id)->get();
        $all_orders_array = array(
            'logodesign' => $logodesign_orders,
            'branding' => $branding_orders,
            'social_media' => $socialmedia_orders,
            'promotional' => $promotional_orders,
            'stationery' => $stationery_orders,
            'packaging' => $packaging_orders
        );
        $all_orders = json_encode($all_orders_array);
        return $all_orders;
    }

    public function getUserOrdersForDesignSortedByDate(int $id) {
        
        $all_orders = array();

        $logodesign_orders = LogodesignOrder::where('user_id','=', $id)->get(['id', 'user_id', 'package', 'category_id', 'created_at']);        
        foreach($logodesign_orders as $order) {
            $order->type = Category::find($order->category_id)->name;
            array_push($all_orders, $order);
        }
        
        $branding_orders = BrandingOrder::where('user_id', '=', $id)->get(['id', 'user_id', 'category_id', 'package', 'created_at']);
        foreach($branding_orders as $order) {
            $order->type = Category::find($order->category_id)->name;
            array_push($all_orders, $order);
        }

        $socialmedia_orders = SocialMediaOrder::where('user_id', '=', $id)->get(['id', 'user_id', 'category_id', 'package', 'created_at']);
        foreach($socialmedia_orders as $order) {
            $order->type = Category::find($order->category_id)->name;
            array_push($all_orders, $order);
        }

        $promotional_orders = PromotionalOrder::where('user_id', '=', $id)->get(['id', 'user_id', 'category_id','created_at']);
        foreach($promotional_orders as $order) {
            $order->type = Category::find($order->category_id)->name;
            array_push($all_orders, $order);
        }

        $stationery_orders = StationeryOrder::where('user_id', '=', $id)->get(['id', 'user_id', 'category_id', 'created_at']);
        foreach($stationery_orders as $order) {
            $order->type = Category::find($order->category_id)->name;
            array_push($all_orders, $order);
        }

        $packaging_orders = PackagingOrder::where('user_id', '=', $id)->get(['id', 'user_id', 'category_id', 'created_at']);
        foreach($packaging_orders as $order) {
            $order->type = Category::find($order->category_id)->name;
            array_push($all_orders, $order);
        }

        // return $all_orders;
        $sorted_orders = collect($all_orders)->sortBy('created_at')->values();
        foreach($sorted_orders as $order) {
            $order->order_id = strtoupper(substr($order->type, 0,4)).$order->id;
        }

        return $sorted_orders;
    }

    public function getAllDesignOrdersSortedByDate(int $category_id = null, int $id = null, int $designer_id = null) {
        $orders = [];
        switch($category_id) {
            case 1: $orders = LogodesignOrder::all();
            break;

            case 2: $orders = BrandingOrder::all();
            break;

            case 3: $orders = SocialMediaOrder::with('posts')->get(); 
            break; 

            case 4: $orders = StationeryOrder::all(); 
            break; 

            case 5: $orders = PackagingOrder::all(); 
            break;

            case 6: $orders = PromotionalOrder::all(); 
            break;

            default: 
                $logodesign_orders = LogodesignOrder::all();
                $branding_orders = BrandingOrder::all();               
                $socialmedia_orders = SocialMediaOrder::with('posts')->get();              
                $stationery_orders = StationeryOrder::all();              
                $packaging_orders = PackagingOrder::all();         
                $promotional_orders = PromotionalOrder::all();             
                $orders = Helper::merge_collections(
                    array($logodesign_orders, 
                    $branding_orders, 
                    $socialmedia_orders, 
                    $stationery_orders, 
                    $packaging_orders, 
                    $promotional_orders));
            break;
        }
        if($id) {
            
            foreach($orders as $order) {
                
                //echo $id.' '.gettype($id).' and '.$order->id.' '.gettype($order->id).'<br>';
                if($order->id === $id) {
                    
                    return $order;
                }
            }
            return null;
        }
        if($designer_id) {
            $designer_orders = collect($orders)->where('designer_id', '=', $designer_id)->values();
            foreach($designer_orders as $order) {
                $category = Category::find($order->category_id);
                $order->order_id = strtoupper(substr($category->name, 0,4)).'-'.$order->id;
                $order->category_name = $category->name; 
            }
            return $designer_orders;
        }
        else {
            $sorted_orders = collect($orders)->sortBy('created_at')->values()->paginate(20);
            foreach($sorted_orders as $order) {
                $category = Category::find($order->category_id);
                $order->order_id = strtoupper(substr($category->name, 0,4)).'-'.$order->id;
                $order->category_name = $category->name; 
            }
            
            return $sorted_orders;
        }
    }

    public function getAllPrintingOrdersSortedByDate($category_id = null, int $id = null, int $printing_admin_id = null) {
        $commercial_orders = CommercialOrder::where('printing_admin_id', $printing_admin_id)->get();
        
        // $all_orders = Helper::merge_collections([
        //     $commercial_orders
        // ]);
        $all_orders = $commercial_orders;
        return $all_orders;

    }




    
}