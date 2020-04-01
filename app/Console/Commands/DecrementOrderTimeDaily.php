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

use App\Helpers\AppHelper as Helper;

class DecrementOrderTimeDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'decrement:ordertime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Decrement Order Days left of all orders daily.';

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
        $orders = Helper::merge_collections(array(
            $logodesign_orders, 
            $branding_orders, 
            $socialmedia_orders, 
            $promotional_orders, 
            $packaging_orders, 
            $stationery_orders,
            $commercial_orders));
        //$orders = array_merge($logodesign_orders, $branding_orders, $socialmedia_orders, $promotional_orders, $packaging_orders, $stationery_orders);
        
        foreach($orders as $order) {
            if($order->days_left > 1) {
                // Decrement Days Counter
                $order->days_left = $order->days_left - 1;
            }
            else if($order->days_left === 1) {
                // Send Push Notification or Email or both 
                $message = 'You have one day left for your order id '.$order->id.' package '.$order->package;
                Helper::pushMessage($order->user_id, $message);
                $order->days_left--;    
            }
            else {
                // Send Push Notification or Email or both 
                $message = 'Your order '.$order->id.' has arrived.';
                Helper::pushMessage($order->user_id, $message);
            }
            $order->save();
        }
        $this->info('Days left decremented for all orders.');

       
    }
}
