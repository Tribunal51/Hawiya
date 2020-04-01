<?php

namespace App\Models\Flyer;

use Illuminate\Database\Eloquent\Model;

class FlyerColor extends Model
{
    //

    public function flyer() {
        return $this->belongsTo('App\Models\Flyer\Flyer');
    }

    public function labels() {
        return $this->belongsToMany('App\Models\Flyer\FlyerLabel')->withPivot('color');
    }

    public function labels_front() {
        return $this->belongsToMany('App\Models\Flyer\FlyerLabel')->withPivot('color')->where('backside', false);
    }

    public function labels_back() {
        return $this->belongsToMany('App\Models\Flyer\FlyerLabel')->withPivot('color')->where('backside', true);
    }
}
