<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class MasterOrder extends Model
{
    //
    protected $table = 'master_orders';

    protected $fillable = [
        'user_id',
        'total_price',
        'fast_delivery',
        'order_comment',
        'payment_method',
        'address_id'
    ];

    public function orders() {
        return $this->hasMany('App\Models\Order\MasterOrderMapping', 'order_id');
    }
}
