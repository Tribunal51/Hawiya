<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class RawOrder extends Model
{
    //
    protected $table = 'raw_orders';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    protected $fillable = [
        'user_id',
        'category_id',
        'order',
        'quantity',
        'raw_order_id'
    ];
    
    protected $casts = [
        'order' => 'object'
    ];
}
