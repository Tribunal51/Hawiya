<?php

namespace App\Models\Commercial;

use Illuminate\Database\Eloquent\Model;

class CommercialOrder extends Model
{
    //
    protected $casts = [
        'backside' => 'boolean'
    ];

    public function item() {
        return $this->hasOne('App\Models\Commercial\CommercialItem');
    }
}
