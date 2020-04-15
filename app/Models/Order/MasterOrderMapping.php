<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class MasterOrderMapping extends Model
{
    //
    protected $table = 'master_order_mapping';

    protected $fillable = [
        'order_id',
        'order_token'
    ];

    public function master_order() {
        return $this->belongsTo('App\Models\Order\MasterOrder', 'order_id');
    }
}
