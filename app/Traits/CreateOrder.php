<?php 

namespace App\Traits;
use App\Helpers\AppHelper as Helper;

use App\LogoDesignOrder; 
use App\BrandingOrder;
use App\SocialMediaOrder; 
use App\SocialMediaPost;
use App\StationeryOrder;
use App\PackagingOrder; 
use App\PromotionalOrder;
use App\Category;
use App\Models\PendingReorder;

use App\User;

use App\Models\Commercial\CommercialOrder;
use App\Models\Personal\PersonalOrder;

use Illuminate\Http\Request;

use Validator;

trait CreateOrder {

    public function createOrderFromReorder(PendingReorder $reorder, $order, $comment = null) {
        $category = $this->getCategoryFromToken($reorder->order_token);
        
        if($category->name === 'Social Media') {
            $order->load('posts');
            
        }
        $new_order = $order->replicate();
        unset($new_order->id);
        
        $new_order->order_token = $new_order->category->token_prefix.$new_order->getNextId();
        $new_order->quantity = isset($reorder->new_quantity) ? $reorder->new_quantity : $order->quantity;
        $new_order->price = isset($reorder->new_price) ? $reorder->new_price : $order->price;
        $new_order->order_comment = isset($comment) ? $comment : $order->order_comment;
        $new_order->address_id = isset($reorder->new_address_id) ? $reorder->new_address_id : $order->address_id;
        $new_order->push();
        foreach($order->getRelations() as $relation => $items) {
            foreach($items as $item) {
                unset($item->id);
                $new_order->{$relation}()->create($item->toArray());
            }
        }
        return $new_order;

    }

    public function getCategoryFromToken($order_token) {
        $categories = Category::all();
        $category_token = strtolower(substr($order_token, 0, 4));
        $selected_category = null;
        foreach($categories as $category) {
            
            if(strtolower(substr($category->name, 0, 4)) === $category_token) {
                
                $selected_category = $category;
            }
            else {
               
            }
        }
        
        return $selected_category;
    }

    public function checkMasterOrderRequest($request) {
        $logodesign_request = $request['logodesign'];

    }


    public function createLogodesignOrder(Request $request) {
        // echo $request;
        $validator = Validator::make($request->all(), [
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
        ],[
            'required' => -2,
            'boolean' => -4
        ]);
        if($validator->fails()) {
            return $validator->errors()->first();
        }
       

        if(!User::find($request->user_id)) {
            return -3;  // echo 'User not found.';
        }
        $new_order = new LogoDesignOrder;
        $new_order->user_id = $request->user_id;    //If user not present, then null
        $new_order->package = $request->package;
        // $new_order->logotype = $request->logotype;

        $new_order->style = $request->style;

        $new_order->color = isset($request->color) ? implode(",",$request->color) : null;
        $new_order->logotype = isset($request->logotype) ? implode(",", $request->logotype) : null;

        $new_order->brand_name = $request->brand_name;
        $new_order->tagline = $request->tagline;
        $new_order->business_field = $request->business_field;
        $new_order->description = $request->description;
        $new_order->font = $request->font;
        $new_order->branding = $request->branding;
        $new_order->subject = $request->subject;

        $category = Category::where('name', '=', 'Logo Design')->first();
        $new_order->category_id = $category->id;
        $new_order->order_token = $category->token_prefix.$new_order->getNextId();
        if($new_order -> save()) {
            return $new_order->id;
            //return $new_order->id; //echo order_number 
            //return $new_order_response; //echo {user_id, order_number}
        }
        else {
            return -1; //echo "Error occured";
        }
    }

    public function createBrandingOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'package' => 'required',
            'comment' => 'required',
            'logo_photo' => 'required'
        ], [
            'required' => -2
        ]);
        // echo $request;
        if($validator->fails()) {
            return $validator->errors()->first();
        }
        
        if(!User::find($request->user_id)) {
            return -3;  // echo "User not found.";
        }
        $order = new BrandingOrder;
        if(Helper::check_file($request->logo_photo)) {
            $filename = Helper::save_file($request->logo_photo);
            $order->logo_photo = $filename;
        }
        else {
            return -4;  // echo "Wrong File format"
        }
        $order->user_id = $request->user_id;
        $order->package = $request->package;
        $order->comment = $request->comment;
        // $order->logo_photo = $request->logo_photo;
        $category = Category::where('name', 'Branding')->first();
        $order->category_id = $category->id;
        $order->order_token = $order->category->token_prefix.$order->getNextId();
       //return $request;
       
        
       
            

        

        if($order->save()) {
            return $order->id;  // echo "Order Registered Successfully.";
        }
        else {
            return -1;  // echo "Order could not be registered. Please investigate.";
        }
        
    }

    public function createSocialmediaOrder(Request $request) {
        // return "ok";
        $request_posts = json_decode(json_encode($request->posts));
        // $request_posts = $request->posts;
        // echo gettype($request_posts[0]->image);
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'package' => 'required',
            'logo_photo' => 'required',
            'posts' => 'required|array',
            'posts.*.image' => 'nullable',
            'posts.*.comment' => 'required'
        ], [
            'required' => -2,
            'array' => -4
        ]); 
        
        // echo gettype($request_posts[0]->image);
        // return -99;
        if($validator->fails()) {
            return $validator->errors()->first();
        }
        $user = User::find($request->user_id);
        if(!$user) {
            return -3;  // echo "User not found.";
        }
        if(sizeof($request->posts) < 1) {
            return -5;  // echo "Empty Posts Array";
        }

        if(!Helper::check_file($request->logo_photo)) {
            return -6;  // echo "Wrong file format.";
            
        }
        // echo gettype($request->posts);
        // foreach($request->all() as $parameter => $value) {
        //     echo json_encode($value);
        // }
        // echo gettype($request->posts);
        $posts = array();
        foreach($request_posts as $post) {
            $encoded_post = $post;
            if(is_array($post)) {
                $encoded_post = json_decode(json_encode($post), FALSE);
            }
            array_push($posts, $encoded_post);
        }
        
        
        foreach($posts as $post) {
            // echo $post->comment;
            if(!isset($post->comment)) {
                return -7;  // echo "Required fields missing for the Post";
            }
            else {
                if(isset($post->image) && !Helper::check_file($post->image)) {
                    return -8;  // echo "File format wrong for one or more posts";
                }
            }
        }

        $order = new SocialMediaOrder;
        $order->user_id = $user->id;
        $order->package = $request->package;

        $category = Category::where('name', '=', 'Social Media')->first();
        $order->category_id = $category->id;
        $order->order_token = $category->token_prefix.$order->getNextId();

        $order->logo_photo = Helper::save_file($request->logo_photo);
        
       
        if(!$order->save()) {
            return -1;  // echo "Order could not be saved.";
        }

        foreach($posts as $post) {
            $new_post = new SocialMediaPost;
            $new_post->comment = $post->comment;
            $new_post->order_id = $order->id;
            $new_post->image = isset($post->image) ? Helper::save_file($post->image) : null;
            if(!$new_post->save()) {    
                $order->delete();          
                return -9;  // echo Could not save a Post. Order deleted.
            }
        }
                    
        if($order) {
            return $order->id;  // echo "Order registered";
        }
        else {
            return -1;  // echo "Order could not be registered. Please investigate.";
        }
    }

    public function createStationeryOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'products' => 'required|array',
            'products.*' => 'required|string',
            'comment' => 'nullable|string',
            'logo_photo' => 'nullable|string',
            'comment' => 'nullable|string'
        ], [
            'required' => -2,
            'array' => -4,
            'string' => -6
        ]);
        if($validator->fails()) {
            return $validator->errors()->first();
        }
        
        if(!User::find($request->user_id)) {
            return -3;  // echo "User not found.";
        }
        if(sizeof($request->products) < 1) {
            return -5;  // echo "Items cannot be an empty array.";
        }
        // foreach($request->items as $item) {
        //     if(!is_string($item)) {
        //         return -6;  // echo "Item is not a string.";
        //     }
        // }
        $order = new StationeryOrder;
        $order->user_id = $request->user_id;
        $order->products = implode($request->products, ',');
        if($request->logo_photo) {
            $order->logo_photo = Helper::save_file($request->logo_photo);
        }

        $category = Category::where('name', '=', 'Stationery')->first();
        $order->category_id = $category->id;
        $order->order_token = $category->token_prefix.$order->getNextId();


        if(isset($request->comment)) {
            $order->comment = $request->comment;
        }
        if($order->save()) {
            return $order->id;  // echo "Order registered successfully.";
        }
        else {
            return -1;  // echo "Error occured. Order could not be registered.";
        }
    }

    public function createPromotionalOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'products' => 'required|array',
            'products.*' => 'string',
            'comment' => 'nullable|string'
        ], [
            'required' => -2,
            'array' => -4,
            'string' => -5,
            'image' => -7
        ]);
        if($validator->fails()) {
            return $validator->errors()->first();
        }

        if(!User::find($request->user_id)) {
            return -3;  // echo "User does not exist.";
        }
        
        if(sizeof($request->products) <= 0) {
            return -6;  // echo "Empty Array of Items.";
        }

        $order = new PromotionalOrder;
        $order->user_id = $request->user_id;
        $order->products = implode(",", $request->products);
        if($request->logo_photo) {
            $order->logo_photo = Helper::save_file($request->logo_photo);
        }
        if(isset($request->comment)) {
            $order->comment = $request->comment;
        }

        $category = Category::where('name', '=', 'Promotional')->first();
        $order->category_id = $category->id;
        $order->order_token = $category->token_prefix.$order->getNextId();


        if($order->save()) {
            return $order->id;  // echo "Order registered successfully.";
        }
        else {
            return -1;  // echo "Order could not be registered. Please investigate.";
        }
    }

    public function createPackagingOrder(Request $request) {
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'products' => 'required|array',
            'products.*' => 'string',
            'comment' => 'nullable|string'
        ], [
            'required' => -2,
            'array' => -4,
            'string' => -6
        ]);
        if($validator->fails()) {
            return $validator->errors()->first();
        }

        if(!User::find($request->user_id)) {
            return -3;  // echo "User not found.";
        }

        if(sizeof($request->products) < 1) {
            return -5;  // echo "Products array cannot be empty.";
        }
        // foreach($request->products as $product) {
        //     if(!is_string($product)) {
        //         return -6;  // echo "Product value is not a string";
        //     }
        // }
        
        $order = new PackagingOrder;
        $order->user_id = $request->user_id;
        $order->products = implode($request->products, ',');
        $category = Category::where('name', 'Packaging')->get()->first();
        $order->category_id = $category->id;
        $order->order_token = $category->token_prefix.$order->getNextId();
        if($request->logo_photo) {
            $order->logo_photo = Helper::save_file($request->logo_photo);
        }

        if(isset($request->comment)) {
            $order->comment = $request->comment;
        }
        if($order->save()) {
            return $order->id;  // echo "Order registered successfully.";
        }
        else {
            return -1;  // echo "Order could not be registered. Please investigate. ";
        }

    }

    public function createCommercialOrder(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'item_name' => 'required|string',
            'shape' => 'required|string',
            'orientation' => 'required|string',
            'package' => 'nullable|string',
            'pages' => 'nullable|string',
            'endcaps' => 'nullable|boolean',
            'fold' => 'nullable|string',
            'type' => 'nullable|string',
            'size' => 'required|string',
            'paper_thickness' => 'nullable|string',
            'finishing' => 'nullable|string',
            'backside' => 'required|boolean',
            'frontside_file' => 'required|string',
            'backside_file' => 'nullable|string',
            'quantity' => 'nullable|numeric',
            'price' => 'nullable|string'
        ], [
            'required' => -2,
            'string' => -4,
            'boolean' => -5,
            'numeric' => -6
        ]);

        if(!User::find($request->user_id)) {
            return -3;  
        }

        if($validator->fails()) {
            return $validator->errors()->first();
        }
        
        $order = new CommercialOrder;
        
        $category = Category::where('name', 'Commercial')->first();
        $order->category_id = $category->id;
        $order->order_token = $category->token_prefix.$order->getNextId();

        $order->user_id = $request->user_id;
        // $order->commercial_item_id = $item->id;
        $order->item_name = $request->item_name;
        $order->shape = $request->shape;
        $order->orientation = $request->orientation;
        $order->size = $request->size;
        $order->paper_thickness = $request->paper_thickness;
        $order->finishing = $request->finishing;
        $order->price = $request->price;
        $order->backside = $request->backside;
        $order->quantity = $request->quantity;
        
        $order->package = optional($request->package);
        $order->pages = optional($request->pages);
        $order->endcaps = optional($request->endcaps);
        $order->fold = optional($request->fold);
        $order->type = optional($request->type);

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
