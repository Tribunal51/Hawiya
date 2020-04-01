<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMediaPost extends Model
{
    //
    protected $fillable = [
        'order_id', 'image', 'comment'
    ];
    

    public function order() {
        return $this->belongsTo('App\SocialMediaOrder');
    }
}
