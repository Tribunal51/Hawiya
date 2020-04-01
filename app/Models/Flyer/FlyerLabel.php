<?php

namespace App\Models\Flyer;

use Illuminate\Database\Eloquent\Model;

class FlyerLabel extends Model
{
    //
    protected $casts = [
        'backside' => 'boolean'
    ];

    public function flyer() {
        return $this->belongsTo('App\Models\Flyer\Flyer');
    }

    public function colors() {
        return $this->belongsToMany('App\Models\Flyer\FlyerColor')->withPivot('color');
    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
