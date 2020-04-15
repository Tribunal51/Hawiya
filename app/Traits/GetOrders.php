<?php 

namespace App\Traits;

use Illuminate\Http\Request;

use App\Helpers\AppHelper as Helper;
use App\LogoDesignOrder; 
use App\BrandingOrder;
use App\SocialMediaOrder; 
use App\StationeryOrder;
use App\PackagingOrder; 
use App\PromotionalOrder;
use App\Category;

use App\Product;
use App\User;

use App\Models\Commercial\CommercialOrder;
use App\Models\Personal\PersonalOrder;

use Validator;

trait GetOrders {

    public function getAllOrders() {
        $all_orders = array();
        $logodesign_orders = LogodesignOrder::all();    // Array of objects, each object is an order
        foreach($logodesign_orders as $order) {
            // $order->category_name = $order->category->name;
            
            
            array_push($all_orders, $order);
        }

        $branding_orders = BrandingOrder::all();
        foreach($branding_orders as $order) {
            // $order->category_name = $order->category->name;
            array_push($all_orders, $order);
            // $order->category_name = $order->category->name;
        }
        // return $branding_orders;

        $socialmedia_orders = SocialMediaOrder::all();
        foreach($socialmedia_orders as $order) {
            // $order->category_name = $order->category->name;
            array_push($all_orders, $order);
            // $order->category_name = $order
        }

        $packaging_orders = PackagingOrder::all();
        foreach($packaging_orders as $order) {
            // $order->category_name = $order->category->name;
            array_push($all_orders, $order);
            // $order->order_type = "packaging";
        }
        // return $packaging_orders;

        $promotional_orders = PromotionalOrder::all();
        foreach($promotional_orders as $order) {
            // $order->category_name = $order->category->name;
            array_push($all_orders, $order);
            // $order->order_type = "promotional";
        }

        $stationery_orders = StationeryOrder::all();
        foreach($stationery_orders as $order) {
            // $order->category_name = $order->category->name;
            array_push($all_orders, $order);
            // $order->order_type = "stationery";
        }

        $commercial_orders = CommercialOrder::all();
        foreach($commercial_orders as $order) {
            // $order->category_name = $order->category->name;
            array_push($all_orders, $order);
            // $order->order_type = "commercial";
        }

        $all_orders_array = collect($all_orders);
        
        // $all_orders_array = $logodesign_orders
        //     ->merge($branding_orders)
        //     ->merge($socialmedia_orders)
        //     ->merge($packaging_orders)
        //     ->merge($promotional_orders)
        //     ->merge($stationery_orders)
        //     ->merge($commercial_orders);
        // return $all_orders_array;
        //$all_orders_array = array_merge($logodesign_orders, $branding_orders, $socialmedia_orders, $packaging_orders, $promotional_orders, $stationery_orders);
        // return $all_orders_array;
        $ordered = $all_orders_array->sortBy('created_at')->values();
        return $ordered;
        
    }

    public function getUserOrders($id) {
        // Object with key-value pairs 

        $logodesign_orders = LogodesignOrder::where('user_id','=', $id)->get();
        $branding_orders = BrandingOrder::where('user_id', '=', $id)->get();
        $socialmedia_orders = SocialMediaOrder::where('user_id', '=', $id)->get();
        $promotional_orders = PromotionalOrder::where('user_id', '=', $id)->get();
        $stationery_orders = StationeryOrder::where('user_id', '=', $id)->get();
        $packaging_orders = PackagingOrder::where('user_id', '=', $id)->get();
        $commercial_orders = CommercialOrder::where('user_id', $id)->get();
        $all_orders_array = array(
            'logodesign' => $logodesign_orders,
            'branding' => $branding_orders,
            'social_media' => $socialmedia_orders,
            'promotional' => $promotional_orders,
            'stationery' => $stationery_orders,
            'packaging' => $packaging_orders,
            'commercial' => $commercial_orders
        );
        $all_orders = json_encode($all_orders_array);
        return $all_orders;
    }

    public function getUserOrdersSortedByDate(int $id) {
        
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

        $commercial_orders = CommercialOrder::where('user_id', $id)->get(['id', 'user_id', 'category_id', 'created_at']);
        foreach($commercial_orders as $order) {
            $order->type = Category::find($order->category_id)->name; 
            array_push($all_orders, $order);
        }

        // return $all_orders;
        $sorted_orders = collect($all_orders)->sortByDesc('created_at')->values();
        foreach($sorted_orders as $order) {
            $order->order_id = strtoupper(substr($order->type, 0,4)).$order->id;
        }

        return $sorted_orders;
    }

    public function getAllOrdersSortedByDate(int $category_id = null, int $id = null, int $admin_id = null, string $admin_type = null) {
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

            case 7: $orders = CommercialOrder::all();
            break;

            default: 
                $logodesign_orders = LogodesignOrder::all();
                $branding_orders = BrandingOrder::all();               
                $socialmedia_orders = SocialMediaOrder::with('posts')->get();              
                $stationery_orders = StationeryOrder::all();              
                $packaging_orders = PackagingOrder::all();         
                $promotional_orders = PromotionalOrder::all();
                $commercial_orders = CommercialOrder::all();             
                $orders = Helper::merge_collections(
                    array($logodesign_orders, 
                    $branding_orders, 
                    $socialmedia_orders, 
                    $stationery_orders, 
                    $packaging_orders, 
                    $promotional_orders,
                    $commercial_orders));
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
        switch($admin_type) {
            case 'designer': 
                $designer_orders = collect($orders)->where('designer_id', '=', $admin_id)->values();
                foreach($designer_orders as $order) {
                    $category = Category::find($order->category_id);
                    $order->order_id = strtoupper(substr($category->name, 0,4)).'-'.$order->id;
                    $order->category_name = $category->name; 
                }
                return $designer_orders;
            break; 

            case 'printing': 
            break; 

            case 'store': 
            break; 

            case 'sales': 
            break; 

            default: 
                $sorted_orders = collect($orders)->sortBy('created_at')->values()->paginate(20);
                foreach($sorted_orders as $order) {
                    $category = Category::find($order->category_id);
                    $order->order_id = strtoupper(substr($category->name, 0,4)).'-'.$order->id;
                    $order->category_name = $category->name; 
                }
                
                return $sorted_orders;
            break;
            
        }
        
    }

    public function getAllDesignOrdersSortedByDate() {
        $orders = [];
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
        $sorted_orders = collect($orders)->sortBy('created_at')->values()->paginate(20);
        foreach($sorted_orders as $order) {
            $category = Category::find($order->category_id);
            $order->order_id = strtoupper(substr($category->name, 0,4)).'-'.$order->id;
            $order->category_name = $category->name; 
        }
        
        return $sorted_orders;
    }

    public function getAllPrintingOrdersSortedByDate($category_id = null, int $id = null, int $printing_admin_id = null) {
        $commercial_orders = CommercialOrder::where('printing_admin_id', $printing_admin_id)->get();
        
        $all_orders = $commercial_orders;
        return $all_orders;

    }

    public function getOrderByToken(string $order_token) {
        $category = strtolower(substr($order_token, 0, 4));
        $id = substr($order_token, 4,5);
        switch($category) {
            case 'logo': 
                $order = LogodesignOrder::find($id);
            break;

            case 'bran': 
                $order = BrandingOrder::find($id);
            break; 

            case 'soci': 
                $order = SocialMediaOrder::find($id);
            break; 

            case 'stat': 
                $order = StationeryOrder::find($id);
            break; 

            case 'pack': 
                $order = PackagingOrder::find($id);
            break; 

            case 'prom': 
                $order = PromotionalOrder::find($id);
            break; 

            case 'comm': 
                $order = CommercialOrder::find($id);
            break;

            case 'pers': 
                $order = PersonalOrder::find($id);
            break;

            case 'stor': 
            break;

            default: return null; // echo "Invalid category.";
        }
        return $order;
    }

    public function generateTokenFromOrder($order) {
        $category_token = $order->category->token_prefix;
        $token = $category_token.$order->id;
        return $token;
    }

    public function checkTokenFromOrder($order) {
        $token = $this->generateTokenFromOrder($order);
        return $token === $order->order_token;
    }

    public function getProductsInfo($products) {
        $final_products = array();
        $products_array = explode(',', $products);
        foreach($products_array as $product_name) {
            // return $product_name;
            $product = Product::where('title', $product_name)->first();
            if($product) {
                $product_to_add = json_encode(['name' => $product->title, 'price' => $product->price]);
                
            } 
            else {
                
                $product_to_add = json_encode(['name' => $product_name, 'price' => null]);
                
            }
            array_push($final_products, json_decode($product_to_add));

        }
        return $final_products;
    }


    public function deleteOrdersFromTokensArray($tokens_array) {
        $faulty_tokens_array = array();
        foreach($tokens_array as $token) {
            $order = $this->getOrderByToken($token);
            if(!$order || !$order->delete()) {
                array_push($faulty_tokens_array, $token);
            }
        }
        return $faulty_tokens_array;
    }

    public function pluckTokensFromOrderMappingArray($mapping_array) {
        $tokens_array = array();
        foreach($mapping_array as $mapping) {
            array_push($tokens_array, $mapping->order_token);
        }
        return $tokens_array;
    }

    public function getMasterOrderFromOrderToken($token) {
        $master_order_mappings = MasterOrderMapping::where('order_token', $token)->get();
        $size = sizeof($master_order_mappings);
        if($size > 1) {
            return -4;  // echo "Order present in multiple orders.";
        } else if($size < 1) {
            return -2;  // echo "Master Order not found.";
        }
        else {
            $order = MasterOrder::find($master_order_mappings[0]->order_id);
            if(!$order) {
                return -3;  // echo "Master order does not exist.";
            }
            return $order;
        }
    }

    public function convertMasterOrderWithMappingToTokensArray($masterorder) {
        $tokens_array = array();
        foreach($masterorder->orders as $mapping) {
            array_push($tokens_array, $mapping->order_token);
        }
        unset($masterorder->orders);
        $masterorder->orders = $tokens_array;
        return $masterorder;
    }

    public function checkOrder($order, $category_id) {
        $category = Category::find($category_id);
        if(!$category) {
            return -3;  // echo "Category not found.";
        }
        $rules = array();
        $messages = array();
        $user = User::find($order->user_id);
        if(!$user) {
            return -3;  // echo "User not found.";
        }
        switch($category->name) {
            case 'Logo Design': 
                $rules = [
                    'user_id' => 'required',
                    'package' => 'required',
                    'logotype' => 'required',
                    'style' => 'required',
                    'color' => 'required',
                    'brand_name' => 'required',
                    'branding' => 'nullable|boolean',
                    'business_field' => 'required',
                    'description' => 'required',
                    'font' => 'required',
                    'subject' => 'required'
                ];
                $messages = [
                    'required' => -2,
                    'boolean' => -4
                ];
                $validator = Validator::make($order->all(), $rules, $messages);
                if($validator->fails()) {
                    return $validator->errors()->first();
                }
                
            break;

            case 'Branding': 
                $rules = [
                    'user_id' => 'required|numeric',
                    'package' => 'required',
                    'comment' => 'required',
                    'logo_photo' => 'required'
                ];
                $messages = [
                    'required' => -2,
                    'user_id.numeric' => -3
                ];
                $validator = Validator::make($order->all(), $rules, $messages);
                if($validator->fails()) {
                    return $validator->errors()->first();
                }
                if(!Helper::check_file($order->logo_photo)) {
                    return -4;  // Logo photo file invalid.  
                }
            break; 

            case 'Social Media': 
                $rules = [
                    'user_id' => 'required',
                    'package' => 'required',
                    'logo_photo' => 'required',
                    'posts' => 'required|array',
                    'posts.*.comment' => 'required',
                    'posts.*.image' => 'nullable'
                ];
                $messages = [
                    'required' => -2,
                    'array' => -4
                ];
                $validator = Validator::make($order->all(), $rules, $messages);
                if($validator->fails()) {
                    return $validator->errors()->first();
                }
                if(sizeof($order->posts) < 1) {
                    return -5;  // echo "Empty Posts Array";
                }
        
                if(!Helper::check_file($order->logo_photo)) {
                    return -6;  // echo "Wrong file format.";
                }
                foreach($order->posts as $post) {
                    if(!Helper::check_file($post['image'])) {
                        return -8;  // echo "Wrong file for post image.";
                    }
                }
            break;

            case 'Promotional': 
                $rules = [
                    'user_id' => 'required',
                    'products' => 'required|array',
                    'products.*' => 'string'
                ];
                $messages = [
                    'required' => -2,
                    'array' => -4,
                    'string' => -5
                ];
                $validator = Validator::make($order->all(), $rules, $messages);
                if($validator->fails()) {
                    return $validator->errors()->first();
                }
                if(sizeof($order->products) < 1) {
                    return -6;  // echo "Empty Items array.";
                }
            break; 

            case 'Packaging':
                $rules = [
                    'user_id' => 'required',
                    'products' => 'required|array',
                    'products.*' => 'string',
                    'comment' => 'nullable|string'
                ];
                $messages = [
                    'required' => -2,
                    'array' => -4,
                    'string' => -6
                ];
                $validator = Validator::make($order->all(), $rules, $messages);
                if($validator->fails()) {
                    return $validator->errors()->first();
                }
                if(sizeof($order->products) < 1) {
                    return -5;  // echo "Empty Products array.";
                }
            break;

            case 'Stationery': 
                $rules = [
                    'user_id' => 'required',
                    'products' => 'required|array',
                    'products.*' => 'required|string',
                    'comment' => 'nullable|string'
                ];
                $messages = [
                    'required' => -2,
                    'array' => -4,
                    'string' => -6
                ];
                $validator = Validator::make($order->all(), $rules, $messages);
                if($validator->fails()) {
                    return $validator->errors()->first();
                }
                if(sizeof($order->products) < 1) {
                    return -5;  // echo "Empty Items array.";
                }
            break; 

            case 'Commercial': 
                $rules = [
                    'user_id' => 'required',
                    'item_name' => 'required|string',
                    'shape' => 'required|string',
                    'orientation' => 'required|string',
                    'size' => 'required|string',
                    'paper_thickness' => 'nullable|string',
                    'finishing' => 'nullable|string',
                    'backside' => 'required|boolean',
                    'frontside_file' => 'required|string',
                    'backside_file' => 'nullable|string',
                    'quantity' => 'nullable|numeric',
                    'price' => 'nullable|string'
                ];

                $messages = [
                    'required' => -2,
                    'string' => -4,
                    'boolean' => -5,
                    'numeric' => -6
                ];
                 
                $validator = Validator::make($order->all(), $rules, $messages);
                if($validator->fails()) {
                    return $validator->errors()->first();
                }

            break;

        }
        return 1;
    }

    public function getAllOrdersFromMasterOrder(object $master_order) {
        $orders = array();
        foreach($master_order->orders as $order) {
            $full_order = $this->getOrderByToken($order->order_token);
            array_push($orders, $full_order);
        }
        return $orders;
    }
}