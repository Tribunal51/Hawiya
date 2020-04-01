<?php

namespace App\Models\CommercialDesign;

use Illuminate\Database\Eloquent\Model;

class CommercialDesignLabel extends Model
{
    //
    protected $casts = [
        'backside' => 'boolean',
        'is_image' => 'boolean',
        'font_size' => 'decimal:2'
    ];

    public function design() {
        return $this->belongsTo('App\Models\CommercialDesign\CommercialDesign', 'commercial_design_id');
    }

    public function colors() {
        return $this->belongsToMany('App\Models\CommercialDesign\CommercialDesignColor', 'commercial_design_color_commercial_design_label', 'commercial_design_label_id', 'commercial_design_color_id')->withPivot('color');
    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
