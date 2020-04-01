<?php

namespace App\Models\Flyer;

use Illuminate\Database\Eloquent\Model;

class FlyerLabelFlyerColor extends Model
{
    //
    protected $table = 'flyer_label_flyer_color';

    public function label() {
        return $this->belongsTo('App\Models\Flyer\FlyerLabel');
    }

    public function color() {
        return $this->belongsTo('App\Models\Flyer\FlyerColor');
    }
}
