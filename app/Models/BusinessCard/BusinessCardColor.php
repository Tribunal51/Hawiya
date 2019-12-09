<?php

namespace App\Models\BusinessCard;

use Illuminate\Database\Eloquent\Model;

class BusinessCardColor extends Model
{
    //  
    public function business_card() {
        return $this->belongsTo('App\Models\BusinessCard\BusinessCard');
    }

    public function labels() {
        return $this->belongsToMany('App\Models\BusinessCard\BusinessCardLabel')->withPivot('color');
    }

    
}
