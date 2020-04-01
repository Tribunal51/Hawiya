<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StoreOrder extends Model
{
    //
    protected $table = 'store_orders';

    protected $casts = [
        'products' => 'array'
    ];

    protected $fillable = [
        'user_id',
        'products',
        'comment',
        'category_id',
        'price'
    ];

    public function getNextId() {
        $statement = DB::select("show table status like 'store_orders'");
        return $statement[0]->Auto_increment;
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function address() {
        return $this->belongsTo('App\Models\User\Address');
    }
}
