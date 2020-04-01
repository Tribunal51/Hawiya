<?php

namespace App\Models\BusinessCard;

use Illuminate\Database\Eloquent\Model;

class BusinessCardLabel extends Model
{
    //

    protected $casts = [
        
    ];

    public function business_card() {
        return $this->belongsTo('App\Models\BusinessCard\BusinessCard');
    }

    public function colors() {
        return $this->belongsToMany('App\Models\BusinessCard\BusinessCardColor')->withPivot('color');
    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    
}
