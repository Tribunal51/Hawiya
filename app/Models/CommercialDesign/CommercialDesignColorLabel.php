<?php

namespace App\Models\CommercialDesign;

use Illuminate\Database\Eloquent\Model;

class CommercialDesignColorLabel extends Model
{
    //
    protected $table = 'commercial_design_color_commercial_design_label';

    public function label() {
        return $this->belongsTo('App\Models\CommercialDesign\CommercialDesignLabel', 'commercial_design_label_id');
    }

    public function color() {
        return $this->belongsTo('App\Models\CommercialDesign\CommercialDesignColor', 'commercial_design_color_id');
    }
}
