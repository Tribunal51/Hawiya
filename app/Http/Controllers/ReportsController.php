<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LogodesignOrder;
use App\User;

class ReportsController extends Controller
{
    //
    public function logodesign($id) {
        $order = LogodesignOrder::where('id', $id)->get()->first();
        //return $order;
        if(!$order) {
            return -2;  // echo "Order not found.";
        }

        $client = User::where('id', $order->id)->get()->first();
        if(!$client) {
            return -3;  // echo "Client not found.";
        }

        $order->color = isset($order->color) ? explode(",",$order->color) : null;
        $order->logotype = isset($order->logotype) ? explode(",", $order->logotype) : null;
        $client = User::where('id', $order->id)->get()->first();
        return view('pages.report.logodesign')->with(array('order' => $order, 'client' => $client));
    }
}
