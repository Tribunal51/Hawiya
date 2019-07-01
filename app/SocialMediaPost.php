<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMediaPost extends Model
{
    //
    public function SocialMediaOrder() {
        return $this->belongsTo('App\SocialMediaOrder');
    }
}
