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
}
