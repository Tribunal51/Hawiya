<?php

namespace App\Models\CommercialDesign;

use Illuminate\Database\Eloquent\Model;

class CommercialDesignColor extends Model
{
    //
    public function design() {
        return $this->belongsTo('App\Models\CommercialDesign\CommercialDesign', 'commercial_design_id');
    }

    public function labels() {
        return $this->belongsToMany('App\Models\CommercialDesign\CommercialDesignLabel', 'commercial_design_color_commercial_design_label', 'commercial_design_color_id', 'commercial_design_label_id')->withPivot('color');
    }

    public function labels_front() {
        return $this->belongsToMany('App\Models\CommercialDesign\CommercialDesignLabel')->withPivot('color')->where('backside', false);
    }

    public function labels_back() {
        return $this->belongsToMany('App\Models\CommercialDesign\CommercialDesignLabel')->withPivot('color')->where('backside', true);
    }
}
