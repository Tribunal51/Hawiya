<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\LogodesignOrder;
use App\BrandingOrder;
use App\SocialMediaOrder;
use App\PackagingOrder;
use App\PromotionalOrder;
use App\StationeryOrder;
use App\Models\Commercial\CommercialOrder;
use App\Models\Store\StoreOrder;

use App\Helpers\AppHelper as Helper;

use App\Notifications\OrderDelivered;


use Carbon\Carbon;

class CheckOrderDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:orderdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking Order Delivery Dates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $logodesign_orders = LogodesignOrder::all();
        $branding_orders = BrandingOrder::all();
        $socialmedia_orders = SocialMediaOrder::all();
        $promotional_orders = PromotionalOrder::all();
        $packaging_orders = PackagingOrder::all();
        $stationery_orders = StationeryOrder::all();
        $commercial_orders = CommercialOrder::all();
        $store_orders = StoreOrder::all();
        $orders = Helper::merge_collections(array(
            $logodesign_orders, 
            $branding_orders, 
            $socialmedia_orders, 
            $promotional_orders, 
            $packaging_orders, 
            $stationery_orders,
            $commercial_orders,
            $store_orders));
    

        // echo Carbon::now();
        $now = Carbon::now();

        foreach($orders as $order) {
            if($order->delivery_date) {
                // echo $order->delivery_date." ".$now." ";
                $date = Carbon::parse($order->delivery_date);
                // echo $date->lt($now) ? 'yes' : 'no';
                if($now->et($date->subDays(1))) {
                    $message = "Your order will be delivered tomorrow.";
                    Helper::pushMessage($order->user_id, $message);
                } 
                else if($now->et($date)) {
                    $message = "Your order ".$order->order_token." will be delivered today.";
                    Helper::pushMessage($order->user_id, $message);
                    $user = User::find($order->user_id);
                    $user->notify(new OrderDelivered($order));
                }
            }
            // echo $order->delivery_date;
            // Helper::pushMessage($order->user_id, $message);
        }

    }
}
