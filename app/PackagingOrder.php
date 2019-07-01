<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagingOrder extends Model
{
    //
    protected $fillable = ['user_id'];

    public function PackagingProduct() {
        return $this->hasMany('App\PackagingProduct','order_id');
    }
}
