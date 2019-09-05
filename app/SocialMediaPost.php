<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMediaPost extends Model
{
    //
    public function order() {
        return $this->belongsTo('App\SocialMediaOrder');
    }
}
