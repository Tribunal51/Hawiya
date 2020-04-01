<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SocialMediaOrder extends Model
{
    //
    protected $casts = [
        'price' => 'decimal:2'
    ];

    protected $fillable = ['user_id','package','logo_photo'];

    public function posts() {
        return $this->hasMany('App\SocialMediaPost', 'order_id');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function getNextId() {
        $statement = DB::select("show table status like 'social_media_orders'");
        return $statement[0]->Auto_increment;
    }

    // public function scopeWithAll($query) {
    //     $query->with(['posts']);
    // }

    public function address() {
        return $this->belongsTo('App\Models\User\Address');
    }

}
