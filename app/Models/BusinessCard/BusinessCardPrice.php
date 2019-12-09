<?php

namespace App\Models\BusinessCard;

use Illuminate\Database\Eloquent\Model;

class BusinessCardPrice extends Model
{
    //

    protected $fillable = ['business_card_id','with_cover', 'without_cover'];

    public function business_card() {
        return $this->belongsTo('App\Models\BusinessCard\BusinessCard');
    }
}
