<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commercial\CommercialItem;

class CommercialItemsController extends Controller
{
    //

    public function index() {
        $items = CommercialItem::all();
        return $items;
    }
}
