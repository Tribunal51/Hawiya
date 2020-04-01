<?php

namespace App\Models\Commercial;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CommercialOrder extends Model
{
    //
    protected $casts = [
        'backside' => 'boolean',
        'price' => 'decimal:2'
    ];

    public function getNextId() {
        $statement = DB::select("show table status like 'commercial_orders'");
        return $statement[0]->Auto_increment;
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function address() {
        return $this->belongsTo('App\Models\User\Address');
    }
}
