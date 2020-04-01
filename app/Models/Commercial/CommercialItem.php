<?php

namespace App\Models\Commercial;

use Illuminate\Database\Eloquent\Model;

class CommercialItem extends Model
{
    //
    protected $fillable = ['name', 'options_info'];

    protected $casts = ['options_info' => 'array'];

    public function designs() {
        return $this->hasMany('App\Models\CommercialDesign\CommercialDesign');
    }
    
}
