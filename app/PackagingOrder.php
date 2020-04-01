<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PackagingOrder extends Model
{
    //
    protected $fillable = ['user_id'];

    protected $casts = [
        'price' => 'decimal:2'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function getNextId() {
        $statement = DB::select("show table status like 'packaging_orders'");
        return $statement[0]->Auto_increment;
    }

    public function address() {
        return $this->belongsTo('App\Models\User\Address');
    }

   
}
