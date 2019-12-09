<?php

namespace App\Models\BusinessCard;

use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
{
    //
    public function colors() {
        return $this->hasMany('App\Models\BusinessCard\BusinessCardColor');
    }

    public function labels() {
        return $this->hasMany('App\Models\BusinessCard\BusinessCardLabel');
    }

    public function price() {
        return $this->hasOne('App\Models\BusinessCard\BusinessCardPrice');
    }

    protected $casts = [

    ];

    protected $fillable = [
        'shape', 'fronttextphoto', 'frontbasephoto', 'backtextphoto', 'backbasephoto'
    ];

}
