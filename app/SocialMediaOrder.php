<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMediaOrder extends Model
{
    //

    protected $fillable = ['user_id','package','logo_photo'];

    public function posts() {
        return $this->hasMany('App\SocialMediaPost', 'order_id');
    }
}
