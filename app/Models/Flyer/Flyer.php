<?php

namespace App\Models\Flyer;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    //

    public function colors() {
        return $this->hasMany('App\Models\Flyer\FlyerColor');
    }

    public function labels() {
        return $this->hasMany('App\Models\Flyer\FlyerLabel');
    }

    public function labels_front() {
        return $this->hasMany('App\Models\Flyer\FlyerLabel')->where('backside', false);
        // $labels = $this->hasMany('App\Models\Flyer\FlyerLabel');
        // $labels_front = array();
        // foreach($labels as $label) {
        //     if(!$label->backside) {
        //         array_push($labels_front, $label);
        //     }
        // }
        // return $labels_front;
    }

    public function labels_back() {
        return $this->hasMany('App\Models\Flyer\FlyerLabel')->where('backside', true);
    }

}
