<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagingProduct extends Model
{
    //
    public function products() {
        return $this->belongsTo('App\PackagingOrder');
    }
}
